<?php

namespace controllers\admin;

use controllers\Controller;
use models\MUser;

class CIndex extends Controller { 

	public function AIndex() {
		$isLogged = value_or_default($_SESSION['user'], false);
		if(!$isLogged){
			$this->redirect('admin/login');
			return;
		}

		$this->renderInStructure('admin/VIndex', ['user' => $_SESSION['user']], 'admin');
	}

}