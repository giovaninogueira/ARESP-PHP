<?php

namespace SkyfallFramework\Kernel\Traits;

use SkyfallFramework\Common\Database\Connection as con;
use SkyfallFramework\Common\Exception\ExceptionFramework;

trait Model
{
    static $connection;

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
        $sql = "select * from  teste";
        $array = $this->query($sql);
        return $array->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Faz o Delete da tabela seguindo a regra
     * definida pelo where
     */
    public function delete()
    {

    }

    /**
     * Faz o select conforme a regra definida no where
     */
    public function select()
    {

    }

    /**
     * Faz o conforme a regra definida no wher
     */
    public function update()
    {

    }

    /**
     * retorna o lastID da tabela
     */
    public function lastID()
    {
        return con::$connection->lastInsertId();
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
    public function where($table = null, $atribute, $operator, $value)
    {

    }

    /**
     * Ordena a pesquisa (select)
     */
    public function orderBy($atribute, $order = null)
    {

    }

    /**
     * Faz o inner join
     */
    public function innerJoin($table,$atribute,$operador,$table_select,$atribute2)
    {

    }

    /**
     * Caso precise que seja executada uma função em SQL possa ser inserida
     * um script
     */
    public function scriptSQL($script)
    {

    }

    private function getFieldsWithValues()
    {

    }

    public function convertJson()
    {
        return \json_encode($this->getValuesAttibutes());
    }


}