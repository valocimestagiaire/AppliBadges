<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'application_badges';

function connexion(){
	$connexion = new mysqli($GLOBALS['servername'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['database']);
	if($connexion->connect_error){
		die('Erreur : ' .$connexion->connect_error);
	}
	return $connexion;
}

?>