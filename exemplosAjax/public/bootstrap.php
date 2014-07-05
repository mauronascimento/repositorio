<?php

ini_set('display_error', 1);
error_reporting(E_ALL | E_STRICT);
date_default_timezone_set('America/Sao_Paulo');

define('DS', DIRECTORY_SEPARATOR);
define('APP_ROOT', realpath(__DIR__.DS.'..'));

$autoload = APP_ROOT.DS.'public'.DS.'autoload.php';

if(!file_exists($autoload)) {
  die('File not found');
}

  require_once($autoload);

