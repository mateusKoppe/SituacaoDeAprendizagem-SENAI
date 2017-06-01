<?php

namespace controllers\admin;

use controllers\Controller;
use models\MUser;

class CIndex extends Controller { 

	public function AIndex() {
		$isLogged = value_or_default($_SESSION['user'], false);
		if(!$isLogged){
			$this->redirect('login');
			return;
		};

		print_r((new MUser())->getUsername());
		print_r($_SESSION['user']->getUsername());

	}

}