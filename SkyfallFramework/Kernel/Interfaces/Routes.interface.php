<?php

namespace SkyfallFramework\Kernel\Interfaces;

Interface Routes{
    public function addRoutes($array);
    public function offRoute($url, $methodHttp);
    public function onRoutes();
}