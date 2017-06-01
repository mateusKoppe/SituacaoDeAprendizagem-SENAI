<?php

include_if_file_exists('controllers/Controller.php');

class CIndex extends Controller{
	public function AIndex(){
				
		$this->whenGet(function(){
			$this->renderInStructure("VHome");
		});
		
		$this->whenPost(function(){
			echo "ok";
		});
		
	}
}
