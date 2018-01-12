<?php

/**
* Skyfall Micro-Framework
* Generate ORM Controller
* Version 1.0.0
*/

namespace Data\Controller; 

class Tipo_socio
{
/**
* Skyfall Micro-Framework
* Controller's body
* Version 1.0.0
*/

    public function getList()
    {
        $obj = new \Data\Model\Tipo_socio();
        $result = $obj->selectAll();
        return $result;
    }
}