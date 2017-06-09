<?php

namespace models;

class MAdmins{
	private $id;
	private $name;
	private $login;
	private $password;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setName($name){
		$this->name= $name;
	}

	public function getName(){
		return $this->name;
	}

    public function setLogin($login){
		$this->login= $login;
	}

	public function getName(){
		return $this->login;
	}

	public function setPassword($password){
		$this->password= $password;
	}

	public function getPassword(){
		return $this->password;
	}

}
