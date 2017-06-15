<?php

namespace controllers;

class CContato extends Controller {

	public function AIndex(){
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$this->renderInStructure("VContato", [
			'coursesCategories' => 	$coursesCategories
		]);
	}

	

}
