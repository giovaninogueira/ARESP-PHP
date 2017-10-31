<?php

namespace MVC\Controller;

use MVC\Interfaces\Pessoa as pessoaInterface;

class Pessoa implements pessoaInterface
{
    use \MVC\Traits\Pessoa;
}