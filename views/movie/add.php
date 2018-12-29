<?php
	$types = $viewmodel[0];
?>
<div class="row add">
	<div class="col-sm-12">
		<h2>Dodaj nowy film:</h2>
		<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
			<label for="title">Tytuł:</label>
			<input class="form-control" type="text" name="title" value="<?php if (isset($_SESSION['title'])){echo $_SESSION['title']; unset($_SESSION['title']);}?>"><br>
			<label for="description">Opis:</label>
			<input class="form-control" type="text" name="description" value="<?php if (isset($_SESSION['description'])){echo $_SESSION['description']; unset($_SESSION['description']);}?>"><br>
			<label for="trailer">Zwiastun:</label>
			<input class="form-control" type="text" name="trailer" value="<?php if (isset($_SESSION['trailer'])){echo $_SESSION['trailer']; unset($_SESSION['trailer']);}?>"><br>
			<select name="type" class="form-control">
			<?php
			foreach ($types as $type){
				echo '<option value="'.$type['name'].'"';if (@$_SESSION['type'] == $type['name']){echo ' selected';}echo '>'.$type['name'].'</option>';
			}
			?>
			</select><br>
			<input type="submit" name="add" class="btn btn-success" value="Dodaj film">
		</form>
		<?php
		Validator::showInfo();
		?>
	</div>
</div>