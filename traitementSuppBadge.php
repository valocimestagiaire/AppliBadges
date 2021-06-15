
<?php
	
	include 'fonctions.php';
	sessionExiste();
	include 'bd.php';

	$id = $_POST['id'];

	$connexion = connexion();

	foreach($_POST['Télécommande'] as $tele){
		$query = mysqli_query($connexion,"DELETE FROM telecommande WHERE Id_Identité = '$id' AND Id_Télécommande = '$tele'");
	}
	
	foreach($_POST['badge_noir'] as $badgeN){
		$query = mysqli_query($connexion,"DELETE FROM badge_noir WHERE Id_Identité = '$id' AND Id_Badge_Noir = '$badgeN'");
	}
	
	foreach($_POST['badge_bleu'] as $badgeB){
		$query = mysqli_query($connexion,"DELETE FROM badge_bleu WHERE Id_Identité = '$id' AND Id_Badge_Bleu = '$badgeB'");
	}
	
	foreach($_POST['cafe'] as $cafe){
		$query = mysqli_query($connexion,"DELETE FROM cafe WHERE Id_Identité = '$id' AND Id_Café = '$cafe'");
	}
	
	header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
	mysqli_close($connexion);			
	

?>






