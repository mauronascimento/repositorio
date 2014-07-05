<?php

function __autoload($class) 
{

	$class = APP_ROOT.DS.str_replace('\\', DS, $class.'.php');

	try {
	  if(!file_exists($class)) {
	 	throw new Exception ("Fle path '{$class}' not found"); 
	 }
	}catch (Exception $e) {
			$e->getMessage();
	}
	//echo $class; die;
	require_once($class);
  
}
