<?php

namespace SkyfallFramework\Common\Exception;

use \Exception;
/**
 * Class ExceptionFramework
 * @package SkyfallFramework\Common\Exception
 * @author Giovani Cassiano Nogueira <giovani.cassiano@outlook.com>
 */
class ExceptionFramework
{
    private $exception;

    static $httpVersion;

    private $codeHttp;

    private $message;

    /**
     * @var array
     * @details Lista dos códigos de response HTTP
     */
    static $listCodeHttp = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        422 => 'Unprocessable Entity',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported');

    /**
     * @return array
     */
    public function getListCodeHttp()
    {
        return ExceptionFramework::$listCodeHttp;
    }

    /**
     * @param $message
     */
    public function setMessageException($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessageException()
    {
        return $this->message;
    }

    /**
     * @param $code
     */
    public function setCodeHttp($code)
    {
        $this->codeHttp = $code;
    }

    /**
     * @return mixed
     */
    public function getCodeHttp()
    {
        return $this->codeHttp;
    }

    /**
     * ExceptionFramework constructor.
     * @param $value
     * @param null $code
     * @throws Exception
     */
    public function __construct($value,$code = null)
    {
        if(is_int($value))
        {
            $this->setCodeHttp($value);
            $array = $this->getListCodeHttp();
            $this->setMessageException($array[$this->getCodeHttp()]);
            $this->toSend($this->getMessageException(),$this->getCodeHttp());
        }
        $this->setMessageException($value);
        $this->toSend($this->getMessageException(),$code);
    }

    /**
     * @param $msg
     * @param null $code
     * @throws Exception
     */
    private function toSend($msg, $code = null)
    {
        header('HTTP/1.1');
        http_response_code($code);
        throw new \Exception($msg,$code);
    }
}