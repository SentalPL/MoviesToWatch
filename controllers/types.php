<?php
class Types extends Controller{
	protected function Index(){
		$viewmodel = new TypesModel();
		$this->returnView($viewmodel->Index(), true);
	}
	
	protected function Edit(){
		$viewmodel = new TypesModel();
		$this->returnView($viewmodel->Edit(basename(ROOT_URL.$_SERVER['REQUEST_URI'])), true);
	}
}
?>