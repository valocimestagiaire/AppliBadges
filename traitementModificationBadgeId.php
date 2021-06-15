
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';
	
	if($_POST["valider"] == "Retour"){
		header("Location: Accueil.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom'])){
		
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$verisure = $_POST['verisure'];
		$parking = $_POST['parking'];
		$FZ = $_POST['FZ'];
		$pass = $_POST['pass'];
		$bureau = $_POST['bureau'];
		$periode = $_POST['periode'];
		
		if(strlen($nom) > 20 OR strlen($prenom) > 20){
			header("Location: Accueil.php?erreur=NPlong");
			exit(0);
		}
		
		$connexion = connexion();

		$queryUpdateIdentite = mysqli_query($connexion,"UPDATE identités SET Nom='$nom',Prénom='$prenom',Alarme='$verisure',Parking='$parking',Pass='$pass',Accès_Bureau='$bureau',Bureau_FZ='$FZ',Période='$periode' WHERE Id_Identité='$id'");
		
		foreach(array_combine($_POST['id_tele'],$_POST['tele']) as $idTele => $tele){
			$queryUpdateTele = mysqli_query($connexion,"UPDATE télécommande SET Status='$tele' WHERE Id_Identité='$id' and Id_Télécommande='$idTele'");
		}
		
		foreach(array_combine($_POST['id_badgeN'],$_POST['badgeN']) as $idNoir => $badgeN){
			$queryUpdateNoir = mysqli_query($connexion,"UPDATE badge_noir SET Status='$badgeN' WHERE Id_Identité='$id' and Id_Badge_Noir='$idNoir'");
		}
		
		foreach(array_combine($_POST['id_badgeB'],$_POST['badgeB']) as $idBleu => $badgeB){
			$queryUpdateBleu = mysqli_query($connexion,"UPDATE badge_bleu SET Status='$badgeB' WHERE Id_Identité='$id' and Id_Badge_Bleu='$idBleu'");
		}
		
		foreach(array_combine($_POST['id_cafe'],$_POST['cafe']) as $idCafe => $badgeC){
			$queryUpdateCafe = mysqli_query($connexion,"UPDATE café SET Status='$badgeC' WHERE Id_Identité='$id' and Id_Café='$idCafe'");
		}
		
		
		header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: Accueil.php?erreur=modBadge");
		exit(0);
	}

?>






