<div class="row view">
	<div class="col-sm-8">
<?php
	$movie = $viewmodel[0];
	
	echo '<h2>'.$movie['title'].'</h2>
			<p>'.$movie['type'].'</p>';
	if (!empty($movie['description'])){
		echo '<p>'.$movie['description'].'</p>';
	}			
	if (!empty($movie['trailer'])){
		echo '<iframe src="'.$movie['trailer'].'">Zwiastun filmu</iframe>';
	}
	echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
				<input type="hidden" name="id" value="'.$movie['id'].'">
				<input type="submit" name="edit" class="btn btn-primary" value="Edytuj dane">
				<input type="submit" name="delete" class="btn btn-danger" value="Usuń z listy">
				<input type="submit" name="watched" class="btn btn-success" value="Oznacz jako obejrzany">
			</form>';
?>
	</div>
	<div class="col-sm-4">
<?php
	$similar = $viewmodel[1];
	if (!empty($similar)){
		echo '<h3>Zobacz również:</h3>';
		foreach ($similar as $movie){
			echo '<a href="'.ROOT_URL.'movie/view/'.$movie['id'].'">
					'.$movie['title'].'</a><br>';
		}
	}
?>
	</div>
</div>