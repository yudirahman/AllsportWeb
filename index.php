<?php
/*
* 
*
**/

/*include config*/
require 'app/config/config.php';
require 'app/config/route.php';
require 'app/config/database.php';

/*Include modules*/
require 'app/modules/base.php';

/*jalankan router*/
$router = new route();
$router->run();

/*enfd of file*/
