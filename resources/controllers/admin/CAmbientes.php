<?php

namespace controllers\admin;

use controllers\Controller;
use models\MEnvironment;
use services\EnvironmentDAO;
use services\Uploads;

class CAmbientes extends Controller{

	function __construct(){
		parent::__construct();
		$isLogged = value_or_default($_SESSION['user'], false);
		if(!$isLogged){
			$this->redirect('admin/login');
			return;
		}
	}

	public function AIndex(){
		$service = new EnvironmentDAO();
		$environments = $service->getAllEnvironments();

		$this->renderInStructure('admin/ambientes/VAmbientes', [
			'user' => $_SESSION['user'],
			'environments' => $environments
		], 'admin');
	}

	public function ANovo(){
		$this->whenGet(function() {
			$this->renderInStructure('admin/ambientes/VAmbientesCreate', ['user' => $_SESSION['user']], 'admin');
		});

		$this->whenPost(function(){
			$uploads = new Uploads();

			$primary_image = $_FILES['primary_image'];
			$primary_image['name'] =  generate_file_name($primary_image['name']);
			$uploads->uploadFile($primary_image);

			$environmentData = $_POST;

			$environmentData['primary_image'] = $primary_image['name'];

			$environment = new MEnvironment($environmentData);

			$service = new EnvironmentDAO();
			$service->save($environment);

			$this->redirect('../../admin/ambientes');
		});
	}

	public function AEditar(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new EnvironmentDAO();
			$environment = $service->getEnvironmentById($id);
			$values = [
				"active" => $environment->getActive(),
				"featured" => $environment->getFeatured(),
				"name" => $environment->getName(),
				"description" => $environment->getDescription(),
				"capacity" => $environment->getCapacity(),
				"size" => $environment->getSize(),
				"primary_image" => $environment->getPrimaryImage(),
			];
			$this->renderInStructure('admin/ambientes/VAmbientesEditar', [
				'user' => $_SESSION['user'],
				'values' => $values
			], 'admin');
		});

		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new EnvironmentDAO();
			$environment = new MEnvironment($_POST);
			$uploads = new Uploads();
	
			if($_FILES['primary_image']['name']){
				$primary_image = $_FILES['primary_image'];
				$primary_image['name'] =  generate_file_name($primary_image['name']);
				$uploads->uploadFile($primary_image);
				$environment->setPrimaryImage($primary_image['name']);
			}

			$environment->setId($id);
			$service->edit($environment);
			$this->redirect('../../../admin/ambientes');
		});
	}

	public function ABuscar(){

	}

	public function ARemover(){
		$id = $this->getParams(2);
		$modal = new MEnvironment(['id' => $id]);

		$service = new EnvironmentDAO();
		$service->removeEnvironment($modal);

		$this->redirect('../../../admin/ambientes');
	}

	public function AGaleria(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new EnvironmentDAO();
			$images = $service->getEnvironmentAllImages($id);
			$this->renderInStructure('admin/ambientes/VAmbientesGalery', [
				'user' => $_SESSION['user'],
				'images' => $images
			], 'admin');

		});


		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new EnvironmentDAO();
			$environment = $service->getEnvironmentById($id);

			$uploads = new Uploads();

			$new_image = $_FILES['new_image'];
			$new_image['name'] =  generate_file_name($new_image['name']);
			$uploads->uploadFile($new_image);

			$service->addImage($id, $new_image['name']);
			$this->redirect("../galeria/$id");
		});

	}

	public function AExcluirfoto(){
		$id = $this->getParams(2);
		$service = new EnvironmentDAO();
		$service->removeImage($id);
		$this->redirect("../galeria/$id");
	}

}