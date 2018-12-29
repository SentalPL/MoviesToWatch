<?php
class MainModel extends Library{
	
	public function Index(){
		
		$library = new Library();
		//$library->get_today_movie();
		
		$types = $library->get_all_types();
		$movies = $library->get_all_movies(@$_POST['type']);
		
		$random = $library->get_random_movie(@$_POST['type']);
				
		return array($types, $movies, $random);
	}
}