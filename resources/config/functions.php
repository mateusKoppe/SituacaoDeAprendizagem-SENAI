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

function generate_file_name($file){
	$image_name = time() . rand(0, 99999999);
	$image_original_name_array = explode(".", $file);
	$image_name = $image_name . "." . $image_original_name_array[count($image_original_name_array) - 1];
	return $image_name;
}