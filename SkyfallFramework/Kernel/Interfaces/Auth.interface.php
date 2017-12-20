<?php

namespace SkyfallFramework\Kernel\Interfaces;

/**
 * Interface Auth
 * @package SkyfallFramework\Kernel\Interfaces
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
interface Auth
{
    public function authentication();

    public function createToken();

}