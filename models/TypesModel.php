<?php

class TypesModel extends TypesClass{
	
	public function Index(){
		
		/* Dodanie nowej kategorii
		*/
		if (isset($_POST['add'])){
			$validator = new Validator();
			$validator->checkType($_POST['name']);
			if ($validator->flag()){
				$validator->newInfo('error', $validator->flag());
				
				$_SESSION['name'] = $_POST['name'];
				
				header ('Location: '.ROOT_URL.'types');
				exit();
			}else{
				$type = new TypesClass();
				$type->add_type($_POST['name']);
				$validator->newInfo('positive', 'Kategoria "'.$_POST['name'].'" została dodana.');
				header ('Location: '.ROOT_URL.'types');
				exit();
			}
		}
		
		$types = Library::get_all_types();
		return array ($types);
	}
	
	public function Edit($id){
		
		/* Zmiana nazwy kategorii
		*/
		if (isset($_POST['edit'])){
			$validator = new Validator();
			$validator->checkType($_POST['name']);
			if ($validator->flag()){
				$validator->newInfo('error', $validator->flag());
				
				$_SESSION['name'] = $_POST['name'];
				
				header ('Location: '.ROOT_URL.'types/edit/'.$_POST['id']);
				exit();
			}else{
				$type = new TypesClass();
				$type->get_type($_POST['id']);
				$type->edit_type($_POST['name']);
				$validator->newInfo('positive', 'Nazwa kategorii została zmieniona.');
				header ('Location: '.ROOT_URL.'types');
				exit();
			}
		}
		
		/* Usunięcie kategorii
		*/
		if (isset($_POST['delete'])){
			$type = new TypesClass();
			$type->get_type($_POST['id']);
			$type->delete_type();
			Validator::newInfo('positive', 'Kategoria została usunięta.');
			header ('Location: '.ROOT_URL.'types');
			exit();
		}
		
		$type = TypesClass::get_type($id);
		if ($type === false){
			header('Location: '.ROOT_URL);
			exit();
		}
		$movies_count = count(Library::get_all_movies($type['name']));
		return array ($type, $movies_count);
	}
}