<?php 

namespace services;

use models\MAdmin;

class AdminDAO{

	const DB_TABLENAME = "admin";

	public function save($admin){
		$db = new Database;
		$db = $db->create();

		$sql = "INSERT INTO " . SELF::DB_TABLENAME . " (name, login, password) VALUES (:name, :login, :password)";

		$sth = $db->prepare($sql);		
		$sth->bindParam(':name', $admin->getName());
		$sth->bindParam(':login', $admin->getLogin());
		$sth->bindParam(':password', $admin->getPassword());
		$sth->execute();
		$sth->rowCount();

		header('location: admin/ambientes');
	}




	public function getAllAdmin() {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM " . SELF::DB_TABLENAME;

		$sth = $db->query($sql);

		$admin = [];

		while($row = $sth->fetch(\PDO::FETCH_ASSOC)){
			$admin = new MAdmin($row);
			$admin[] = $admin;
		}

		return $admin;
	}



	public function getAdminById($id) {
		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM " . SELF::DB_TABLENAME . " WHERE id = :id";
		$sth = $db->prepare($sql);
		$sth->bindParam(':id', $id);
		$sth->execute();
		
		if($sth->rowCount()){
			$admin = new Madmin($sth->fetch(\PDO::FETCH_ASSOC));
			return $admin;
		}
		return false;
	}

}