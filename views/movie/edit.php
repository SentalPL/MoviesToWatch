<?php
	$movie = $viewmodel[0];
	$types = $viewmodel[1];
?>
<div class="row edit">
	<div class="col-sm-12">
		<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
			<input type="hidden" name="id" value="<?php echo $movie['id'];?>">
			<label for="title">Tytuł:</label>
			<input class="form-control" type="text" name="title" value="<?php if (isset($_SESSION['title'])){echo $_SESSION['title']; unset($_SESSION['title']);}else{echo $movie['title'];}?>"><br>
			<label for="description">Opis:</label>
			<input class="form-control" type="text" name="description" value="<?php if (isset($_SESSION['description'])){echo $_SESSION['description']; unset($_SESSION['description']);}else{echo $movie['description'];}?>"><br>
			<label for="trailer">Zwiastun:</label>
			<input class="form-control" type="text" name="trailer" value="<?php if (isset($_SESSION['trailer'])){echo $_SESSION['trailer']; unset($_SESSION['trailer']);}else{echo $movie['trailer'];}?>"><br>
			<select name="type" class="form-control">
			<?php
			foreach ($types as $type){
				echo '<option value="'.$type['name'].'"';if (@$_SESSION['type'] == $type['name']){echo ' selected';}echo '>'.$type['name'].'</option>';
			}
			?>
			</select><br>
			<input type="submit" name="edit2" class="btn btn-success" value="Zmień dane">
		</form>
		<?php
		Validator::showInfo();
		?>
	</div>
</div>