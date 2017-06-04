<?php


namespace controllers\admin;

use controllers\Controller;
use models\MUser;
use services\UserDAO;

class CLogin extends Controller {

	public function AIndex() {
		$this->whenGet(function(){
			$this->render('admin/VLogin');
		});

		$this->whenPost(function(){
			$user = new MUser();
			$user->setUsername($_POST['login']);
			$user->setPassword($_POST['password']);
			$dao = new UserDAO();

			$searchedUser = $dao->searchUser($user);

			print_r($searchedUser);

			if($searchedUser){
				$user->setId($searchedUser['id']);
				$user->setName($searchedUser['name']);
				$_SESSION['user'] = $user;
				$this->redirect('../admin');
				return;
			}

			$this->render('admin/VLogin', ['error' => 'Esse úsuario não foi encontrado']);
		});
	}

}
