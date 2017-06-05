<?php 

namespace controllers\admin;

use controllers\Controller;
use models\MEnvironment;
use services\EnvironmentDAO;

class CAmbientes extends Controller{

	public function AIndex(){
		$isLogged = value_or_default($_SESSION['user'], false);
		if(!$isLogged){
			$this->redirect('admin/login');
			return;
		}

		$service = new EnvironmentDAO();
		$environments = $service->getAllEnvironments();

		$this->renderInStructure('admin/VAmbientes', ['user' => $_SESSION['user'], 'environments' => $environments], 'admin');
	}

	public function ANovo(){
		$this->whenGet(function() {
			$this->renderInStructure('admin/VAmbientesCreate', ['user' => $_SESSION['user']], 'admin');
		});

		$this->whenPost(function(){

			$environmentData = [
				'name' => $_POST['name']
			];

			$environment = new MEnvironment($environmentData);
			$environment->setCapacity(value_or_default($_POST['capacity'], ""));
			$environment->setActive(value_or_default($_POST['active'], ""));
			$environment->setFeatured(value_or_default($_POST['featured'], ""));
			$environment->setDescription(value_or_default($_POST['description'], ""));
			$environment->setCapacity(value_or_default($_POST['capacity'], ""));
			$environment->setSize(value_or_default($_POST['size'], ""));

			$service = new EnvironmentDAO();
			$service->save($environment);

		});
	}

	public function ABuscar(){

	}

	public function ARemover(){

	}

	public function AEditar(){

	}

}