
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';

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

	if($badge == "telecommande"){
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
	

	$connexion = connexion();

	$queryAjoutBadge = mysqli_query($connexion,"INSERT INTO $badge VALUES('$idBadge','$statusB','$id')");
	
	header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
	mysqli_close($connexion);			
	

?>






