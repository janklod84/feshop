<?php

/**
 * Constantes
 */
define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT.'/public');
define("APP", ROOT.'/app');
define("CACHE", ROOT.'/tmp/cache');
define("CONFIG", ROOT.'/config');
define("CORE", ROOT.'/src');
define("LIBS", ROOT.'/src/libs');
define("LAYOUT", 'luxury'); // default

// http://eshop.loc/public/index.php
$app_path = sprintf('http://%s%s', $_SERVER['HTTP_HOST'], $_SERVER['PHP_SELF']);


// remove script name
// шаблон: "#[^/]+$#", значит ищем все симболы кроме slashes '/' начинающий с конце строки
// http://eshop.loc/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);

// remove public
// http://eshop.loc/
$app_path = str_replace('/public/', '', $app_path);

define('BASE_URL', $app_path);
define('ADMIN', BASE_URL.'/admin');


// Autoloading classes
require_once ROOT.'/vendor/autoload.php';

// Include Functions
require_once LIBS .'/functions.php';


// Set aliases
class_alias('Framework\Routing\Router', 'Router');
class_alias('\RedBeanPHP\R', '\R');

// Inclure Routes
require APP.'/routes.php';