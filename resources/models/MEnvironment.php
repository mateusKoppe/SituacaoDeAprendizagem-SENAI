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
	private $accesses;

	function __construct($data){
		$this->name = $data['name'];
		$this->id = value_or_default($data['id'], null);
		$this->active = value_or_default($data['active'], '');
		$this->featured = value_or_default($data['featured'], '');
		$this->description = value_or_default($data['description'], '');
		$this->capacity = value_or_default($data['capacity'], 0);
		$this->size = value_or_default($data['size'], '');
		$this->accesses = value_or_default($data['accesses'], 0);
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

	public function setAccesses($accesses){
		return $this->accesses = $accesses;
	}

	public function getAccesses(){
		return $this->accesses;
	}

}