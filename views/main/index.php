<div class="row main">
	<div class="col-sm-12">
		<a href="<?php ROOT_URL;?>movie/add" class="action">
			Dodaj film</a>
		<a href="<?php ROOT_URL;?>history" class="action">
			Obejrzane</a>
		<a href="<?php ROOT_URL;?>types" class="action">
			Kategorie</a>
<?php
	/* Wyświetlenie kategorii
	*/
	$types = $viewmodel[0];
	if (empty($types)){
		echo '<p>Utwórz kategorię, aby rozpocząć korzystanie z aplikacji.</p>';
	}else{
		echo '<h2>Wybierz kategorię, aby przeglądać filmy:</h2>
				<form class="categories" action="'.$_SERVER['REQUEST_URI'].'" method="post">';
		foreach ($types as $type){
			echo '<input type="submit" class="btn btn-primary" name="type" value="'.$type['name'].'">';
		}
		echo '</form>';
	}
	
	/* Wyświetlenie filmów
	/* dla danej kategorii
	*/
	$movies = $viewmodel[1];	
	if (!empty($movies)){
		foreach ($movies as $movie){
			echo '<a href="'.ROOT_URL.'movie/view/'.$movie['id'].'">'.$movie['title'].'</a><br>
					<p>'.$movie['type'].'</p>';
		}
	}else{
		echo '<p>Niestety na liście do obejrzenia nie znajdują się żadne filmy.</p>';
	}
	// Wyświetlenie istniejącego komunikatu
	Validator::showInfo();
?>
	</div>
</div>
<?php		
	$random = $viewmodel[2];
	if (!empty($random)){
		echo '<div class="row main random">
					<div class="col-sm-12">
				<h2>Losowy film:</h2>
				<h3>'.$random[0]['title'].'</h3>
				<p>'.$random[0]['description'].'</p>';
		if (!empty($random[0]['trailer'])){
			echo '<iframe src="'.$random[0]['trailer'].'"></iframe>';
		}
		echo '</div>
				</div>';
	}
?>