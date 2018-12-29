<?php

class TypesClass extends Library{
	
	private $id;
	private $name;
	
	public function add_type($name){
		$this->query("INSERT INTO types VALUES (null, '$name')");
		$this->resultSet();
	}
	
	public function edit_type($name){
		$this->query("UPDATE types SET name = '$name' WHERE id = ".$this->id);
		$this->resultSet();
		// Zmiana kategorii filmów na nową
		$this->query("UPDATE movies SET type = '$name' WHERE type = '".$this->name."'");
		$this->resultSet();
	}
	
	public function delete_type(){
		$this->query("DELETE FROM types WHERE id = ".$this->id);
		$this->resultSet();
		// Zmiana kategorii filmów na Nieokreśloną
		$this->query("UPDATE movies SET type = 'Nieokreślony' WHERE type = '".$this->name."'");
		$this->resultSet();
	}
	
	public function get_type($id){
		$this->query("SELECT * FROM types WHERE id = $id");
		$type = $this->resultSet();
		if (empty($type)){
			return false;
		}
		$this->id = $type[0]['id'];
		$this->name = $type[0]['name'];
		return array('id'=>$this->id, 'name'=>$this->name);
	}
}