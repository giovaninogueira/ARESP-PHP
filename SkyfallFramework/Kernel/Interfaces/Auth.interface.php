<?php

namespace SkyfallFramework\Kernel\Interfaces;

interface Auth
{
    public function authentication();

    public function createToken();

}