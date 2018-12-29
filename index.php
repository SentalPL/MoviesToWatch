<?php
session_start();

require 'config.php';
require 'classes/Bootstrap.php';
require 'classes/Controller.php';
require 'classes/Model.php';

require 'classes/Database.php';
require 'classes/Validator.php';
require 'classes/Library.php';
require 'classes/Movie.php';
require 'classes/Types.php';

require 'controllers/main.php';
require 'controllers/movie.php';
require 'controllers/types.php';
require 'controllers/history.php';

require 'models/MainModel.php';
require 'models/MovieModel.php';
require 'models/TypesModel.php';
require 'models/HistoryModel.php';

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller){
	$controller->executeAction();
}
?>