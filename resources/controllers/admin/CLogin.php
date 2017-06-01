<?php


namespace controllers\admin;

use controllers\Controller;
use models\MUser;

class CLogin extends Controller { 

	public function AIndex() {
		$this->whenGet(function(){
			$this->renderInStructure('admin/VLogin', [], 'admin');
		});

		$this->whenPost(function(){
			$user = new MUser();
			$user->setUsername($_POST['login']);
			$user->setUsername($_POST['password']);
			$_SESSION['user'] = $user;
		});
	}

}