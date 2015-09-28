<?php
// Database connection
try {
	$handler = new PDO('mysql:host=127.0.0.1;dbname=futureoffinance' ,'root','');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOExeption $e) {

	echo $e->getMessage();
	die();
	//exit('Error Connecting To DataBase');
}
// Exit Database connection

// Users class
class Users {
	public $firstname, $lastname;

	public function __construct() {
		$this->users = "Voornaam: {$this->firstname} Achternaam: {$this->lastname}";
	}
}

// Simple query
$query = $handler->query('SELECT * FROM users');

// Set fetch mode
$query->setFetchMode(PDO::FETCH_CLASS, 'Users');

/*while($r = $query->fetch(PDO::FETCH_OBJ)) {
	echo $r->firstname, '<br>';
}*/

while($r = $query->fetch()) {
	echo $r->users;
}