<?php

namespace controllers;

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
