<?php

namespace app\core;

class Request{
    public function getMethod(){
        return strtolower( $_SERVER['REQUEST_METHOD']);
    }
    public function getUrl(){
        return strtolower( $_SERVER['REQUEST_URI']);
    }
}