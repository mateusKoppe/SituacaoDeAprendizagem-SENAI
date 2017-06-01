<?php

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
		$controller_name = split('/', $test_controller);
		$controller_name = $controller_name[count($controller_name)-1];
		$action_name = split('/', $test_action);
		$action_name = $action_name[count($action_name)-1];
		$class = new $controller_name();
		if(method_exists($class, $action_name)){
			$class->$action_name();
			break;
		}
	}
	// echo $test_controller_file . "<br>";
	// echo $test_controller;
	// echo $test_action;
}

/*
$controller_name = value_or_default($pageParams[0], "index");
$controller_name = "C" . ucfirst($controller_name);
$controller_file = "controllers/$controller_name.php";
if(!include_if_file_exists($controller_file)){
	require_once("views/errors/404.html");
	exit();
}
$controller_class = new $controller_name();
$action_name = value_or_default($pageParams[1], "index");
$action_name = "A" . ucfirst($action_name);
if(!method_exists($controller_class, $action_name)){
	require_once("views/errors/404.html");
	exit();
}
$controller_class->$action_name();

/*
0 = /
A = CIndex
B = AIndex
/
	A/B
 
0 = /institucional
A = CIndex
B = AIndex
/institucional
	C0/b
	Institucional/CIndex/AIndex

0 = /institucional
1 = /verifica
/institucional/verifica
	CInstitucional/AVerifica
	institucional/CVerifica/AIndex
	institucional/verifica/CIndex/AIndex

/insticional

institucional
index
index

institucional/edit

institucional
edit
index
index


*/