<?php

namespace SkyfallFramework\Common\Kernel\Traits;
use \Exception;
use SkyfallFramework\Common\Kernel\Model\ExceptionFramework as model;

trait ExceptionFramework
{
    private $exception;
    static $httpVersion;

    public function __construct($menssage = null, $code = null)
    {
        $this->exception = new model();
        if(is_null($menssage))
        {
            $this->exception->setCodeHttp($code);
            $array = $this->exception->getListCodeHttp();
            $this->exception->setMessageException($array[$this->exception->getCodeHttp()]);
            $this->toSend($this->exception->getMessageException(),$this->exception->getCodeHttp());
        }
        $this->exception->setMessageException($menssage);
        $this->toSend($this->exception->getMessageException());
    }

    private function toSend($msg, $code = null)
    {
        throw new \Exception($msg,$code);
    }

   /*private function seachCodeHttp()
    {
        $array = $this->exception->getListCodeHttp();
        $this->exception->setMessageException($array[$this->exception->getCodeHttp()]);
    }*/

}