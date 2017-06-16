<?php 

namespace services;

use models\MNew;
use services\Uploads;

class NewDAO{

	public function save($new){
		$db = new Database;
		$db = $db->create();

		$sql = "INSERT INTO news (active, featured, name, summary,description, primary_image) VALUES (:active, :featured, :name, :summary, :description, :primary_image)";
		$sth = $db->prepare($sql);		
		$sth->bindParam(':active', $new->getActive());
		$sth->bindParam(':featured', $new->getFeatured());
		$sth->bindParam(':name', $new->getName());
		$sth->bindParam(':summary', $new->getSummary());
		$sth->bindParam(':description', $new->getDescription());
		$sth->bindParam(':primary_image', $new->getPrimaryImage());
		$sth->execute();
		$sth->rowCount();
	}

	public function edit($new){
		$db = new Database;
		$db = $db->create();

		$sql = "UPDATE news SET active = :active, featured = :featured, name = :name, summary = :summary, description = :description";
		if($new->getPrimaryImage()){
			$sql .= ", primary_image = :primary_image";
			$actualNew = $this->getNewById($new->getId());
			$image = $actualNew->getPrimaryImage();
			$uploads = new Uploads();
			$uploads->removeFile($image);
		}

		$sql .= " WHERE id = :id";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':active', $new->getActive());
		$sth->bindParam(':featured', $new->getFeatured());
		$sth->bindParam(':name', $new->getName());
		$sth->bindParam(':summary', $new->getSummary());
		$sth->bindParam(':description', $new->getDescription());
		if($new->getPrimaryImage()){
			$sth->bindParam(':primary_image', $new->getPrimaryImage());
		}
		$sth->bindParam(':id', $new->getId());
		$sth->execute();
	}

	public function getAllNews() {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM news";

		$sth = $db->prepare($sql);
		$sth->execute();

		$news = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$new = new MNew($row);
			$news[] = $new;
		}

		return $news;
	}

	public function getFeaturedNews() {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM news";

		$sth = $db->prepare($sql);
		$sth->execute();

		$news = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$new = new MNew($row);
			$news[] = $new;
		}

		return $news;
	}

	public function getNewById($id) {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM news WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		
		if($sth->rowCount()){
			$new = new MNew($sth->fetch(\PDO::FETCH_ASSOC));
			return $new;
		}
		return false;
	}

	public function removeNew($model){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();
		
		$sql = "SELECT * FROM news_images WHERE new = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		while($image = $sth->fetch(\PDO::FETCH_ASSOC)){
			$this->removeImage($image['id']);
		}

		$sql = "DELETE FROM news_images WHERE new = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();

		$sql = "SELECT * FROM news_videos WHERE new = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		while($video = $sth->fetch(\PDO::FETCH_ASSOC)){
			$this->removevideo($video['id']);
		}

		$sql = "DELETE FROM news_videos WHERE new = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();

		$sql = "SELECT * FROM news WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		$primary_image = $sth->fetch(\PDO::FETCH_ASSOC)['primary_image'];
		$uploads->removeFile($primary_image);

		$sql = "DELETE FROM news WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $model->getId());
		$sth->execute();
		
		return $sth->rowCount();
	}

	public function getImage($id){
		$db = new Database();
		$db = $db->create();
		$sql = "SELECT * FROM news_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function getVideo($id){
		$db = new Database();
		$db = $db->create();
		$sql = "SELECT * FROM news_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function addImage($id, $image_name){
		$db = new Database();
		$db = $db->create();

		$sql = "INSERT INTO news_images (name, new) VALUES (:name, :new)";
		$sth = $db->prepare($sql);
		$sth->bindParam(':name', $image_name);
		$sth->bindParam(':new', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function addVideo($id, $video_name){
		$db = new Database();
		$db = $db->create();

		$sql = "INSERT INTO news_videos (name, new) VALUES (:name, :new)";
		$sth = $db->prepare($sql);
		$sth->bindParam(':name', $video_name);
		$sth->bindParam(':new', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function removeImage($id){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();

		$sql = "SELECT name FROM news_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		$image = $sth->fetch(\PDO::FETCH_ASSOC);
		$uploads->removeFile($image['name']);

		$sql = "DELETE FROM news_images WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function removeVideo($id){
		$db = new Database();
		$db = $db->create();
		$uploads = new Uploads();

		$sql = "SELECT name FROM news_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		$video = $sth->fetch(\PDO::FETCH_ASSOC);
		$uploads->removeFile($video['name']);

		$sql = "DELETE FROM news_videos WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->rowCount();
	}

	public function getNewAllImages($id){
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT id, name FROM news_images WHERE new = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function getNewAllVideos($id){
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT id, name FROM news_videos WHERE new = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

}