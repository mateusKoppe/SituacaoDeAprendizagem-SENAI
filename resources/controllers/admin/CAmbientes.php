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

		$this->renderInStructure('admin/VAmbientes', ['user' => $_SESSION['user'], 'environments' => $environments], 'admin');
	}

	public function ANovo(){
		$this->whenGet(function() {
			$this->renderInStructure('admin/VAmbientesCreate', ['user' => $_SESSION['user']], 'admin');
		});

		$this->whenPost(function(){

			$uploads = new Uploads();

			$primary_image = $_FILES['primary-image'];
			$primary_image['name'] =  generate_file_name($primary_image['name']);
			$uploads->uploadFile($primary_image);

			$images = $_FILES['images'];
			foreach ($images['name'] as $key => $file) {
				$image_name = generate_file_name($images['name'][$key]);
				echo $image_name;
				$image = [
					'tmp_name' => $images['tmp_name'][$key],
					'name' => $image_name
				];
				$uploads->uploadFile($image);
			}

			$video = $_FILES['video'];
			$video['name'] =  generate_file_name($video['name']);
			$uploads->uploadFile($video);

			$environmentData = $_POST;

			$environmentData['primary-image'] = $primary_image['name'];

			$environment = new MEnvironment($environmentData);

			$service = new EnvironmentDAO();
			$service->save($environment);

			$this->redirect('../../admin/ambientes');

		});
	}

	public function AEditar(){
		$id = $this->getParams(2);
		$service = new EnvironmentDAO();
		$environment = $service->getEnvironmentById($id);
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

}