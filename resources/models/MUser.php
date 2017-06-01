<?php 

class MUser{
	private $username;
	private $password;
	private $name;
	private $permision;

	public function setUsername($username){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setPermision($permision){
		$this->permision = $permision;
	}

	public function getPermision(){
		return $this->permision;
	}


}