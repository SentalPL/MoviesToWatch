<?php
class Main extends Controller{
	protected function Index(){
		$viewmodel = new MainModel();
		$this->returnView($viewmodel->Index(), true);
	}
}
?>