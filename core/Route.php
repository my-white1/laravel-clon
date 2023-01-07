<?php

namespace app\core;


class Route{

    public Request $request;

    public array $routes = [];

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get(string $url , $action)
    {
        $this->routes['get'][$url] = $action;
    }
    public function post(string $url , $action)
    {
        $this->routes['post'][$url] = $action;
    }

    public function resolve()
    {
        $url = $this->request->getUrl();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$url];
        if(!is_string($callback)){

            if(is_array($callback)){
                $callback[0] = new $callback[0]();
            }
            call_user_func($callback);

        } else {
            return $this->view($callback);
        }
    }

    public function view($callback){
        ob_start();
        include "views/$callback.php";
        return ob_get_clean();
    }

}

