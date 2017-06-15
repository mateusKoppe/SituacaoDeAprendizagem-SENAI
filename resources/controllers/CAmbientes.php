<?php

namespace controllers;

class CAmbientes extends Controller {

	public function AIndex() {
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$this->renderInStructure("VAmbiente", [
			'coursesCategories' => 	$coursesCategories
		]);
	}

	public function ADetalhes() {
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$this->renderInStructure("VAmbienteDetails", [
			'coursesCategories' => 	$coursesCategories
		]);
	}

}