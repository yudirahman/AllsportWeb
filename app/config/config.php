<?php

/*
* Define system need
*
*/
if (phpversion() < '5.6.16') {die('Minimum php version 5.6.16');}
session_start();
error_reporting(E_ALL);
define('DISPLAY_ERRMSG', TRUE);
(DISPLAY_ERRMSG == TRUE ) ? ini_set('display_errors', 'On') : ini_set('display_errors', 'Off');
define('ROOT', dirname(dirname(dirname(__FILE__))));
define('ROOT_VIEW', dirname(dirname(dirname(__FILE__))).'/view/');
define('ROOT_ERROR', dirname(dirname(dirname(__FILE__))).'/Errors/');
define('ROOT_FILES', dirname(dirname(dirname(__FILE__))).'/files/');
define('ROOT_LIBS', dirname(dirname(__FILE__)).'/libs/');
define('ROOT_CONFIG', dirname(dirname(__FILE__)).'/config/');
define('ROOT_MODULES',dirname(dirname(__FILE__)).'/modules/');
define('ROOT_MODULES_ADMIN',dirname(dirname(__FILE__)).'/modules/idtadmin/');
define('URL_ADMIN','adminmode');
define('SITEID','939D49BBCD1EA969A7AC142338A8EF2207627B8C');
define('SITEURL', '//'.filter_input(INPUT_SERVER,'HTTP_HOST').'/allsport/');
define('ASSETS', SITEURL.'assets/');
define('TEMPLATE_WEB','template.web');
define('TEMPLATE_ADMIN','template.admin');
define('FILES', SITEURL.'files/');

//define('DB_HOST', '85.255.8.190');
define('DB_HOST', 'localhost');
//define('DB_USERNAME', 'sudana');
define('DB_USERNAME', 'root');
//define('DB_PASSWORD', 'root123456');
define('DB_PASSWORD', '');
define('DB_NAME', 'allsport2');
