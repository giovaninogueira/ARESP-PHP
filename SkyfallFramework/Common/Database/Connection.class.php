<?php

namespace SkyfallFramework\Common\Database;

use SkyfallFramework\Kernel\Interfaces\Connection as connection_interface;

class Connection implements connection_interface
{
    use \SkyfallFramework\Kernel\Traits\Connection;
}