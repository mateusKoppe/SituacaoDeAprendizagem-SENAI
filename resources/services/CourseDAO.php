<?php 

namespace services;

use models\MCourse;

class CoursesDAO{

	const DB_TABLENAME = "courses";

	public function save($course){
		$db = new Database;
		$db = $db->create();

		$sql = "INSERT INTO " . SELF::DB_TABLENAME . " (active, featured, name, primaryImage, period, tableDescription, category, workload, description, objective, accesses, target) VALUES (:active, :featured, :name, primaryImage, period, tableDescription, category, workload,  description, objective, accesses, target)";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':active', $course->getActive());
		$sth->bindParam(':featured', $course->getFeatured());
		$sth->bindParam(':name', $course->getName());
		$sth->bindParam(':primaryImage', $course->getPrimaryImage());
		$sth->bindParam(':period', $course->getPeriod());
		$sth->bindParam(':tableDescription', $course->getTableDescription());
		$sth->bindParam(':category', $course->getCategory());
		$sth->bindParam(':workload', $course->getWorkload());
		$sth->bindParam(':description', $course->getDescription());
		$sth->bindParam(':objective', $course->getObjective());
		$sth->bindParam(':accesses', $course->getAccesses());
		$sth->bindParam(':target', $course->getarget());
		$sth->execute();
		$sth->rowCount();

		header('location: admin/ambientes');
	}




	public function getAllCourses() {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM " . SELF::DB_TABLENAME;

		$sth = $db->query($sql);

		$courses = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$course = new MCourse($row);
			$courses[] = $course;
		}

		return $courses;
	}



	public function getCourseById($id) {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM " . SELF::DB_TABLENAME . " WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		
		if($sth->rowCount()){
			$course = new MCourse($sth->fetch(\PDO::FETCH_ASSOC));
			return $course;
		}
		return false;
	}

}