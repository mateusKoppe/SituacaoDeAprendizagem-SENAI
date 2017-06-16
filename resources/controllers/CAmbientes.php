<?php

namespace controllers;

use services\EnvironmentDAO;

class CAmbientes extends Controller {

	public function AIndex() {
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$service = new EnvironmentDAO();
		$environments = $service->getAllEnvironments();

		$this->renderInStructure("VAmbiente", [
			'coursesCategories' => 	$coursesCategories,
			'environments' => $environments
		]);
	}

	public function AVermais() {
		$courseDAO = new \services\CourseDAO();
		$coursesCategories = $courseDAO->getAllCategories();

		$id = $this->getParams(1);

		$service = new EnvironmentDAO();
		$environments = $service->getEnvironmentById($id);		

		$this->renderInStructure("VAmbienteDetails", [
			'coursesCategories' => 	$coursesCategories,
			'environments' => $environments
		]);
	}

}