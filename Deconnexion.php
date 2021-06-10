<?php

	session_start();
	if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
		header("Location: Connexion.php");
	}

	session_start();
	session_destroy();
	
	header("Location: Connexion.php");

	
?>