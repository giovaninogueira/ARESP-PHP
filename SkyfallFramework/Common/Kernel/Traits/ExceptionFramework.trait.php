<?php

namespace SkyfallFramework\Common\Kernel\Traits;
use \Exception;
use SkyfallFramework\Common\Kernel\Model\ExceptionFramework as model;

trait ExceptionFramework
{
    private $exception;
    static $httpVersion;

    public function __construct($value)
    {
        $this->exception = new model();
        if(is_int($value))
        {
            $this->exception->setCodeHttp($value);
            $array = $this->exception->getListCodeHttp();
            $this->exception->setMessageException($array[$this->exception->getCodeHttp()]);
            $this->toSend($this->exception->getMessageException(),$this->exception->getCodeHttp());
        }

        $this->exception->setMessageException($value);
        $this->toSend($this->exception->getMessageException());
    }

    private function toSend($msg, $code = null)
    {
        header('HTTP/1.1');
        throw new \Exception($msg,$code);
    }

}