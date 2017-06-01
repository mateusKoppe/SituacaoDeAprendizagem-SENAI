<?php

namespace controllers;

class CAmbientes extends Controller {

	public function AIndex() {
		$this->renderInStructure('VAmbiente');
	}

	public function ADetalhes() {
		$this->renderInStructure('VAmbienteDetails');
	}

}