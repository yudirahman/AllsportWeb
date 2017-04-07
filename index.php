<?php
require 'vendor/autoload.php';
require 'app/config/config.php';
spl_autoload_register(function ($class) {
    require 'app/core/'.$class.'.php';
});

$router = new route();
$router->run();
