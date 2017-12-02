<?php

namespace SkyfallFramework\Kernel\Interfaces;

interface Model
{
    /**
     * Realiza o insert conforme a classe instanciada
     * e pega os atributos com seus valores e realiza o insert
     * devolvendo o last_id no atributo da classe Model
     */
    public function save();

    /**
     * Faz o select da table, buscando todos os registros
     * caso tenha o limit ele limita a quantidade de retorno
     */
    public function selectAll($limit = 10);

    /**
     * Faz o Delete da tabela seguindo a regra
     * definida pelo where
     */
    public function delete();

    /**
     * Faz o select conforme a regra definida no where
     */
    public function select();

    /**
     * Faz o conforme a regra definida no wher
     */
    public function update();

    /**
     * retorna o lastID da tabela
     */
    public function lastID();

    /**
     * Faz o insert passando a tabela e os valores
     */
    public function insert($table, $array_attr, $values);

    /**
     * Função que é definida o where do select, delete, update
     */
    public function where($table = null, $atribute, $operator, $value);

    /**
     * Ordena a pesquisa (select)
     */
    public function orderBy($atribute, $order = null);

    /**
     * Faz o inner join
     */
    public function innerJoin($table,$atribute,$operador,$table_select,$atribute2);

    /**
     * Caso precise que seja executada uma função em SQL possa ser inserida
     * um script
     */
    public function scriptSQL($script);
}