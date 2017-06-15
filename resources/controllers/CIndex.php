<?php

namespace controllers;

use services\CourseDAO;

class CIndex extends Controller{
	public function AIndex(){
		$courseDAO = new CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$this->renderInStructure("VHome", [
			'coursesCategories' => 	$coursesCategories
		]);
	}
}
