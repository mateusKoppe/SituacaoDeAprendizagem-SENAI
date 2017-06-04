<?php 

namespace models;

class MEnvironment{

	private $id;
	private $active;
	private $featured;
	private $name;
	private $description;
	private $capacity;
	private $size;

	function __construct($data){
		$this->name = $data['name'];
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId(){
		return $this->id; 
	}

	public function setActive($active) {
		$this->active = $active;
	}

	public function getActive(){
		return $this->active; 
	}

	public function setFeatured($featured) {
		$this->featured = $featured;
	}

	public function getFeatured(){
		return $this->featured; 
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getName(){
		return $this->name; 
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description; 
	}

	public function setCapacity($capacity) {
		$this->capacity = $capacity;
	}

	public function getCapacity(){
		return $this->capacity; 
	}

	public function setSize($size) {
		$this->size = $size;
	}

	public function getSize(){
		return $this->size; 
	}

}