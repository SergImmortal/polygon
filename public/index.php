<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set("xdebug.overload_var_dump", "off");

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once ROOT.DS.'Engine'.DS.'Init.php';

$application = new Application();
$application->run();