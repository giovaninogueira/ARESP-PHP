<?php

namespace SkyfallFramework\Common\ORM;

use SkyfallFramework\Common\CRUD\Model;
use SkyfallFramework\Common\Database\Connection;
use SkyfallFramework\Common\ORM\ORMmodel;

/**
 * Class ORM
 * @package SkyfallFramework\Common\ORM
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class ORM extends Model
{
    #region Atributos
    private $list_tables      = array();
    private $list_atributos   = array();
    private $list_foreign_key = array();
    private $list_primary_key = array();
    private $con;
    #endregion

    /**
     * @author Giovani Cassiano Nogueira
     */
    #region Generate ORM
    public function generateORM()
    {
        echo "\n ## Inicialized ORM  ##\n";
        $this->getTables();
        $this->getColumns();
        $this->createTrait();
        $this->createClassModel();
        $this->createController();
        echo "\n ## Finalized ORM ##\n";
    }
    #endregion

    /**
     * @details Recupera as tabelas
     */
    #region Get Tables
    private function getTables()
    {
        $this->con = Connection::$list_connection;
        $sql = "select table_name as tabela FROM information_schema.tables where table_schema='".$this->con['DATABASE']."'";
        $list = $this->queryFetchAll($sql);
        foreach ($list as $index => $value)
        {
            $this->list_tables[] = $value['tabela'];
        }
    }
    #endregions

    /**
     * @details Recupera as colunas
     */
    #region Get Columns
    private function getColumns()
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
    #endregions

    /**
     * @details Recupera as chaves estrangeiras das tabelas
     */
    #region Get Foreign Key
    private function getForeignKey()
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
    #endregions

    /**
     * @details Recupera as cháves primárias das tabelas
     */
    #region Get Primary Key
    private function getPrimaryKey()
    {
        foreach ($this->list_tables as $index => $value)
        {
            $sql = "SHOW KEYS FROM " . $value . " WHERE KEY_NAME = 'PRIMARY'";
            $pes = $this->queryFetchAll($sql);
            $this->list_primary_key[$value] = $pes[0]['Column_name'];
        }
    }
    #endregion

    /**
     * @details Criar os arquivos de traits
     */
    #region Create Trait
    private function createTrait()
    {
        echo "\nGenerate Trait ... \n";
        foreach ($this->list_tables as $index => $table)
        {
            $model = "";
            $r = "";

            $modelOrm = new ORMmodel();
            $modelOrm->setTable(ucwords($table));

            if(key_exists($table,$this->list_foreign_key))
            {
                foreach ($this->list_foreign_key[$table] as $key => $value)
                {
                    if($value['referencia'] == $table)
                    {
                        $model = " as " . ucwords($value['referencia']) . "Model";
                        $r = "Model";
                    }
                    $modelOrm->createUse(ucwords($value['referencia']).$model, 'Model');
                    $modelOrm->createAtributoRef(ucwords($value['referencia']));
                    $modelOrm->createSetRef($value['referencia'],$r);
                    $modelOrm->createGet($value['referencia']);
                }
            }
            foreach ($this->list_atributos[$table] as $i => $atributo)
            {
                $modelOrm->createAtribute(strtolower($atributo['Field']), $atributo['Type']);
                $modelOrm->createSet($atributo['Field']);
                $modelOrm->createGet($atributo['Field']);
            }
            $file = $this->path("Traits",ucwords($table),'trait');
            $this->createFile($modelOrm->createFiles(), $file);
        }
        echo "Finalized Trait \n";
    }
    #endregion

    /**
     * @details Cria os arquivos models
     */
    #region Create Class Model
    private function createClassModel()
    {
        echo "\nGenerate Model ... \n";
        foreach ($this->list_tables as $index => $table)
        {
            $model = new ORMmodel();
            $model->createUse(ucwords($table),'Traits');
            $file = $this->path("Model",ucwords($table),'class');
            if(!file_exists($file))
                $this->createFile($model->createModel(ucwords($table)), $file);
            else  echo "File Exist in $file \n";
        }
        echo "Finalized Model \n";
    }
    #endregion

    /**
     * @details Cria os arquivos de controllers
     */
    #region Create Controller
    private function createController()
    {
        echo "\nGenerate Controller ... \n";
        foreach ($this->list_tables as $index => $table)
        {
            $model = new ORMmodel();
            $file = $this->path("Controller",ucwords($table),'class');
            if(!file_exists($file))
                $this->createFile($model->createController(ucwords($table)), $file);
            else  echo "File Exist in $file \n";
        }
        echo "Finalized Controller \n";
    }
    #endregion

    /**
     * @param $textFinal
     * @param $file
     * @details Cria os arquivos em duas devidas pastas
     */
    #region Create File
    private function createFile($textFinal,$file){
        echo 'create file in ' . $file . "\n";
        $myfile = \fopen($file, "w") or die("Unable to open file!");
        \fwrite($myfile, $textFinal);
        \fclose($myfile);
    }
    #endregion

    /**
     * @param $type
     * @param $table
     * @return string
     * @details retorna o caminho dos arquivos que vão ser gerados
     */
    #region Path
    private function path($type, $table, $model)
    {
        $path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR;
        $path .= ".." . DIRECTORY_SEPARATOR . "Data" . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR;
        $path .= ucwords($table) . "." .$model .".php";
        return $path;
    }
    #endregion
}