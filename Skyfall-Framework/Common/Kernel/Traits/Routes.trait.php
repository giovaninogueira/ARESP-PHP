<?php

namespace Common\Kernel\Traits;

use Common\Kernel\Model\Routes as routesModel;

Trait Routes{

    private $routesModel;

    function  __construct()
    {
        $this->routesModel = new routesModel();
    }

    public function addRoutes($array)
    {
        routesModel::$listaRoutes=$array;
    }
    public function offRoute($url, $methodHttp)
    {

    }
    public function onRoutes()
    {
        $this->routesModel->setMethodHTTP($_SERVER['REQUEST_METHOD']);
        $this->routesModel->setUrl($_SERVER['PATH_INFO']);
        $this->rulesRoutes();
    }

    private function runFunction()
    {
        $this->getParams();
    }

    private function callFunction()
    {
        $objRoutes = $this->routesModel->getObjRoutes();
        $controller = new $objRoutes['Controller'];
        if(!method_exists($controller,$this->routesModel->getMethod()))
            throw new \Exception('Método inválido');
    }

    private function getParams()
    {
        $lista = [];
        $paramsObj = $this->routesModel->getObjRoutes();
        /*verificando se a rota deve receber parametros junto a URL*/
        if(key_exists('Params',$paramsObj))
        {

            $count_Request = count($_REQUEST);
            $count_Params = count($paramsObj['Params']);

            if (!($count_Params == $count_Request))
                throw new \Exception('Não foi enviado todos os parametros');
            foreach ($paramsObj['Params'] as $params)
            {
                if (!key_exists($params, $_REQUEST))
                    throw new \Exception('Parametro Inválido');
                $lista[$params] = $_REQUEST[$params];
            }
            $this->routesModel->setParams($lista);
        }
    }

    public function rulesRoutes()
    {
        /*Verificando se a rota permitite o metodo HTTP*/
        if(!key_exists($this->routesModel->getMethodHTTP(),routesModel::$listaRoutes))
            throw new \Exception('Não existe nenhuma rota para essa função');

        $routes = routesModel::$listaRoutes[$this->routesModel->getMethodHTTP()];

        /*Validando se a URL tem nas rotas*/
        if(!key_exists($this->routesModel->getUrl(),$routes))
            throw new \Exception('Não existe essa URL');

        $this->routesModel->setObjRoutes($routes[$this->routesModel->getUrl()]);
        $this->getParams();
    }

}