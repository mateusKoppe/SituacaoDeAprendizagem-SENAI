<?php

namespace models;

class MContact{
	private $id;
	private $name;
	private $email;
	private $phone;
	private $age;
	private $wantBeStudant;
	private $subject;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPhone($phone){
		$this->phone = $phone;
	}

	public function getPhone(){
		return $this->phone;
	}
	
	public function setAge($age){
		$this->age = $age;
	}

	public function getAge(){
		return $this->age;
	}

    public function setWantBeStudant($wantBeStudant){
		$this->wantBeStudant = $wantBeStudant;
	}

	public function getWantBeStudant(){
		return $this->wantBeStudant;
	}

	public function setSubject($subject){
		$this->subject = $subject;
	}

	public function getSubject(){
		return $this->subject;
	}

}
