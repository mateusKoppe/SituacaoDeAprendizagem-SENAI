<?php

define('DIR_PROJECT', './resources');

function value_or_default(&$string = "", $default = false){
	return !empty($string)?$string:$default;
}

function include_if_file_exists($file){
	$fileDir = DIR_PROJECT . "/" . $file;
	if(file_exists($fileDir)){
		require $fileDir;
		return true;
	}
	return false;
}

