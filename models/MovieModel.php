<?php
class MovieModel extends MovieClass{
	
	// Wyświetlenie informacji o filmie
	//
	public function View($id){
		
		
		/* Usunięcie filmu
		*/
		if (isset($_POST['delete'])){
			$id = $_POST['id'];
			$this->query("DELETE FROM movies WHERE id = $id");
			if ($this->resultSet(true)){
				Validator::newInfo('positive', 'Film został usunięty z listy.');
				header ('Location: '.ROOT_URL);
				exit();
			}
		}
		
		/* Przesłanie do edycji
		*/
		if (isset($_POST['edit'])){
			header ('Location: '.ROOT_URL.'movie/edit/'.$_POST['id']);
			exit();
		}
		
		/* Oznaczenie jako obejrzany
		*/
		if (isset($_POST['watched'])){
			$movie = new MovieClass();
			$movie->load_data($_POST['id']);
			if ($movie->set_as_watched() == true){
				Validator::newInfo('positive', 'Film oznaczono jako obejrzany.');
				header ('Location: '.ROOT_URL);
				exit();
			}else{
				Validator::newInfo('error', 'Nie udało się oznaczyć filmu jako obejrzany.');
				header ('Location: '.ROOT_URL.'movie/view/'.$_POST['id']);
				exit();
			}
		}
		
		$movie = new MovieClass();
		$movie->load_data($id);
		
		$data = $movie->get_info();
		$similar = $movie->get_similar_movies();
		
		return array($data, $similar);
	}
	
	public function Edit($id){
		
		if (isset($_POST['edit2'])){
			$validator = new Validator();
			$validator->checkTitle($_POST['title'], $_POST['id']);
			if ($validator->flag()){
				$validator->newInfo('error', $validator->flag());
				
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['description'] = $_POST['description'];
				$_SESSION['trailer'] = $_POST['trailer'];
				$_SESSION['type'] = $_POST['type'];
				
				header ('Location: '.ROOT_URL.'movie/edit/'.$_POST['id']);
				exit();
			}else{
				$movie = new MovieClass();
				$movie->load_data($_POST['id']);
				$movie->edit_movie($_POST['title'], $_POST['description'],
											$_POST['type'], $_POST['trailer']);
				$validator->newInfo('positive', 'Dane zostały zmienione.');
				header ('Location: '.ROOT_URL);
				exit();
			}
		}
		
		$movie = new MovieClass();
		if ($movie->load_data($id) === false){
			header('Location: '.ROOT_URL);
			exit();
		}
		
		$data = $movie->get_info();
		$types = $movie->get_all_types();
		
		return array($data, $types);
	}
	
	public function Add(){
		
		if (isset($_POST['add'])){
			$validator = new Validator();
			$validator->checkTitle($_POST['title']);
			if ($validator->flag()){
				$validator->newInfo('error', $validator->flag());
				
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['description'] = $_POST['description'];
				$_SESSION['trailer'] = $_POST['trailer'];
				$_SESSION['type'] = $_POST['type'];
				
				header ('Location: '.ROOT_URL.'movie/add');
				exit();
			}else{
				$movie = new MovieClass();
				$movie->add_movie($_POST['title'], $_POST['type'], $_POST['description'],
											$_POST['trailer']);
				$validator->newInfo('positive', 'Film "'.$_POST['title'].'" został dodany.');
				header ('Location: '.ROOT_URL);
				exit();
			}
		}
		$types = Library::get_all_types();
		
		return array($types);
	}
}