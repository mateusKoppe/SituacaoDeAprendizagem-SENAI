<?php 

include_if_file_exists('controllers/Controller.php');

class CContato extends Controller {
	
	public function AIndex(){
		$this->renderInStructure("VContato");
	}

}