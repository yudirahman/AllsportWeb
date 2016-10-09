<?php

/*Security
* Set On if development
* Set Off if relese
*/
session_start();
error_reporting(E_ALL);
ini_set('display_errors','On');


/*
* Define system need
*
*/
define('ROOT', dirname(dirname(dirname(__FILE__))));
define('ROOT_VIEW', dirname(dirname(dirname(__FILE__))).'/view/');
define('ROOT_ERROR', dirname(dirname(dirname(__FILE__))).'/Errors/');
define('ROOT_CONFIG', dirname(dirname(__FILE__)).'/config/');
define('ROOT_MODULES',dirname(dirname(__FILE__)).'/modules/');
define('SITEID','939D49BBCD1EA969A7AC142338A8EF2207627B8C');
define('SITEURL', '//'.$_SERVER['HTTP_HOST'].'/allsport/');
define('ASSETS', SITEURL.'assets/');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'phpmyadmin');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'allsport');
