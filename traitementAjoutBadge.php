
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';

	$badge = $_POST['typeBadge'];
	$StatutB = $_POST['Statut_badge'];
	
	if($_POST["valider"] == "Retour"){
		header("Location: Accueil.php");
		exit(0);
	}
	
	if($badge != "alarme"){
		$idBadge = $_POST['Id_badge'];
	}
	else{
		$idBadge = $_POST['selAlarme'];
	}

	if($badge == "telecommande"){
		if(strlen($idBadge) > 12){
			header("Location: Accueil.php?erreur=idLong12");
			exit(0);
		}
	}elseif($badge == "badge_noir" OR $badge == "badge_bleu" OR $badge == "parking"){
		if(strlen($idBadge) > 10){
			header("Location: Accueil.php?erreur=idLong10");
			exit(0);
		}
	}else{
		if(strlen($idBadge) > 8){
			header("Location: Accueil.php?erreur=idLong8");
			exit(0);
		}
	}
	
	
	
	$connexion = connexion();
	
	$queryAjoutBadge = mysqli_query($connexion,"INSERT INTO $badge VALUES('$idBadge','$StatutB',NULL)");
	
	
	header("Location: Accueil.php");
	mysqli_close($connexion);			
	

?>






