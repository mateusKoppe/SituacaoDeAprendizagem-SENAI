<?php 

class Database{
	const HOST = "localhost";
	const USER = "root";
	const PASSWORD = "";
	const DB_NAME = "sa_senai";	

	public function create(){
		$conn = new PDO("mysql:host=" . SELF::HOST . ";dbname=" . SELF::DB_NAME, SELF::USER, SELF::PASSWORD);
		return $conn;
	}

}