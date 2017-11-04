<?php

namespace SkyfallFramework\Common\Auth;

use SkyfallFramework\Kernel\Interfaces\Auth as authInterface;

class Auth implements authInterface
{
    use \SkyfallFramework\Kernel\Traits\Auth;
}