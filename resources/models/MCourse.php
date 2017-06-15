<?php

namespace models;

class MCourse{
	private $id;
	private $active;	
	private $featured;
	private $name;
	private $primaryImage;
	private $period;
	private $tableDescription;
	private $category;
	private $workload;
	private $description;
	private $objective;
	private $accesses;
	private $target;
	private $area;

	function __construct(array $data = []){
		$this->id = value_or_default($data['id'], null);
		$this->active = value_or_default($data['active'], true);	
		$this->featured = value_or_default($data['featured'], false);
		$this->name = value_or_default($data['name'], '');
		$this->primaryImage = value_or_default($data['primary_image'], '');
		$this->period = value_or_default($data['period'], '');
		$this->tableDescription = value_or_default($data['table_description'], '');
		$this->category = value_or_default($data['category'], '');
		$this->workload = value_or_default($data['workload'], '');
		$this->description = value_or_default($data['description'], '');
		$this->objective = value_or_default($data['objective'], '');
		$this->accesses = value_or_default($data['accesses'], '');
		$this->target = value_or_default($data['target'], '');
		$this->area = value_or_default($data['area'], '');
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setActive($active){
		$this->active = $active;
	}

	public function getActive(){
		return $this->active;
	}

	public function setFeatured($featured){
		$this->featured = ($featured);
	}

	public function getFeatured(){
		return $this->featured;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setPrimaryImage($primaryImage){
		$this->primaryImage = $primaryImage;
	}

	public function getPrimaryImage(){
		return $this->primaryImage;
	}

	public function setPeriod($period){
		$this->period = $period;
	}

	public function getPeriod(){
		return $this->period;
	}

	public function setTableDescription($tableDescription){
		$this->tableDescription = $tableDescription;
	}

	public function getTableDescription(){
		return $this->tableDescription;
	}

	public function setCategory($category){
		$this->category = $category;
	}

	public function getCategory(){
		return $this->category;
	}

	public function setWorkload($workload){
		$this->workload = $workload;
	}

	public function getWorkload(){
		return $this->workload;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setObjective($objective){
		$this->objective = $objective;
	}

	public function getObjective(){
		return $this->objective;
	}

	public function setAccesses($accesses){
		$this->accesses = $accesses;
	}

	public function getAccesses(){
		return $this->accesses;
	}

	public function setTarget($target){
		$this->target = $target;
	}

	public function getTarget(){
		return $this->target;
	}

	public function setArea($area){
		$this->area = $area;
	}
	
	public function getArea(){
		return $this->area;
	}

}
