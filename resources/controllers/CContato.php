<?php

namespace controllers;

class CContato extends Controller {

	public function AIndex(){
		$this->whenGet(function(){
			$courseDAO = new \services\CourseDAO();
			$coursesCategories = $courseDAO->getAllCategories();

			$this->renderInStructure("VContato", [
				'coursesCategories' => 	$coursesCategories
			]);
		});

		$this->whenPost(function(){
			$db = new \services\Database();
			$db = $db->create();
			$sql = "INSERT INTO contacts (name, email, phone, age, want_be_studant, subject, message) VALUES (:name, :email, :phone, :age, :want_be_studant, :subject, :message)";
			$sth = $db->prepare($sql);
			$sth->bindParam(':name', $_POST['name']);
			$sth->bindParam(':email', $_POST['email']);
			$sth->bindParam(':phone', $_POST['phone']);
			$sth->bindParam(':age', $_POST['age']);
			$sth->bindParam(':want_be_studant', $_POST['want_be_studant']);
			$sth->bindParam(':subject', $_POST['subject']);
			$sth->bindParam(':message', $_POST['message']);
			$sth->execute();
			$this->redirect('contato/obrigado');
		});
	}

	public function AObrigado(){
		$this->whenGet(function(){
			$courseDAO = new \services\CourseDAO();
			$coursesCategories = $courseDAO->getAllCategories();

			$this->renderInStructure("VContatoObrigado", [
				'coursesCategories' => 	$coursesCategories
			]);
		});
	}

}
