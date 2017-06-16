<?php

namespace controllers;

use services\CourseDAO;
use services\EnvironmentDAO;
use services\NewDAO;

class CIndex extends Controller{
	public function AIndex(){
		$courseDAO = new CourseDAO();
		$EnvironmentDAO = new EnvironmentDAO();
		$NewDAO = new NewDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$featuredCourses = $courseDAO->getFeaturedCourses();
		$featuredEnvironments = $EnvironmentDAO->getFeaturedEnvironments();
		$featuredNews = $NewDAO->getFeaturedNews();

		$this->renderInStructure("VHome", [
			'coursesCategories' => 	$coursesCategories,
			'featuredNews' => $featuredNews,
			'featuredCourses' => $featuredCourses,
			'featuredEnvironments' => $featuredEnvironments
		]);
	}
}
