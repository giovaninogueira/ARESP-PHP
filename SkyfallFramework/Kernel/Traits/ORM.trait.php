<?php

namespace  SkyfallFramework\Kernel\Traits;
use SkyfallFramework\Common\Database\Connection;

trait ORM
{
    private $list_tables      = array();
    private $list_atributos   = array();
    private $list_foreign_key = array();
    private $list_primary_key = array();
    private $con;

    public function generateORM()
    {
        $this->getTables();
        $this->getColumns();
        $this->createTrait();
        $this->createClassModel();
        $this->createController();
    }

    public function getTables()
    {
        $this->con = Connection::$list_connection;
        $sql = "select table_name as tabela FROM information_schema.tables where table_schema='".$this->con['DATABASE']."'";
        $list = $this->queryFetchAll($sql);
        foreach ($list as $index => $value)
        {
            $this->list_tables[] = $value['tabela'];
        }
    }

    public function getColumns()
    {
        foreach ($this->list_tables as $index => $value)
        {
            $sql = "SHOW COLUMNS FROM " . $value;
            $retorno = $this->queryFetchAll($sql);
            for($i = 0; $i < count($retorno); $i ++)
            {
                $this->list_atributos[$value][]=$retorno[$i];
            }
        }
        $this->getForeignKey();
    }

    public function getForeignKey()
    {
        foreach ($this->list_tables as $index => $value)
        {
            $sql="select table_name as tabela,column_name as coluna,referenced_table_name as referencia,referenced_column_name
              from information_schema.key_column_usage where referenced_table_name is not null
              and table_schema ='".$this->con['DATABASE']."' and table_name ='".$value."'";

            $pes = $this->queryFetchAll($sql);
            if(count($pes) != 0)
            {
                $this->list_foreign_key[$value] = $pes;
            }
        }
        $this->getPrimaryKey();
    }

    public function getPrimaryKey()
    {
        foreach ($this->list_tables as $index => $value)
        {
            $sql = "SHOW KEYS FROM " . $value . " WHERE KEY_NAME = 'PRIMARY'";
            $pes = $this->queryFetchAll($sql);
            $this->list_primary_key[$value] = $pes[0]['Column_name'];
        }
    }

    public function createHeader($type, $namespace, $uses)
    {
        $txt ="<?php\n/*\n /**\n Generation ORM Skyfall Framework\n**/";
        return "";
    }

    public function createTrait()
    {
        foreach ($this->list_tables as $index => $table)
        {
            $extends = "";
            $use = "";
            $atributos = "";
            $setGet = "";
            $model = "";
            $r = "";

            if(key_exists($table,$this->list_foreign_key))
            {
                foreach ($this->list_foreign_key[$table] as $key => $value)
                {
                    if($value['referencia'] == $table)
                    {
                        $model = " as " . strtolower($value['referencia']) . "Model";
                        $r = "Model";
                    }

                    $use .= "\nuse MVC\\Model\\".ucwords($value['referencia']).$model.";";

                    $atributos .= "  private $" . ucwords($value['referencia']) . "; \n  // References - "
                                    .ucwords($value['referencia']) ." \n\n";

                    $setGet .= "\n  public function set" . ucwords($value['referencia']) . "(" . strtolower($value['referencia']).$r
                                . " $" . $value['referencia'].")\n  { \n" .
                        "       $" . "this->" . ucwords($value['referencia']) .
                        " = $" . $value['referencia'] . ";  \n  }\n";

                    $setGet .= "\n  public function get" . ucwords($value['referencia']) . "()\n  { \n" .
                        "       return $" . "this->" . ucwords($value['referencia']) . ";  \n  }\n";
                }
            }

            foreach ($this->list_atributos[$table] as $i => $atributo)
            {
                $atributos .= "  private $" . strtolower($atributo['Field']) . "; \n  // " .$atributo['Type'] ." \n\n";

                $setGet .= "\n  public function set" . ucwords($atributo['Field']) .
                    "($" .strtolower($atributo['Field']). ")\n  { \n" .
                    "       $" . "this->" . strtolower($atributo['Field']) . " = $" . strtolower($atributo['Field'])
                    . ";  \n  }\n";

                $setGet .= "\n  public function get" . ucwords($atributo['Field']) . "()\n  { \n" .
                    "       return $" . "this->" . strtolower($atributo['Field']) . ";  \n  }\n";
            }

            $txt = "<?php\n\n/**\n Skyfall Micro-Framework\n Generate ORM Trait\n Version 1.0.0\n**/\n\nnamespace MVC\Traits; \n "
                . $use . "\n\ntrait " . ucwords($table) ."\n{\n" . $atributos . $setGet . "\n}";

            $path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
                ".." . DIRECTORY_SEPARATOR . "MVC" . DIRECTORY_SEPARATOR . "Traits" . DIRECTORY_SEPARATOR;

            $file = $path . ucwords($table) . ".trait.php";

            $this->createFile($txt, $file);
        }
    }

    public function createClassModel()
    {
        foreach ($this->list_tables as $index => $table)
        {
            $extends = "\nuse SkyfallFramework\Common\CRUD\Model;";
            $use = "\n  use \\MVC\\Traits\\".ucwords($table.";");
            $setGet = "";

            $txt = "<?php\n\n/**\n Skyfall Micro-Framework\n Generate ORM Class Model\n Version 1.0.0\n**/\n\nnamespace MVC\Model; \n "
                . $extends ."\n\nclass " . ucwords($table) ." extends Model\n{" . $use . "\n}";

            $path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
                ".." . DIRECTORY_SEPARATOR . "MVC" . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR;

            $file = $path . ucwords($table) . ".class.php";

            if(!file_exists($file))
                $this->createFile($txt, $file);
        }
    }

    public function createController()
    {
        foreach ($this->list_tables as $index => $table)
        {

            $use = "\nuse MVC\\Model\\".ucwords($table)." as ".$table."Model;";

            $txt = "<?php\n\n/**\n Skyfall Micro-Framework\n Generate ORM Controller\n Version 1.0.0\n**/\n\nnamespace MVC\Controller; \n "
                . $use ."\n\nclass " . ucwords($table) ."\n{\n /**\n Skyfall Micro-Framework\n Body of Controller\n**/\n}";

            $path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR .
                ".." . DIRECTORY_SEPARATOR . "MVC" . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR;

            $file = $path . ucwords($table) . ".class.php";

            if(!file_exists($file))
                $this->createFile($txt, $file);
        }
    }

    public function createFile($textFinal,$file){
        $myfile = \fopen($file, "w") or die("Unable to open file!");
        \fwrite($myfile, $textFinal);
        \fclose($myfile);
    }

}