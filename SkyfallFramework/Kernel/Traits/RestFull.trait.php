<?php

namespace SkyfallFramework\Kernel\Traits;

trait RestFull
{
    public $params = null;
    public $urlFinal = null;

    public function checkUrl($routes, $url)
    {
        $provi = null;
        $urlFinal = null;
        $params = null;

        foreach ($routes as $index => $value)
        {
            $listRoutes = array_filter(explode('/',$index));
            $listUrl = array_filter(explode('/', $url));

            if(count($listRoutes) == count($listUrl))
            {
                foreach ($listRoutes as $i => $result)
                {
                    preg_match("/\:.*?$/", $result, $output_array);
                    if(isset($output_array[0]))
                    {
                        if(is_null($output_array[0]))
                        {
                            if(!($listRoutes[$i] == $listUrl[$i]))
                            {
                                $provi = null;
                                $this->params = [];
                                break;
                            }
                            $provi = $index;
                        }
                        else
                        {
                            $this->params[] = [$output_array[0] => $listUrl[$i]];
                        }
                    }else
                    {
                        $provi = $index;
                        if(!($listRoutes[$i] == $listUrl[$i]))
                        {
                            $provi = null;
                            $this->params = [];
                            break;
                        }
                    }

                }
            }
            if(!is_null($provi))
                $urlFinal = $provi;

            if(count($this->params) !=0)
                $params =  $this->params;
        }
        $this->urlFinal = $urlFinal;
        $this->params = $params;
    }

    public function checkParams()
    {
        $list = array();
        if(count($this->params) != 0)
            foreach ($this->params as $i => $r)
            {
                $key = key($r);
                preg_match("/\:.*?$/", $key, $output_array);
                    $list[explode(':',$output_array[0])[1]] = $r[$key];
            }
        return $list;
    }
}