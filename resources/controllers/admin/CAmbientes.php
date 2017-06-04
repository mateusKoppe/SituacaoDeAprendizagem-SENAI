<?php 

namespace controllers\admin;

use controllers\Controller;

class CAmbientes extends Controller{

	public function AIndex(){
		$isLogged = value_or_default($_SESSION['user'], false);
		if(!$isLogged){
			$this->redirect('admin/login');
			return;
		}

		$this->renderInStructure('admin/VAmbientes', ['user' => $_SESSION['user']], 'admin');
	}

	public function ANovo(){

	}

	public function ABuscar(){

	}

	public function ARemover(){

	}

	public function AEditar(){

	}

}