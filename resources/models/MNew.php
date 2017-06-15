<?php 

namespace models;

class MNew{

	private $id;
	private $active;
	private $featured;
	private $name;
	private $description;
	private $accesses;
	private $primaryImage;

	function __construct(array $data = []){
		$this->name = value_or_default($data['name'], '');
		$this->id = value_or_default($data['id'], null);
		$this->active = value_or_default($data['active'], '');
		$this->featured = value_or_default($data['featured'], '');
		$this->description = value_or_default($data['description'], '');
		$this->accesses = value_or_default($data['accesses'], 0);
		$this->primaryImage = value_or_default($data['primary_image'], '');
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

	public function setAccesses($accesses){
		return $this->accesses = $accesses;
	}

	public function getAccesses(){
		return $this->accesses;
	}

	public function setPrimaryImage($primaryImage){
		$this->primaryImage = $primaryImage;
	}

	public function getPrimaryImage(){
		return $this->primaryImage;
	}

}