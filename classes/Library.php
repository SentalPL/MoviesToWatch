<?php

require_once 'Model.php';

class Library extends Database{
	
	private $movies = array();
	private $types = array();
	
	public function __construct(){
		parent::__construct();
	}
	
	public function get_similar_movies(/*$type*/){
		//die ("SELECT * FROM movies WHERE type = '".$this->type."' AND id != ".$this->id." ORDER BY RAND() LIMIT 3");
		$this->query("SELECT * FROM movies WHERE type = '".$this->type."' AND id != ".$this->id." ORDER BY RAND() LIMIT 3");
		return $this->resultSet();
	}
	
	public function get_random_movie($type = false){
		$query = "SELECT * FROM movies";
		if ($type !== null){
			$query .= " WHERE type = '$type'";
		}
		$query .= " ORDER BY RAND() LIMIT 1";
		$this->query($query);
		return $this->resultSet();
	}
	
	public function get_all_movies($type = false){
		$query = "SELECT * FROM movies";
		if ($type !== null){
			foreach ($_POST as $key=>$value){
				if ($key == 'type'){
					$type = $value;
				}
			}
			$query .= " WHERE type = '$type'";
		}
		$this->query($query);
		return $this->resultSet();
	}
	
	public function get_all_types(){
		$this->query("SELECT * FROM types");
		return $this->resultSet();
	}
	
	public function get_today_movie(){
		
	}
	
	public function get_watched_movies($type = false){
		$query = "SELECT * FROM watched";
		if ($type !== null){
			foreach ($_POST as $key=>$value){
				if ($key == 'type'){
					$type = $value;
				}
			}
			$query .= " WHERE type = '$type'";
		}
		$this->query($query);
		return $this->resultSet();
	}
	/*public function getMovies(){
		return $this->movies;
	}*/
	
	
	public function showMoviesList($type){
		$this->selectMovies($type);
		if (!empty($this->movies)){
			$this->showMovies();
		}else{
			echo '<p>Brak filmów do obejrzenia w tej kategorii.</p>';
		}
	}
	
	public function getTypes(){
		$this->query("SELECT * FROM types");
		$this->types = $this->resultSet();
		return $this->types;
	}
	
	private function selectMovies($type){
		$this->query("SELECT * FROM movies WHERE type = '$type'");
		$this->movies = $this->resultSet();
	}
	
	private function showMovies(){
		$list = '';
		foreach ($this->movies as $movie){
			$list .= '<h2>'.$movie['title'].'</h2>';
			if (!empty($movie['description'])){
				$list .= '<p>'.$movie['description'].'</p>';
			}
			$list .= '<form action="movie.php" method="post">
							<input type="hidden" name="id" value="'.$movie['id'].'">
							<input type="submit" name="viewMovie" value="Przejdź do filmu">
						</form>';
		}
		echo $list;
	}
}
?>