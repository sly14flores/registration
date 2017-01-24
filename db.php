<?php

class pdo_db {

	var $db;
	var $prepare;
	var $table;
	var $sql;
	
	function __construct($table) {
		
		$this->table = $table;
		
		$server = "localhost";
		$db_name = "lzds";
		$dsn = "mysql:host=$server;dbname=$db_name;charset=utf8";
		$username = "root";
		$password = "sly";

		$this->db = new PDO($dsn, $username, $password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));			

	}

	function reset_increment_one() {

		$this->sql = "ALTER TABLE " . $this->table . " AUTO_INCREMENT = 1";
		$this->db->query($this->sql);		

	}

	function getData($sql) {

		$stmt = $this->db->query($sql);
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $results;

	}

	function insertData($data) {
		
		$prepare = "VALUES (";
		$this->prepare = "INSERT INTO ".$this->table." (";
		$insert = [];
		
		foreach ($data as $key => $value) {
			$this->prepare .= $key . ",";
			if ($value == 'CURRENT_TIMESTAMP') $prepare .= "$value,";
			else $prepare .= ":$key,";
			if ($value == 'CURRENT_TIMESTAMP') continue;
			$insert[":$key"] = $value;
		}
		
		$prepare = substr($prepare,0,strlen($prepare)-1);
		$prepare .= ")";
		$this->prepare = substr($this->prepare,0,strlen($this->prepare)-1);
		$this->prepare .= ") ";
		$this->prepare .= $prepare;
		
		$stmt = $this->db->prepare($this->prepare);
		$stmt->execute($insert);
		return $this->db->lastInsertId();

	}

	function updateData($data,$pk) {
		$insert = [];
		
		$prepare = "UPDATE ".$this->table." SET ";
		
		foreach ($data as $key => $value) {
			$prepare .= $key."=?,";
			$insert[] = $value;
		}
		
		$prepare = substr($prepare,0,strlen($prepare)-1);
		$prepare .= " WHERE ".array_keys($pk)[0]."=?";
		$insert[] = array_values($pk)[0];
		$stmt = $this->db->prepare($prepare);
		$stmt->execute($insert);		
		
	}

}

?>