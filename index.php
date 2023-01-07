<?php

use app\controllers\TestController;

include "vendor/autoload.php";
$web = new \app\core\Web();

$web->route->get('/' , function (){
    echo "you're welcome !";
});
$web->route->get('/test' , [TestController::class, 'test']);
$web->route->get('/contact' , 'contact');

$web->run();