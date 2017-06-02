<?php

require_once 'autoload.php';

session_start();


$page = value_or_default($_GET['page'], "");
$pageParams = split('/', $page);


$params = $pageParams;
$params[] = "index";
$params[] = "";
$params[] = "index";
$params = array_filter($params);

array_splice($params, 0, 0);

for($col = 0; $col < count($params) -1; $col++){
	$test_route = '';
	$test_controller = '';
	$test_action = '';
	for($index = 0; $index < count($params);$index++){
		if($col == $index){
			$test_controller = $test_route . "C" . ucfirst($params[$index]);
		}else if($col+1 == $index){
			$test_action = "$test_controller/A" . ucfirst($params[$index]);
			break;
		}else{
			$test_route .= "$params[$index]/";
		}
	}
	$test_controller_file = "controllers/$test_controller.php";
	if(include_if_file_exists($test_controller_file)){
		$controller_name = str_replace("/", "\\", $test_controller_file);
		$controller_name = str_replace(".php", "", $controller_name);
		$action_name = split('/', $test_action);
		$action_name = $action_name[count($action_name)-1];
		$class = new $controller_name();
		if(method_exists($class, $action_name)){
			$class->$action_name();
			break;
		}
	}
}
