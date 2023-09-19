<?php


namespace myfream;


class Application
{
private $id = null;

    public function run(){
        $url = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
        $className = "controllers\\".ucfirst($url[0])."Controller";
        $method = $url[1];
        if (isset($url[2])){
            $this->id = $url[2];
        }
        $controller = new $className();

        //CHECK CLASS METHODS
       /* if (!empty($url[1])){
            $controller->{$method}();
        }*/
        //GET PARAM CHECK
        if (is_null($this->id)){
            $controller->{$method}();
        }else{
            $controller->{$method}($this->id);
        }
    }
}