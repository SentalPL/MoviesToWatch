<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Movies To Watch</title>
	<link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/mainStyle.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row header">
		<div class="col-sm-12">
			<h1><a href="<?php echo ROOT_URL;?>">Movies To Watch</a></h1>
			<p>Znudzeni ciągłym szukaniem filmu? Oto baza filmów, które mieliście obejrzeć!</p>
		</div>
	</div>
	<?php require ($view);?>
</div>
</body>
</html>