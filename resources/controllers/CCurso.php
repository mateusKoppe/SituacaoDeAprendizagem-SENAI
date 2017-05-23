<?php

require 'Controller.php';

class CCurso extends Controller{
		
	public function AIndex(){
		$this->renderInStructure("VCursoIndex");
	}

	public function ADetalhes(){
		echo $this->getParams(1);
	}
		
}
