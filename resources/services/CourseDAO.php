<?php 

namespace services;

use models\MCourse;
use services\Uploads;

class CourseDAO{

	public function save($course){
		$db = new Database;
		$db = $db->create();

		$sql = "INSERT INTO courses (active, featured, name, primary_image, period, table_description, area, category, workload, description, objective, target) VALUES (:active, :featured, :name, :primary_image, :period, :table_description, :area, :category, :workload, :description, :objective, :target)";

		$sth = $db->prepare($sql);		
		$sth->bindparam(':active',$course->getActive()); 
		$sth->bindparam(':featured', $course->getFeatured());
		$sth->bindparam(':name', $course->getName());
		$sth->bindparam(':primary_image', $course->getPrimaryImage());
		$sth->bindparam(':period', $course->getPeriod());
		$sth->bindparam(':table_description', $course->getTableDescription());
		$sth->bindparam(':area', $course->getArea());
		$sth->bindparam(':category', $course->getCategory());
		$sth->bindparam(':workload', $course->getWorkLoad());
		$sth->bindparam(':description', $course->getDescription());
		$sth->bindparam(':objective', $course->getObjective());
		$sth->bindparam(':target', $course->getTarget());
		$sth->execute();
		return $sth->rowCount();
	}

	public function edit($course){
		$db = new Database;
		$db = $db->create();

		$sql = "UPDATE courses SET
			active = :active, 
			featured = :featured, 
			name = :name, 
			period = :period, 
			table_description = :table_description, 
			area = :area, 
			category = :category, 
			workload = :workload, 
			description = :description, 
			objective = :objective, 
			accesses = :accesses, 
			target = :target, ";
		if($course->getPrimaryImage()){
			$sql .= ", primary_image = :primary_image";
			$actualCourse = $this->getCourseById($course->getId());
			$image = $actualCourse->getPrimaryImage();
			$uploads = new Uploads();
			$uploads->removeFile($image);
		}

		$sql .= " WHERE id = :id";

		$sth = $db->prepare($sql);		
		$sth->bindparam(':active',$course->getActive()); 
		$sth->bindparam(':featured', $course->getFeatured());
		$sth->bindparam(':name', $course->getName());
		$sth->bindparam(':period', $course->getPeriod());
		$sth->bindparam(':table_description', $course->getTableDescription());
		$sth->bindparam(':area', $course->getArea());
		$sth->bindparam(':category', $course->getCategory());
		$sth->bindparam(':workload', $course->getWorkLoad());
		$sth->bindparam(':description', $course->getDescription());
		$sth->bindparam(':objective', $course->getObjective());
		$sth->bindparam(':accesses', $course->getAccesses());
		$sth->bindparam(':target', $course->getTarget());
		if($course->getPrimaryImage()){
			$sth->bindParam(':primary_image', $course->getPrimaryImage());
		}
		$sth->bindParam(':id', $course->getId());
		$sth->execute();
	}

	public function getAllCourses() {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM courses";

		$sth = $db->query($sql);

		$courses = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$course = new MCourse($row);
			$courses[] = $course;
		}

		return $courses;
	}

	public function getCoursesByCategory($id) {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM courses WHERE category = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();

		$courses = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$course = new MCourse($row);
			$courses[] = $course;
		}

		return $courses;
	}

	public function getAllCategories(){
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM courses_category";
		$sth = $db->prepare($sql);
		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function saveCategory($category){
		$db = new Database();
		$db = $db->create();
		$name = $category['name'];
		$description = value_or_default($category['description'], "");
		$sql = "INSERT INTO courses_category (name) VALUES (:name)";
		$sth = $db->prepare($sql);
		$sth->bindParam(':name', $name);
		return $sth->execute();
	}

	public function deleteCategory($id){
		$db = new Database();
		$db = $db->create();
		$sql = "DELETE FROM courses_category WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		return $sth->execute();
	}

	public function getCategory($id){
		$db = new Database();
		$db = $db->create();
		$sql = "SELECT * FROM courses_category WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function getCourseById($id) {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM courses WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		
		if($sth->rowCount()){
			$course = new MCourse($sth->fetch(\PDO::FETCH_ASSOC));
			return $course;
		}
		return false;
	}

	public function removeCourse($model){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();
		
		$sql = "SELECT * FROM courses_images WHERE course = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		while($image = $sth->fetch(\PDO::FETCH_ASSOC)){
			$this->removeImage($image['id']);
		}

		$sql = "DELETE FROM courses_images WHERE course = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();

		$sql = "SELECT * FROM courses_videos WHERE course = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		while($video = $sth->fetch(\PDO::FETCH_ASSOC)){
			$this->removevideo($video['id']);
		}

		$sql = "DELETE FROM courses_videos WHERE course = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();

		$sql = "SELECT * FROM courses WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		$primary_image = $sth->fetch(\PDO::FETCH_ASSOC)['primary_image'];
		$uploads->removeFile($primary_image);

		$sql = "DELETE FROM courses WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		
		return $sth->rowCount();
	}

	public function getAllCategoriesWithCourses(){
		$db = new Database();
		$db = $db->create();
		$sql = "
			SELECT 
				courses.*,
				category.id as category,
				category.name as category_name
			FROM courses 
				INNER JOIN  courses_category AS category 
					ON courses.category = category.id
			ORDER BY
				category.id asc,
				rand()
		";
		$sth = $db->prepare($sql);
		$sth->execute();
		$categories = [];

		$actual_category = '';
		while($course = $sth->fetch(\PDO::FETCH_ASSOC)){
			if($actual_category != $course['category_name']){
				$categories[] = [
					'id' => $course['category'],
					'name' => $course['category_name'],
					'courses' => []
				];
				$actual_category = $course['category_name'];
			}
			$category_index = count($categories) - 1;
			$categories[$category_index]['courses'][] = new MCourse($course);
		}
		return $categories;
	}

	public function getImage($id){
		$db = new Database();
		$db = $db->create();
		$sql = "SELECT * FROM courses_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function getVideo($id){
		$db = new Database();
		$db = $db->create();
		$sql = "SELECT * FROM courses_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function addImage($id, $image_name){
		$db = new Database();
		$db = $db->create();

		$sql = "INSERT INTO courses_images (name, course) VALUES (:name, :course)";
		$sth = $db->prepare($sql);
		$sth->bindParam(':name', $image_name);
		$sth->bindParam(':course', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function addVideo($id, $video_name){
		$db = new Database();
		$db = $db->create();

		$sql = "INSERT INTO courses_videos (name, course) VALUES (:name, :course)";
		$sth = $db->prepare($sql);
		$sth->bindParam(':name', $video_name);
		$sth->bindParam(':course', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function removeImage($id){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();

		$sql = "SELECT name FROM courses_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		$image = $sth->fetch(\PDO::FETCH_ASSOC);
		$uploads->removeFile($image['name']);

		$sql = "DELETE FROM courses_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function removeVideo($id){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();

		$sql = "SELECT name FROM courses_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		$video = $sth->fetch(\PDO::FETCH_ASSOC);
		$uploads->removeFile($video['name']);

		$sql = "DELETE FROM courses_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function getCourseAllImages($id){
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT id, name FROM courses_images WHERE course = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getCourseAllVideos($id){
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT id, name FROM courses_videos WHERE course = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

}