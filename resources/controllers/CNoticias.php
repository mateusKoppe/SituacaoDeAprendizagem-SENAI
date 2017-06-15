<?php 

namespace controllers;

use services\NewDAO;

class CNoticias extends Controller{

	public function AIndex(){
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$service = new NewDAO();
		$news = $service->getAllNews();

		$this->renderInStructure("VNoticias", [
			'coursesCategories' => 	$coursesCategories,
			'news' => $news
		]);
	}

}