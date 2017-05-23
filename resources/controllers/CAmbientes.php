<?php

require 'Controller.php';

class CAmbientes extends Controller {

	public function AIndex() {
		$this->renderInStructure('VAmbiente');
	}

}