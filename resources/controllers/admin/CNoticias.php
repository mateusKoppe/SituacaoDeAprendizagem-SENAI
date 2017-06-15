<?php

namespace controllers\admin;

use controllers\Controller;
use models\MNew;
use services\NewDAO;
use services\Uploads;

class CNoticias extends Controller{

	function __construct(){
		parent::__construct();
		$isLogged = value_or_default($_SESSION['user'], false);
		if(!$isLogged){
			$this->redirect('admin/login');
			return;
		}
	}

	public function AIndex(){
		$service = new NewDAO();
		$news = $service->getAllNews();

		$this->renderInStructure('admin/noticias/VNoticias', [
			'user' => $_SESSION['user'],
			'news' => $news
		], 'admin');
	}

	public function ANovo(){
		$this->whenGet(function() {
			$this->renderInStructure('admin/noticias/VNoticiasCreate', ['user' => $_SESSION['user']], 'admin');
		});

		$this->whenPost(function(){
			$uploads = new Uploads();

			$primary_image = $_FILES['primary_image'];
			$primary_image['name'] =  generate_file_name($primary_image['name']);
			$uploads->uploadFile($primary_image);

			$newData = $_POST;

			$newData['primary_image'] = $primary_image['name'];

			$new = new MNew($newData);

			$service = new NewDAO();
			$service->save($new);

			$this->redirect('../../admin/noticias');
		});
	}

	public function AEditar(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new NewDAO();
			$new = $service->getNewById($id);
			$values = [
				"active" => $new->getActive(),
				"featured" => $new->getFeatured(),
				"name" => $new->getName(),
				"summary" => $new->getSummary(),
				"description" => $new->getDescription(),
				"primary_image" => $new->getPrimaryImage(),
			];
			$this->renderInStructure('admin/noticias/VNoticiasEditar', [
				'user' => $_SESSION['user'],
				'values' => $values
			], 'admin');
		});

		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new NewDAO();
			$new = new MNew($_POST);
			$uploads = new Uploads();
	
			if($_FILES['primary_image']['name']){
				$primary_image = $_FILES['primary_image'];
				$primary_image['name'] =  generate_file_name($primary_image['name']);
				$uploads->uploadFile($primary_image);
				$new->setPrimaryImage($primary_image['name']);
			}

			$new->setId($id);
			$service->edit($new);
			$this->redirect('../../../admin/noticias');
		});
	}

	public function ABuscar(){

	}

	public function ARemover(){
		$id = $this->getParams(2);
		$modal = new MNew(['id' => $id]);

		$service = new NewDAO();
		$service->removeNew($modal);

		$this->redirect('../../../admin/noticias');
	}

	public function AGaleria(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new NewDAO();
			$images = $service->getNewAllImages($id);
			$this->renderInStructure('admin/noticias/VNoticiasGalery', [
				'user' => $_SESSION['user'],
				'images' => $images
			], 'admin');

		});


		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new NewDAO();
			$new = $service->getNewById($id);

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
		$service = new NewDAO();
		$image = $service->getImage($id);
		$service->removeImage($id);
		$this->redirect("../galeria/" . $image['new']);
	}

	public function AExcluirvideo(){
		$id = $this->getParams(2);
		$service = new NewDAO();
		$video = $service->getVideo($id);
		$service->removeVideo($id);
		$this->redirect("../videos/" . $video['new']);
	}

	public function AVideos(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new NewDAO();
			$videos = $service->getNewAllVideos($id);
			$this->renderInStructure('admin/noticias/VNoticiasVideos', [
				'user' => $_SESSION['user'],
				'videos' => $videos
			], 'admin');
		});


		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new NewDAO();
			$new = $service->getNewById($id);

			$uploads = new Uploads();

			$new_video = $_FILES['new_video'];
			$new_video['name'] =  generate_file_name($new_video['name']);
			$uploads->uploadFile($new_video);

			$service->addVideo($id, $new_video['name']);
			$this->redirect("../videos/$id");
		});
	}

}