<?php
class History extends Controller{
	protected function Index(){
		$viewmodel = new HistoryModel();
		$this->returnView($viewmodel->Index(), true);
	}
}
?>