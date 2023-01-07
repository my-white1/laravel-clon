<?php
namespace app\core;

class Web {

   public Route $route;

   public function __construct()
   {
       $this->route = new Route();
   }

    public function run()
    {
        echo $this->route->resolve();
    }

}