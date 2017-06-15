<?php

namespace controllers;

use services\CourseDAO;

class CCurso extends Controller{
		
	public function AIndex(){
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$this->renderInStructure("VCursoIndex", [
			'coursesCategories' => 	$coursesCategories
		]);
	}

	public function ADetalhes(){
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$this->renderInStructure("VCursoDetails", [
			'coursesCategories' => 	$coursesCategories
		]);
	}

	public function ACategoria(){
		$id = $this->getParams(1);
		$service = new CourseDAO();
		$courses = $service->getCoursesByCategory($id);
		$category = $service->getCategory($id);

		$coursesCategories = $service->getAllCategories();

		$this->renderInStructure("VCursoCategoria", [
			'courses' => $courses,
			'category' => $category,
			'coursesCategories' => $coursesCategories
		]);
	}
		
}
