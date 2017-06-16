<?php

namespace controllers;

use services\CourseDAO;

class CCurso extends Controller{
		
	public function AIndex(){
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$courses = $courseDAO->getAllCategoriesWithCourses();

		$this->renderInStructure("VCursoIndex", [
			'coursesCategories' => 	$coursesCategories,
			'categoryCourses' => $courses
		]);


	}

	public function AVermais(){
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$id = $this->getParams(1);

		$course = $courseDAO->getCourseById($id);

		$this->renderInStructure("VCursoDetails", [
			'coursesCategories' => 	$coursesCategories,
			'course' => $course
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
