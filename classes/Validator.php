<?php
class Validator extends Database{
	
	private $flag = false;
	
	public function newInfo($type, $message){
		if ($type == 'error'){
			$type = 'e_info';
		}else{
			$type = 'p_info';
		}
		$_SESSION['info'] = '<p class="'.$type.'">'.$message.'</p>';
	}
	
	public function showInfo(){
		if (isset($_SESSION['info'])){
			echo $_SESSION['info'];
			unset ($_SESSION['info']);
		}
	}
	
	public function checkTitle($title, $id = false){
		$query = "SELECT * FROM movies WHERE title = '$title'";
		if ($id){ 
			$query .= " AND id != $id";
		}
		$this->query($query);
		if (!empty($this->resultSet())){
			$this->flag = 'Film o takim tytule już istnieje.';
		}
		$this->query("SELECT * FROM watched WHERE title = '$title'");
		if (!empty($this->resultSet())){
			$this->flag = 'Ten film został już przez Was obejrzany!';
		}
	}
	
	public function checkType($name){
		$this->query("SELECT * FROM types WHERE name = '$name'");
		if (!empty($this->resultSet())){
			$this->flag = 'Kategoria o takiej nazwie już istnieje.';
		}
	}
	
	public function flag(){
		return $this->flag;
	}
}
?>