<?php
function __autoload($class)
{
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$file = __DIR__ .  DIRECTORY_SEPARATOR . '..' .  DIRECTORY_SEPARATOR . $file . '.php';
	if(file_exists($file)){
		require_once($file);
	}else{
		if(preg_match("/app\\controllers/", $class)){
			// $base = $GLOBALS['config']['base'];
			// header("location: $base/error");
		}
	}
}

