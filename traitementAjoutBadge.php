
<?php
	
	session_start();
	if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
		header("Location: Connexion.php");
	}
	
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'application badges';
	
	$id = $_POST['id'];
	$nom = $_POST['nomB'];
	$prenom = $_POST['prenomB'];
	$badge = $_POST['typeBadge'];
	$idBadge = $_POST['Id_badge'];
	$statusB = $_POST['status_badge'];
	
	if($_POST["valider"] == "Retour"){
		header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
		exit(0);
	}

	if($badge == "télécommande"){
		if(strlen($idBadge) > 12){
			header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom&erreur=idLong12");
			exit(0);
		}
	}elseif($badge == "badge_noir" OR $badge == "badge_bleu"){
		if(strlen($idBadge) > 10){
			header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom&erreur=idLong10");
			exit(0);
		}
	}else{
		if(strlen($idBadge) > 8){
			header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom&erreur=idLong8");
			exit(0);
		}
	}
	

	$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}

	$queryAjoutBadge = mysqli_query($connexion,"INSERT INTO $badge VALUES('$idBadge','$statusB','$id')");
	
	header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
	mysqli_close($connexion);			
	

?>






