<?php
require_once './config.php';

class Model{
	protected $dbh;
	protected $stmt;
	
	public function __construct(){
		$this->dbh = new PDO('mysql:host='.HOST.';dbname='.DB_NAME, USER, PASS,
										array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", "SET CHARACTER_SET utf8_polish_ci"));
	}
	
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}	
	
	public function bind($param, $value, $type = null){
		if (is_null($type)){
			switch (true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	
	public function execute(){
		$this->stmt->execute();
	}
	
	public function resultSet($boolean = false){
		$this->execute();
		if ($boolean == true){
			return $this->stmt;
		}else{
			return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}
}
?>