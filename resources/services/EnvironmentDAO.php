<?php 

namespace services;

use models\MEnvironment;
use services\Uploads;

class EnvironmentDAO{

	public function save($environment){
		$db = new Database;
		$db = $db->create();

		$sql = "INSERT INTO environments (active, featured, name, description, capacity, size, primary_image) VALUES (:active, :featured, :name, :description, :capacity, :size, :primary_image)";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':active', $environment->getActive());
		$sth->bindParam(':featured', $environment->getFeatured());
		$sth->bindParam(':name', $environment->getName());
		$sth->bindParam(':description', $environment->getDescription());
		$sth->bindParam(':capacity', $environment->getCapacity());
		$sth->bindParam(':size', $environment->getSize());
		$sth->bindParam(':primary_image', $environment->getPrimaryImage());
		$sth->execute();
		$sth->rowCount();
	}

	public function edit($environment){
		$db = new Database;
		$db = $db->create();

		$sql = "UPDATE environments SET active = :active, featured = :featured, name = :name, description = :description, capacity = :capacity, size = :size";
		if($environment->getPrimaryImage()){
			$sql .= ", primary_image = :primary_image";
			$actualEnvironment = $this->getEnvironmentById($environment->getId());
			$image = $actualEnvironment->getPrimaryImage();
			$uploads = new Uploads();
			$uploads->removeFile($image);
		}

		$sql .= " WHERE id = :id";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':active', $environment->getActive());
		$sth->bindParam(':featured', $environment->getFeatured());
		$sth->bindParam(':name', $environment->getName());
		$sth->bindParam(':description', $environment->getDescription());
		$sth->bindParam(':capacity', $environment->getCapacity());
		$sth->bindParam(':size', $environment->getSize());
		if($environment->getPrimaryImage()){
			$sth->bindParam(':primary_image', $environment->getPrimaryImage());
		}
		$sth->bindParam(':id', $environment->getId());
		$sth->execute();
	}

	public function getAllEnvironments() {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM environments";

		$sth = $db->query($sql);

		$environments = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$environment = new MEnvironment($row);
			$environments[] = $environment;
		}

		return $environments;
	}

	public function getEnvironmentById($id) {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM environments WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		
		if($sth->rowCount()){
			$environment = new MEnvironment($sth->fetch(\PDO::FETCH_ASSOC));
			return $environment;
		}
		return false;
	}

	public function removeEnvironment($model){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();
		
		$sql = "SELECT * FROM environments_images WHERE environment = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		while($image = $sth->fetch(\PDO::FETCH_ASSOC)){
			$this->removeImage($image['id']);
		}

		$sql = "DELETE FROM environments_images WHERE environment = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();

		$sql = "SELECT * FROM environments_videos WHERE environment = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		while($video = $sth->fetch(\PDO::FETCH_ASSOC)){
			$this->removevideo($video['id']);
		}

		$sql = "DELETE FROM environments_videos WHERE environment = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();

		$sql = "SELECT * FROM environments WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		$primary_image = $sth->fetch(\PDO::FETCH_ASSOC)['primary_image'];
		$uploads->removeFile($primary_image);

		$sql = "DELETE FROM environments WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		
		return $sth->rowCount();
	}

	public function getImage($id){
		$db = new Database();
		$db = $db->create();
		$sql = "SELECT * FROM environments_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function getVideo($id){
		$db = new Database();
		$db = $db->create();
		$sql = "SELECT * FROM environments_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function addImage($id, $image_name){
		$db = new Database();
		$db = $db->create();

		$sql = "INSERT INTO environments_images (name, environment) VALUES (:name, :environment)";
		$sth = $db->prepare($sql);
		$sth->bindParam(':name', $image_name);
		$sth->bindParam(':environment', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function addVideo($id, $video_name){
		$db = new Database();
		$db = $db->create();

		$sql = "INSERT INTO environments_videos (name, environment) VALUES (:name, :environment)";
		$sth = $db->prepare($sql);
		$sth->bindParam(':name', $video_name);
		$sth->bindParam(':environment', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function removeImage($id){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();

		$sql = "SELECT name FROM environments_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		$image = $sth->fetch(\PDO::FETCH_ASSOC);
		$uploads->removeFile($image['name']);

		$sql = "DELETE FROM environments_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function removeVideo($id){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();

		$sql = "SELECT name FROM environments_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		$video = $sth->fetch(\PDO::FETCH_ASSOC);
		$uploads->removeFile($video['name']);

		$sql = "DELETE FROM environments_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function getEnvironmentAllImages($id){
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT id, name FROM environments_images WHERE environment = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getEnvironmentAllVideos($id){
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT id, name FROM environments_videos WHERE environment = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

}