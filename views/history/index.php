<div class="row history">
	<div class="col-sm-12">
		<h2>Obejrzane filmy:</h2>
		<?php
		$types = $viewmodel[0];
		if (!empty($types)){
			echo '<p>Zobacz według kategorii:</p>
					<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
			foreach ($types as $type){
				echo '<input type="submit" name="type" class="btn btn-primary" value="'.$type['name'].'">';
			}
			echo '</form>';
		}else{
			echo '<p>Brak kategorii do wybrania.</p>';
		}
		
		$movies = $viewmodel[1];
		if (!empty($movies)){
			foreach ($movies as $movie){
				echo '<h3>'.$movie['title'].'</h3>
						<p>'.$movie['type'].'</p>';
			}
		}else{
			echo '<p>Nie obejrzeliście jeszcze żadnego filmu w tej kategorii.</p>';
		}
		?>
	</div>
</div>