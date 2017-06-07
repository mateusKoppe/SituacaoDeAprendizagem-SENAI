<?php 

namespace services;

use models\MTeacher;

class TeacherDAO{

	const DB_TABLENAME = "teacher";

	public function save($teacher){
		$db = new Database;
		$db = $db->create();

		$sql = "INSERT INTO " . SELF::DB_TABLENAME . " ( name, formation, image, linkedin, interestArea) VALUES (:name, :formation, :image, :linkedin, :interestArea)";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':name', $teacher->getName());
		$sth->bindParam(':formation', $teacher->getFormation());
		$sth->bindParam(':image', $teacher->getImage());
		$sth->bindParam(':linkedin', $teacher->getLinkedin());
		$sth->bindParam(':interestArea', $teacher->getInterestArea());
		$sth->execute();
		$sth->rowCount();

		header('location: admin/ambientes');
	}




	public function getAllTeacher() {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM " . SELF::DB_TABLENAME;

		$sth = $db->query($sql);

		$teacher = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$teacher= new Mteacher($row);
			$teacher[] = $teacher;
		}

		return $teacher;
	}



	public function getTeacherById($id) {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM " . SELF::DB_TABLENAME . " WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		
		if($sth->rowCount()){
			$teacher= new MTeacher($sth->fetch(\PDO::FETCH_ASSOC));
			return $teacher;
		}
		return false;
	}

}