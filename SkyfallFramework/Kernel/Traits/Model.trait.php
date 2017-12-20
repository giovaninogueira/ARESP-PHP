<?php

namespace SkyfallFramework\Kernel\Traits;

use SkyfallFramework\Common\Database\Connection as con;
use SkyfallFramework\Common\Exception\ExceptionFramework;

/**
 * Trait Model
 * @package SkyfallFramework\Kernel\Traits
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
trait Model
{
    static $connection;
    private $sql = null;

    public function __construct()
    {
        self::$connection = new con();
    }

    private function getClass()
    {
        return new  \ReflectionClass($this);
    }

    public function getTbName(){
        $str = str_replace($this->getClass()->getNamespaceName() . '\\','',$this->getClass()->getName());
        return \strtolower($str);
    }

    /**
     * Realiza o insert conforme a classe instanciada
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
     * Faz o select da table, buscando todos os registros
     * caso tenha o limit ele limita a quantidade de retorno
     */
    public function selectAll($limit = 10)
    {
        $sql = "select * from " . $this->getTbName();
        $array = $this->query($sql);
        return $array->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Faz o Delete da tabela seguindo a regra
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
     * Faz o select conforme a regra definida no where
     */
    public function select()
    {
        if(!is_null($this->sql))
        {
            $sql = "SELECT * FROM " . $this->getTbName() . $this->sql;
            $array = $this->query($sql);
            return $array->fetchAll(\PDO::FETCH_ASSOC);
        }
        else
            return $this->selectAll();
    }

    /**
     * Faz o conforme a regra definida no wher
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
     * retorna o lastID da tabela
     */
    public function lastID()
    {
        return self::$connection->lastInsertId();
    }

    /**
     * Faz o insert passando a tabela e os valores
     */
    public function insert($table, $array_attr, $values)
    {
        $sql='insert into '.$table.' ('.\implode(',', $array_attr).') values (:'.\implode(',:',$array_attr).') ';
        $this->query($sql, $values);
    }

    /**
     * Função que é definida o where do select, delete, update
     */
    public function where($atribute, $operator, $value, $oprador_logic = null)
    {
        $table_name = $this->getTbName();
        if(is_null($this->sql))
            $this->sql .= " WHERE " . $atribute . " " . $operator . " " . $value . " " . $oprador_logic;
        else
            $this->sql .= " " . $atribute . " " . $operator . " " . $value . " " . $oprador_logic . " ";
    }


    /**
     * Caso precise que seja executada uma função em SQL possa ser inserida
     * um script
     */
    public function scriptSQL($script, $values = null)
    {
        return $this->query($script,$values);
    }

    public function queryFetchAll($sql)
    {
        $retorno = $this->scriptSQL($sql);
        return $retorno->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function convertJson()
    {
        return \json_encode($this->getValuesAttibutes());
    }


}