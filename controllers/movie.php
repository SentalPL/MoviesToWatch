<?php
class Movie extends Controller{
	
	protected function View(){
		$viewmodel = new MovieModel();
		$this->returnView($viewmodel->View(basename(ROOT_URL.$_SERVER['REQUEST_URI'])), true);
	}
	
	protected function Edit(){
		$viewmodel = new MovieModel();
		$this->returnView($viewmodel->Edit(basename(ROOT_URL.$_SERVER['REQUEST_URI'])), true);
	}
	
	protected function Add(){
		$viewmodel = new MovieModel();
		$this->returnView($viewmodel->Add(), true);
	}
}
?>