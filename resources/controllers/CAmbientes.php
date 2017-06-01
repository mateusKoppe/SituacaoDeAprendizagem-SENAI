<?php

include_if_file_exists('controllers/Controller.php');

class CAmbientes extends Controller {

	public function AIndex() {
		$this->renderInStructure('VAmbiente');
	}

	public function ADetalhes() {
		$this->renderInStructure('VAmbienteDetails');
	}

}