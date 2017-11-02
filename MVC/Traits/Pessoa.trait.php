<?php

namespace MVC\Traits;

trait Pessoa{
    public $teste;
    public function savePessoa($obj)
    {
        var_dump($obj->nome);
    }
}