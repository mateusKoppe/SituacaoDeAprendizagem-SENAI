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

		$sql = "SELECT * FROM environments WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		$primary_image = $sth->fetch(\PDO::FETCH_ASSOC)['primary_image'];
		$uploads->removeFile($primary_image);

		$sql = "DELETE FROM environments WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$status = $sth->execute();
		return $sth->rowCount();
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

}