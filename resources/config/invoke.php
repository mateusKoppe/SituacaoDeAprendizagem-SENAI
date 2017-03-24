<?php
$page = value_or_default($_GET['page'], "");

$pageParams = split('/', $page);

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