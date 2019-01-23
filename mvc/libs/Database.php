<?php


class Database 
{
	private $conn;
	private $query ='';
	public function connect(){
		$this->conn = mysqli_connect("localhost", "root", "", "mvc_php");

		if (!$this->conn) {
    		echo "Error: Unable to connect to MySQL." . PHP_EOL;
    		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    		exit;
		}
		return $this->conn;
	}

	public function selectEverything($target = '*'){
		//"SELECT id,name";
		$this->query .= 'SELECT ' .$target . ' ';
		return $this;
	}
	public function select($columname){
		$this->query .= 'SELECT ' .$columname . '';
		return $this;
	}
	public function from($tableName){
		$this->query .='FROM ' .$tableName. ' ';
		return $this;
	}
	public function where($field, $value, $operator = '='){
		$this->query .= 'WHERE ' .$field. ' ' .$operator .' '.$value.' ';
		return $this;
	}
	public function whereAnd($field, $value, $operator = '='){
		$this->query .= ' AND ' .$field. ' ' .$operator .' '.$value.' ';
		return $this;
	}
	public function whereOr($field, $value, $operator = '='){
		$this->query .= ' AND ' .$field. ' ' .$operator .' '.$value.' ';
		return $this;
	}
	public function insert($tablename){
		$this->query .= 'INSERT ' . 'INTO `' . $tablename .'` ';
		return $this;
	}
	public function Column($columnName){
		$this->query .= '(' . $columnName .')' . ' ';
		return $this;
	}
	public function values($value){
		$this->query .= 'VALUES (' .$value.') ';
		return $this;
	}
	public function delete(){
		$this->query .= ' DELETE ';
		return $this;
	}
	public function update($tablename){
		$this->query .= 'UPDATE ' .$tablename . ' ';
		return $this;
	}
	public function set($columnname, $operator = '=', $value){
		$this->query .= 'SET ' .$columnname. ' ' .$operator .' '.$value.' ';
	}
	public function orderBy(){
		$this->query .= ' ORDER BY ' . ' ';
		return $this;
	}
	public function innerJoin($tablename,$tablenamevalue1, $tablenamevalue2){
		$this->query .= ' INNER JOIN ' .$tablename . ' ON ' .$tablenamevalue1 . ' = ' . $tablenamevalue2 . ' ';
		return $this;
	}
	
	public function get(){
		$result = mysqli_query($this->connect(),$this->query);
		var_dump($this->query);
		return $result;
		
		//echo $this->query;
		//return $row;
		//return $row;
		//return $this;

	}
	public function getAssoc(){
		$result = mysqli_query($this->connect(),$this->query);
		var_dump($result);
		//die();
		while ($row = mysqli_fetch_assoc($result)) {
    		echo "ID: " .$row['id']
    			."Title: " . $row['title']
    			."Image: " . $row['image']
    			."Checkbox: " . $row['checkbox']
    			."Select: " . $row['select']
    			."Textarea: " .$row['textarea'];


    	    
		}
	}
}