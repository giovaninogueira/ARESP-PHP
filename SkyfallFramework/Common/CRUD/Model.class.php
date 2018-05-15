<?php

namespace SkyfallFramework\Common\CRUD;

use SkyfallFramework\Common\Database\Connection as con;
use SkyfallFramework\Common\Exception\ExceptionFramework;

/**
 * Class Model
 * @package SkyfallFramework\Common\CRUD
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class Model
{
    /**
     * @var con
     */
    static $connection;

    /**
     * @var null
     */
    private $sql = null;

    /**
     * @var null
     */
    private $join = null;

    /**
     * @var null
     */
    private $showValues = null;

    /**
     * Model constructor.
     */
    public function __construct() {}

    /**
     * @return \ReflectionClass
     * @throws \ReflectionException
     */
    private function getClass()
    {
        return new \ReflectionClass($this);
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public function getTbName(){
        $str = str_replace($this->getClass()->getNamespaceName() . '\\','',$this->getClass()->getName());
        return \strtolower($str);
    }

    /**
     * @details Realiza o insert conforme a classe instanciada
     * e pega os atributos com seus valores e realiza o insert
     * devolvendo o last_id no atributo da classe Model
     */
    public function save()
    {
        $array_values = $this->getValuesAttibutes();
        $array_attr_name = [];
        foreach ($array_values as $index => $name)
        {
            $array_attr_name[] = $index;
        }
        $this->insert($this->getTbName(), $array_attr_name, $array_values);
    }

    /**
     * @param $sql
     * @param null $array
     * @return \PDOStatement
     * @throws \Exception
     */
    public function query($sql, $array = null)
    {
        try
        {
            #region Limpando variáveis de pesquisa
            $this->sql = null;
            $this->join = null;
            $this->showValues = null;
            #endregion

            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES,TRUE);
            $intruction = self::$connection->prepare($sql);
            $intruction->execute($array);

            return $intruction;
        }
        catch (\Exception $e)
        {
            new ExceptionFramework($e->getMessage());
        }
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getAttibutesName()
    {
        $array = $this->getClass()->getProperties();
        $return = array();
        foreach ($array as $index => $name)
        {
            if($name->name != 'connection' && !is_object($name->name))
                $return[] = $name->name;
        }
        return $return;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public function getValuesAttibutes()
    {
        $array = $this->getAttibutesName();
        $return = array();
        foreach ($array as $index => $value)
        {
            if(!is_null($this->{$value}) && !is_object($this->{$value}))
                $return[$value] = $this->{$value};
        }
        return $return;
    }

    /**
     * @param int $limit
     * @return array
     * @throws \Exception
     * @throws \ReflectionException
     */
    public function selectAll($limit = 100)
    {
        $sql = "select * from " . $this->getTbName() . " limit " . $limit;
        $array = $this->query($sql);
        $result = $array->fetchAll(\PDO::FETCH_ASSOC);
        $selectAll = array();
        foreach ($result as $index=> $res){
            $selectAll[] = array_change_key_case($res,CASE_LOWER);
        }
        return $selectAll;
    }

    /**
     * @details Faz o Delete da tabela seguindo a regra
     * definida pelo where
     */
    public function delete()
    {
        if(!is_null($this->sql))
            $sql = "DELETE FROM " . $this->getTbName() . $this->sql;
        else
            new ExceptionFramework('Ocorreu um erro ao deletar');
    }

    /**
     * @return array
     * @throws \Exception
     * @throws \ReflectionException
     */
    public function select()
    {
        if(!is_null($this->sql))
        {
            $sql = "SELECT * FROM " . $this->getTbName() . $this->sql;
            $array = $this->query($sql);
            $result = $array->fetchAll(\PDO::FETCH_ASSOC);
            if(count($result) != 0){
                $selectAll = array();
                foreach ($result as $index=> $res){
                    $selectAll[] = array_change_key_case($res,CASE_LOWER);
                }
                return $selectAll[0];
            }
            else
                return $result;
        }
        else
            return $this->selectAll();
    }

    /**
     * @details Faz o conforme a regra definida no Where
     */
    public function update()
    {
        $sql = "UPDATE " . $this->getTbName() . " SET ";
        if(!is_null($this->sql))
        {
            $r = array();
            $array = $this->getValuesAttibutes();
            foreach ($array as $index => $values)
            {
                $r[] = $index . "=:" . $index . ' ';
            }
            $sql .= \implode(', ',$r);
            $sql .= $this->sql;
            $this->query($sql,$array);
        }
        else
            new ExceptionFramework('Ocorreu um erro ao atualizar cadastro');
    }

    /**
     * @details Faz o insert passando a tabela e os valores
     */
    public function insert($table, $array_attr, $values)
    {
        $sql='insert into '.$table.' ('.\implode(',', $array_attr).') values (:'.\implode(',:',$array_attr).') ';
        $this->query($sql, $values);
    }

    /**
     * @details Função que é definida o where do select, delete, update
     */
    public function where($atribute, $operator, $value, $oprador_logic = null)
    {
        if(is_null($this->sql))
            $this->sql .= " WHERE " . $atribute . " " . $operator . " '" . $value . "' " . $oprador_logic;
        else
            $this->sql .= " " . $atribute . " " . $operator . " '" . $value . "' " . $oprador_logic . " ";
    }

    /**
     * @param array $array
     * @throws \ReflectionException
     */
    public function showValuesJoing($array = array())
    {
        $shows = array();
        if(count($array) != 0)
        {
            foreach ($array as $table => $value)
            {
                $shows[] = $table . "." . $value;
            }
            $this->showValues = "SELECT ".\implode(', ',$shows) . " FROM " . $this->getTbName();
        }
        else
            $this->showValues = "SELECT * FROM " . $this->getTbName();
    }

    /**
     * @param $table
     * @param $table_attr
     * @param $logic
     * @param $table2
     * @param $table2_attr
     * @param null $type
     * @throws \ReflectionException
     */
    public function joinAdd($table, $table_attr, $logic, $table2, $table2_attr, $type = NULL)
    {
        if(is_null($type))
            $this->makeSQLJoin('INNER', $table, $table_attr, $logic, $table2, $table2_attr);
        else
            $this->makeSQLJoin($type, $table, $table_attr, $logic, $table2, $table2_attr);
    }

    /**
     * @param $type
     * @param $table
     * @param $table_attr
     * @param $logic
     * @param $table2
     * @param $table2_attr
     * @throws \ReflectionException
     */
    private function makeSQLJoin($type, $table, $table_attr, $logic, $table2, $table2_attr)
    {
        if(is_null($this->showValues))
        {
            $this->join = "SELECT * FROM " . $this->getTbName();
            $join = ' ' . $type . ' JOIN '. $table . ' on ' . $table . "." . $table_attr;
            $join .= ' ' . $logic . ' ' . $table2 . '.' . $table2_attr;
            $this->join .= $join;
        }
        else
        {
            $join = ' ' . $type . ' JOIN '. $table . ' on ' . $table . "." . $table_attr;
            $join .= ' ' . $logic . ' ' . $table2 . '.' . $table2_attr;
            if(is_null($this->join))
            {
                $this->join .= $this->showValues;
            }
            $this->join .= $join;
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function join()
    {
        $this->join .= $this->sql;
        return $this->queryFetchAll($this->join);
    }

    /**
     * @param $script
     * @param null $values
     * @return \PDOStatement
     * @throws \Exception
     */
    public function scriptSQL($script, $values = null)
    {
        return $this->query($script, $values);
    }

    /**
     * @param $sql
     * @return array
     * @throws \Exception
     */
    public function queryFetchAll($sql)
    {
        $retorno = $this->scriptSQL($sql);
        return $retorno->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     * @throws \Exception
     * @throws \ReflectionException
     */
    private function getPrimaryKey()
    {
        $sql = "SHOW KEYS FROM " .$this->getTbName() ." WHERE Key_name = 'PRIMARY'";
        $result = $this->queryFetchAll($sql);
        if(count($result) == 1)
            return $result[0]['Column_name'];
    }

    /**
     * @return int
     * @throws \Exception
     * @throws \ReflectionException
     */
    public function lastID()
    {
        $primaryKey = $this->getPrimaryKey();
        $sql = "SELECT MAX(" . $primaryKey . ") as maxId from " . $this->getTbName();
        $result = $this->queryFetchAll($sql);
        if(count($result) == 0)
            return 0;
        return $result[0]['maxId'];
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    public function convertJson()
    {
        return \json_encode($this->getValuesAttibutes());
    }
}