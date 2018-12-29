<div class="row typesEdit">
	<div class="col-sm-12">
	<?php
		$type = $viewmodel[0];
		$movies_count = $viewmodel[1];
	?>
		<h2>Modyfikujesz kategorię <b><?php echo $type['name'];?></b></h2>
		<p>W tej kategorii znajduje się <?php echo $movies_count;?> filmów. Zmieniając
			  jej nazwę lub usuwając ją zmieniasz także gatunek filmów.</p>
		<h3>Zmień nazwę:</h3>
		<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
			<input type="hidden" name="id" value="<?php echo $type['id'];?>">
			<label for="name">Nowa nazwa:</label>
			<input type="text" name="name" <?php if (isset($_SESSION['name'])){echo 'value="'.$_SESSION['name'].'"';unset($_SESSION['name']);}?>><br>
			<input type="submit" name="edit" class="btn btn-success" value="Zmień nazwę">
			<input type="submit" name="delete" class="btn btn-danger" value="Usuń kategorię">
		</form>
		<?php
		Validator::showInfo();
		?>
	</div>
</div>