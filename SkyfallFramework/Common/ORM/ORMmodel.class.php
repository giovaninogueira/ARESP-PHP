<?php

namespace SkyfallFramework\Common\ORM;

/**
 * Class ORMmodel
 * @package SkyfallFramework\Common\ORM
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class ORMmodel
{
    #region Atributos
    private $use = "";
    private $getSet = "";
    private $atributos = "";
    private $table;
    private $type;
    private $referencia;
    private $model;
    #endregion

    #region Get e Sets
    /**
     * @param $use
     */
    public function setUse($use)
    {
        $this->use = $use;
    }

    /**
     * @return string
     */
    public function getUse()
    {
        return $this->use;
    }

    /**
     * @param $getSet
     */
    public function setGetSet($getSet)
    {
        $this->getSet = $getSet;
    }

    /**
     * @return string
     */
    public function getGetSet()
    {
        return $this->getSet;
    }

    /**
     * @param $atributos
     */
    public function setAtributos($atributos)
    {
        $this->atributos = $atributos;
    }

    /**
     * @return string
     */
    public function getAtributos()
    {
        return $this->atributos;
    }

    /**
     * @param $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $referencia
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    /**
     * @return mixed
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * @param $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
    #endregion das

    /**
     * @return string
     * @details Retorna o texto para criar os arquivos de traits
     */
    #region CreateTrait
    public function createFiles()
    {
        $php = "<?php\n\n";
        $php .= "/**\n";
        $php .= "* Skyfall Micro-Framework\n";
        $php .= "* Generate ORM Trait" . "\n";
        $php .= "* Version 1.0.0\n";
        $php .= "*/\n\n";
        $php .= "namespace Data\Traits;\n";
        $php .= $this->use . "\n\n";
        $php .=  "trait " . $this->table;
        $php .= "\n{";
        $php .= "\n\tpublic function ____construct()";
        $php .= "\n\t{\n";
        $php .= "\n\t}\n\n";
        $php .= $this->atributos;
        $php .= $this->getSet;
        $php .= "\n}";
        return $php;
    }
    #endregion

    /**
     * @return string
     * @details Retorna o texto para criar os arquivos utils
     */
    public function createUtils()
    {
        $php = "<?php\n\n";
        $php .= "/**\n";
        $php .= "* Skyfall Micro-Framework\n";
        $php .= "* Generate ORM Controller" . "\n";
        $php .= "* Version 1.0.0\n";
        $php .= "**/\n\n";
        $php .= "namespace Data\UtilData; \n\n";
        $php .= "class UtilData";
        $php .= "\n{\n";
        $php .= "\t/**\n";
        $php .= "\t* Skyfall Micro-Framework\n";
        $php .= "\t* UtilData body" . "\n";
        $php .= "\t* Version 1.0.0\n";
        $php .= "\t**/";
        $php .= "\n}";
        return $php;
    }

    /**
     * @param $table
     * @return string
     * @details Retorna o texto para criar os arquivos de models
     */
    #region CreateModel
    public function createModel($table)
    {
        $php = "<?php\n\n";
        $php .= "/**\n";
        $php .= "* Skyfall Micro-Framework\n";
        $php .= "* Generate ORM Model" . "\n";
        $php .= "* Version 1.0.0\n";
        $php .= "*/\n\n";
        $php .= "namespace Data\Model; \n\n";
        $php .= "use SkyfallFramework\Common\CRUD\Model;\n\n";
        $php .= "class " . $table;
        $php .= " extends Model";
        $php .= "\n{";
        $php .= "\n\t" . $this->use;
        $php .= "\n}";
        return $php;
    }
    #endregion

    /**
     * @param $table
     * @return string
     * @details Retorna o texto para criar os arquivos de controller
     */
    #region CreateController
    public function createController($table)
    {
        $php = "<?php\n\n";
        $php .= "/**\n";
        $php .= "* Skyfall Micro-Framework\n";
        $php .= "* Generate ORM Controller" . "\n";
        $php .= "* Version 1.0.0\n";
        $php .= "*/\n\n";
        $php .= "namespace Data\Controller; \n\n";
        $php .= "class " . $table;
        $php .= "\n{\n";
        $php .= "\t/**\n";
        $php .= "\t* Skyfall Micro-Framework\n";
        $php .= "\t* Controller's body" . "\n";
        $php .= "\t* Version 1.0.0\n";
        $php .= "\t**/\n";
        $php .= "\tpublic function create($"."param = null)";
        $php .= "\n\t{";
        $php .= "\n\t\t/*Mehtod POST HTTP*/";
        $php .= "\n\t}\n";
        $php .= "\tpublic function search($"."param = null)";
        $php .= "\n\t{";
        $php .= "\n\t\t/*Mehtod GET HTTP*/";
        $php .= "\n\t}\n";
        $php .= "\tpublic function update($"."param = null)";
        $php .= "\n\t{";
        $php .= "\n\t\t/*Mehtod PUT HTTP*/";
        $php .= "\n\t}\n";
        $php .= "\tpublic function delete($"."param = null)";
        $php .= "\n\t{";
        $php .= "\n\t\t/*Mehtod DELETE HTTP*/";
        $php .= "\n\t}\n";
        $php .= "\n}";
        return $php;
    }
    #endregion

    /**
     * @param $referencia
     * @param string $model
     * @details Cria o set com referencia para objeto passando para o atributo getSet
     */
    #region CreateSetRef
    public function createSetRef($referencia, $model = "")
    {
        $set = "\n\tpublic function set" . ucfirst(strtolower($referencia));
        $set .= "(";
        $set .= " $" . strtolower($referencia) . ")\n";
        $set .= "\t{\n";
        $set .= "\t\t$" . "this->" . strtolower($referencia) . " = $" . strtolower($referencia) . ";";
        $set .= "\n\t}";
        $set .= "\n\n";
        $this->getSet .= $set;
    }
    #endregion

    /**
     * @param $referencia
     * @details Cria o set passando para o atributo getSet
     */
    #region CreateSet
    public function createSet($referencia)
    {
        $set = "\n\tpublic function set" . ucfirst(strtolower($referencia));
        $set .= "($" . strtolower($referencia) . ")\n";
        $set .= "\t{\n";
        $set .= "\t\t$" . "this->" . strtolower($referencia) . " = $" . strtolower($referencia) . ";";
        $set .= "\n\t}";
        $set .= "\n\n";
        $this->getSet .= $set;
    }
    #endregion

    /**
     * @param $referencia
     * @details Cria o get passando para o atributo getSet
     */
    #region CreateGet
    public function createGet($referencia)
    {
        $get = "\n\tpublic function get" . ucfirst(strtolower($referencia));
        $get .= "()";
        $get .= "\n\t{\n";
        $get .= "\t\treturn $" . "this->" . strtolower($referencia) . ";";
        $get .= "\n\t}";
        $get .= "\n\n";
        $this->getSet .= $get;
    }
    #endregion

    /**
     * @param $value
     * @details Cria os atributos com referencias
     */
    #region CreateAtributoRef
    public function createAtributoRef($value)
    {
        $this->atributos .= "\tprotected $" . strtolower($value) . "; \n\t// References - " . $value ." \n\n";
    }
    #endregion

    /**
     * @param $value
     * @param $type
     * @details cria os atributos com os tipos de dados da coluna comentados
     */
    #region CreateAtribute
    public function createAtribute($value, $type)
    {
        $this->atributos .= "\tprotected $" . strtolower($value) . "; \n\t// " . $type ." \n\n";
    }
    #endregion

    /**
     * @param $value
     * @details Cria os uses dos arquivos
     */
    #region CreateUse
    public function createUse($value, $path)
    {
        $this->use .= "use \Data\\" . $path ."\\" . $value . ";\n";
    }
    #endregion
}