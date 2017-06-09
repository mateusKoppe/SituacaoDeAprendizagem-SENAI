<?php

namespace models;

class MTeacher{
	private $id;
	private $name;
	private $formation;
	private $image;
	private $linkedin;
	private $interestArea;

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
	
	public function setFormation($formation){
		$this->formation= $formation;
	}

	public function getFormation(){
		return $this->formation;
	}
	
   	public function setImage($image){
		$this->image= $image;
	}

	public function getimage(){
		return $this->image;
	}

	public function setLinkedin($linkedin){
		$this->linkedin = $linkedin;
	}

	public function getLinkedin(){
		return $this->linkedin;
	}
	
    public function setInterestArea($interestArea){
		$this->interestArea = $interestArea;
	}

	public function getInterestArea(){
		return $this->interestArea;
	}

}
