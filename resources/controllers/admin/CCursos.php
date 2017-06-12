<?php

namespace controllers\admin;

use controllers\Controller;
use models\MCourse;
use services\CourseDAO;
use services\Uploads;

class CCursos extends Controller{

	function __construct(){
		parent::__construct();
		$isLogged = value_or_default($_SESSION['user'], false);
		if(!$isLogged){
			$this->redirect('admin/login');
			return;
		}
	}

	public function AIndex(){
		$service = new CourseDAO();
		$courses = $service->getAllCourses();

		$this->renderInStructure('admin/cursos/VCursos', [
			'user' => $_SESSION['user'],
			'courses' => $courses
		], 'admin');
	}

	public function ANovo(){
		$this->whenGet(function() {
			$this->renderInStructure('admin/cursos/VCursosCreate', ['user' => $_SESSION['user']], 'admin');
		});

		$this->whenPost(function(){
			$uploads = new Uploads();

			$primary_image = $_FILES['primary_image'];
			$primary_image['name'] =  generate_file_name($primary_image['name']);
			$uploads->uploadFile($primary_image);

			$courseData = $_POST;

			$courseData['primary_image'] = $primary_image['name'];

			$course = new MCourse($courseData);

			$service = new CourseDAO();
			$service->save($course);

			$this->redirect('../../admin/cursos');
		});
	}

	public function AEditar(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new CourseDAO();
			$course = $service->getCourseById($id);
			$values = [
				"active" => $course->getActive(),
				"featured" => $course->getFeatured(),
				"name" => $course->getName(),
				"description" => $course->getDescription(),
				"capacity" => $course->getCapacity(),
				"size" => $course->getSize(),
				"primary_image" => $course->getPrimaryImage(),
			];
			$this->renderInStructure('admin/cursos/VCursosEditar', [
				'user' => $_SESSION['user'],
				'values' => $values
			], 'admin');
		});

		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new CourseDAO();
			$course = new MCourse($_POST);
			$uploads = new Uploads();
	
			if($_FILES['primary_image']['name']){
				$primary_image = $_FILES['primary_image'];
				$primary_image['name'] =  generate_file_name($primary_image['name']);
				$uploads->uploadFile($primary_image);
				$course->setPrimaryImage($primary_image['name']);
			}

			$course->setId($id);
			$service->edit($course);
			$this->redirect('../../../admin/cursos');
		});
	}

	public function ABuscar(){

	}

	public function ARemover(){
		$id = $this->getParams(2);
		$modal = new MCourse(['id' => $id]);

		$service = new CourseDAO();
		$service->removeCourse($modal);

		$this->redirect('../../../admin/cursos');
	}

	public function AGaleria(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new CourseDAO();
			$images = $service->getCourseAllImages($id);
			$this->renderInStructure('admin/cursos/VCursosGalery', [
				'user' => $_SESSION['user'],
				'images' => $images
			], 'admin');

		});


		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new CourseDAO();
			$course = $service->getCourseById($id);

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
		$service = new CourseDAO();
		$image = $service->getImage($id);
		$service->removeImage($id);
		$this->redirect("../galeria/" . $image['course']);
	}

	public function AExcluirvideo(){
		$id = $this->getParams(2);
		$service = new CourseDAO();
		$video = $service->getVideo($id);
		$service->removeVideo($id);
		$this->redirect("../videos/" . $video['course']);
	}

	public function AVideos(){
		$this->whenGet(function(){
			$id = $this->getParams(2);
			$service = new CourseDAO();
			$videos = $service->getCourseAllVideos($id);
			$this->renderInStructure('admin/cursos/VCursosVideos', [
				'user' => $_SESSION['user'],
				'videos' => $videos
			], 'admin');
		});


		$this->whenPost(function(){
			$id = $this->getParams(2);
			$service = new CourseDAO();
			$course = $service->getCourseById($id);

			$uploads = new Uploads();

			$new_video = $_FILES['new_video'];
			$new_video['name'] =  generate_file_name($new_video['name']);
			$uploads->uploadFile($new_video);

			$service->addVideo($id, $new_video['name']);
			$this->redirect("../videos/$id");
		});
	}

}