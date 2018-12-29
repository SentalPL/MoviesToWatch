<div class="row types">
	<div class="col-sm-12">
	<h2>Edytuj kategorie:</h2>
	<?php
		$types = $viewmodel[0];
		foreach ($types as $type){
			echo '<a href="'.ROOT_URL.'types/edit/'.$type['id'].'">'.$type['name'].'</a><br>';
		}
	?>
	<br>
	<h2>Dodaj kategorię:</h2>
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
		<label for="name">Nazwa kategorii:</label>
		<input class="form-control" type="text" name="name" value="<?php if (isset($_SESSION['name'])){echo $_SESSION['name']; unset($_SESSION['name']);}?>"><br>
		<input class="btn btn-success" name="add" type="submit" value="Dodaj kategorię">
	</form>
	<?php
	Validator::showInfo();
	?>
	</div>
</div>