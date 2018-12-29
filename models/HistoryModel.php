<?php
class HistoryModel extends Library{
	
	public function Index(){
		$types = Library::get_all_types();
		$movies = Library::get_watched_movies(@$_POST['type']);
		return array($types, $movies);
	}
}
?>