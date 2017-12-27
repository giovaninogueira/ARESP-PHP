<?php

namespace SkyfallFramework\Kernel\Traits;

/**
 * Trait RestFull
 * @package SkyfallFramework\Kernel\Traits
 * @author Giovani Cassiano Nogueira
 */
trait RestFull
{
    /**
     * @var null
     */
    public $params = null;

    /**
     * @var null
     */
    public $urlFinal = null;

    /**
     * @param $routes
     * @param $url
     * @details Faz as verificações dos parametros das rotas e verifica a URL de request
     *          recupera os parametos da url GET caso tenha
     */
    public function checkUrl($routes, $url)
    {
        $listUrl = array_filter(explode('/', $url));
        $countUrl = count($listUrl);

        foreach ($routes as $index => $value)
        {
            /**
             * @detaisl Variáveis locais
             */
            $provi = $index;
            $params = null;
            $urlFinal = null;

            /**
             * @details Lista de parametos das rotas do config
             */
            $listRoutes = array_filter(explode('/',$index));

            /**
             * @details Se o número de parametos da url é igual ao número de parametos da url do config
             */
            if(count($listRoutes) == $countUrl)
            {
                /**
                 * @details Percorre todos os parametos da url do config
                 */
                foreach ($listRoutes as $i => $result)
                {
                    /**
                     * @details Se o parametro do index (i) é igual ao
                     * parametro da mesmoa posição da url do request
                     */
                    if($listRoutes[$i] == $listUrl[$i])
                        continue;

                    /**
                     * @details Se existir algum parametro com a (\:) entra no if
                     */
                    if(preg_match("/\:.*?$/", $result, $output_array))
                    {
                        $params[explode(':',$output_array[0])[1]] = $listUrl[$i];
                        unset($output_array);
                        continue;
                    }

                    /**
                     * @details Limpa a variavel provi, params e realiza um break
                     */
                    $provi = null;
                    $params = [];
                    break;
                }
            }
            else
                continue;

            /**
             * @details Se a variável provi seja diferente de nula
             */
            if(!is_null($provi))
            {
                $this->urlFinal = $provi;
                $this->params = $params;
                break;
            }
        }
    }
}