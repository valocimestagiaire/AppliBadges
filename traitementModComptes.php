<?php
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'application badges';
	$login = $_GET['log'];
	
	/*PAS FINI*/
	if($_GET['type'] == "mod"){
		$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}
		
		$queryModif = mysqli_query($connexion,"SELECT * FROM utilisateurs WHERE Login='$login'");
	}
	elseif($_GET['type'] == "supp"){
		$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}
		
		$querySupp = mysqli_query($connexion,"DELETE FROM utilisateurs WHERE Login='$login'");
		header("Location: AfficherComptes.php");
		exit(0);
	}






?>