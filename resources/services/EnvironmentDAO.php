<?php 

namespace services;

use models\MEnvironment;

class EnvironmentDAO{

	public function save($environment){
		$db = new Database;
		$db = $db->create();

		$sql = "INSERT INTO environments (active, featured, name, description, capacity, size) VALUES (:active, :featured, :name, :description, :capacity, :size)";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':active', $environment->getActive());
		$sth->bindParam(':featured', $environment->getFeatured());
		$sth->bindParam(':name', $environment->getName());
		$sth->bindParam(':description', $environment->getDescription());
		$sth->bindParam(':capacity', $environment->getCapacity());
		$sth->bindParam(':size', $environment->getSize());
		$sth->execute();
		$sth->rowCount();

		header('location: admin/ambientes');
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

}