<?php
class MovieClass extends Library{
	
	protected $id;
	private $title;
	private $description;
	protected $type;
	private $date_creation;
	
	public function load_data($id){
		$this->query("SELECT * FROM movies WHERE id = $id");
		$data = $this->resultSet();
		if (empty($data)){
			return false;
			exit();
		}
		
		$this->id = $id;
		$this->title = $data[0]['title'];
		$this->description = $data[0]['description'];
		$this->type = $data[0]['type'];
		$this->trailer = $data[0]['trailer'];		
	}
	
	public function get_info(){
		return array('id' => $this->id,
						   'title' => $this->title, 
						   'description' => $this->description,
						   'type' => $this->type,
						   'trailer' => $this->trailer);
	}
	
	public function set_as_watched(){
		$date = date('Y-m-d H:i:s');
		$this->query("INSERT INTO watched VALUES (null, '".$this->title."',
							'".$this->type."', '$date')");
		if ($this->resultSet(true)){
			$this->query("DELETE FROM movies WHERE id = ".$this->id);
			if ($this->resultSet(true)){
				return true;
			}else{ return false;}
		}else{ return false;}
	}
	
	public function add_movie($title, $type, $description, $trailer){
		$date = date('Y-m-d H:i:s');
		$this->query("INSERT INTO movies VALUES (null, '$title', '$type', '$description',
						  '$trailer', '$date')");
		$this->resultSet();
	}
	
	public function edit_movie($title, $description, $type, $trailer){
		$this->query("UPDATE movies SET title = '$title', description = '$description',
							type = '$type', trailer = '$trailer' WHERE id = ".$this->id);
		$this->resultSet();
	}
	/*
	public function getInfo($id){
		$this->query("SELECT * FROM movies WHERE id = $id");
		$data = $this->resultSet();
		
		$this->id = $data[0]['id'];
		$this->title = $data[0]['title'];
		$this->description = $data[0]['description'];
		$this->type = $data[0]['type'];
		$this->date_creation = $data[0]['date_creation'];
	}
	
	public function viewInfo(){
		echo '<h2>'.$this->title.'</h2>
				<h3>'.$this->type.'</h3>
				<p>'.$this->description.'</p>';
	}
	
	public function viewEditForm(){
		echo '<br><h2>Zmień informacje:</h2>
		<form action="'.$_SERVER['PHP_SELF'].'" method="post">
			<input type="hidden" name="id" value="'.$this->id.'">
			<label for="title">Tytuł:</label>
			<input type=text" name="title" value="'.$this->title.'"><br>
			<label for="description">Opis:</label>
			<input type=text" name="description" value="'.$this->description.'"><br>
			<label for="type">Kategoria:</label>
			<select name="type">';
		foreach ($this->getTypes() as $type){
			echo '<option value="'.$type['name'].'"';
					if ($this->type == $type['name']){
						echo ' selected';
					}
			echo '>'.$type['name'].'</option>';
		}
		echo '</select><br>
			<input type="submit" name="edit" value="Edytuj">
		</form>';
	}
	
	public function edit($id){
		$this->title = $_POST['title'];
		$this->description = $_POST['description'];
		$this->type = $_POST['type'];
		
		$this->query("UPDATE movies SET title = '".$this->title."', description = '".$this->description."',
							type = '".$this->type."' WHERE id = ".$this->id."");
		if ($this->resultSet(true)){
			$_SESSION['p_info'] = '<p>Dane zostały zmienione.</p>';
			header ('Location: index.php');
			exit();
		}
	}
	
	public function add($title, $description, $type){
		$this->query("INSERT INTO movies VALUES title = '$title', description = '$description',
							type = '$type'");
		if ($this->resultSet()){
			return '<p>Dodano nowy film do obejrzenia.</p>';
		}
	}
	*/
}
?>