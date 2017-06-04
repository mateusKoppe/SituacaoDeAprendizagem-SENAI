<?php 

namespace services;

class EnvironmentDAO{

	public function save($environment){
		$db = new Database;
		$db = $db->create();

		echo "test";

		$sql = "INSERT INTO environments (active, featured, name, description, capacity, size) VALUES (:active, :featured, :name, :description, :capacity, :size)";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':active', $environment->getActive());
		$sth->bindParam(':featured', $environment->getFeatured());
		$sth->bindParam(':name', $environment->getName());
		$sth->bindParam(':description', $environment->getDescription());
		$sth->bindParam(':capacity', $environment->getCapacity());
		$sth->bindParam(':size', $environment->getSize());
		$sth->execute();
		print_r($sth->rowCount());



	}

}