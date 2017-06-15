<?php

namespace controllers;

class CInstitucional extends Controller {

	public function AIndex() {
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$this->renderInStructure("VInstitucional", [
			'coursesCategories' => 	$coursesCategories
		]);
	}

}