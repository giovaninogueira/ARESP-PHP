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
     * Model constructor.
     */
    public function __construct()
    {
        self::$connection = new con();
    }

    /**
     * @return \ReflectionClass
     */
    private function getClass()
    {
        return new  \ReflectionClass($this);
    }

    /**
     * @return string
     * @details retorna o nome da classe instanciada
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
     */
    public function query($sql, $array = null)
    {
        try
        {
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $intruction = self::$connection->prepare($sql);
            $erro = $intruction->errorInfo();
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
     */
    public function getAttibutesName()
    {
        $array = $this->getClass()->getProperties();
        $return = array();

        foreach ($array as $index => $name)
        {
            if($name->name != 'connection')
                $return[] = $name->name;
        }
        return $return;
    }

    /**
     * @return array
     */
    public function getValuesAttibutes()
    {
        $array = $this->getAttibutesName();
        $return = array();

        foreach ($array as $index => $value)
        {
            if(!empty($this->{$value}))
                $return[$value] = $this->{$value};
        }
        return $return;
    }

    /**
     * @param int $limit
     * @return array
     */
    public function selectAll($limit = 10)
    {
        $sql = "select * from " . $this->getTbName();
        $array = $this->query($sql);

        return $array->fetchAll(\PDO::FETCH_ASSOC);
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
     * @details Faz o select conforme a regra definida no where
     */
    public function select()
    {
        if(!is_null($this->sql))
        {
            $sql = "SELECT * FROM " . $this->getTbName() . $this->sql;
            $array = $this->query($sql);
            $result = $array->fetchAll(\PDO::FETCH_ASSOC);
            if(count($result) != 0)
                return $result[0];
            else return $result;
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
            $array = $this->getValuesAttibutes();
            foreach ($array as $index => $values)
            {
                $sql .= $index . "=:" . $index . " ";
            }
            $this->query($sql,$array);
        }

        else
            new ExceptionFramework('Ocorreu um erro ao atualizar cadastro');
    }

    /**
     * @details Retorna o lastID da tabela
     */
    public function lastID()
    {
        return self::$connection->lastInsertId();
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
        $table_name = $this->getTbName();
        if(is_null($this->sql))
            $this->sql .= " WHERE " . $atribute . " " . $operator . " '" . $value . "' " . $oprador_logic;
        else
            $this->sql .= " " . $atribute . " " . $operator . " '" . $value . "' " . $oprador_logic . " ";
    }

    /**
     * @param $script
     * @param null $values
     * @return \PDOStatement
     * @details Caso precise que seja executada uma função em SQL possa ser inserida
     * um script
     */
    public function scriptSQL($script, $values = null)
    {
        return $this->query($script,$values);
    }

    /**
     * @param $sql
     * @return array
     */
    public function queryFetchAll($sql)
    {
        $retorno = $this->scriptSQL($sql);

        return $retorno->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return string
     */
    public function convertJson()
    {
        return \json_encode($this->getValuesAttibutes());
    }
}