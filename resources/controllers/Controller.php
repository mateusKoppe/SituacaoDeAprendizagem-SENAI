<?php

class Controller {
	
	protected $method;
	
	const POST = "POST";
	const GET = "GET";
	const PUT = "PUT";
	const DELETE = "DELETE";
	
	function __construct() {
		$this->method = $_SERVER['REQUEST_METHOD'];
	}

	protected function renderInStructure($view, $data = [], $structure = ""){
		switch ($structure) {
			default:
				$this->render('structure/header');
				$this->render($view, $data);
				$this->render('structure/footer');
				break;
		}
	}

	protected function getParams($index){
		$paramList = split("/", value_or_default($_GET['page'], ""));
		return $paramList[$index + 1];
	} 

	protected function render($view, $data = []){
		require(APLICATION_DIR . "/views/$view.php");
	}
	
	protected function redirect($url){
		header("location: $url");
	}

	protected function whenGet($callback) {
		if($this->method == self::GET){
			$callback();
			return true;
		}
		return false;
	}
	
	protected function whenPost($callback, $redirect = false) {
		if($this->method == self::POST){
			$callback();
			if($redirect){
				$this->redirect($redirect);
			}
			return true;
		}
		return false;
	}
	
	protected function whenPut($callback) {
		if($this->method == self::PUT){
			$callback();
			return true;
		}
		return false;
	}
	
	protected function whenDelete($callback) {
		if($this->method == self::DELETE){
			$callback();
			return true;
		}
		return false;
	}
	
}
