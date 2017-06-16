<?php 

namespace services;

class UserDao{

	public function searchUser($user){
		$username = $user->getUsername();
		$password = $user->getPassword();

		$db = new Database();
		$db = $db->create();

		$sql = "SELECT * FROM admins WHERE login = :username and password = :password";

		$sth = $db->prepare($sql);
		$sth->bindParam(":username", $username);
		$sth->bindParam(":password", $password);

		$sth->execute();

		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

}