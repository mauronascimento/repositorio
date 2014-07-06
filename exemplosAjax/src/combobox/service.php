<?php
require_once('../../public/bootstrap.php');
use src\dataAccess\DataAccess;

$teste = new DataAccess();
$teste->getAll($_REQUEST['carrega'], $_REQUEST['params']);
