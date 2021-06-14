
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

	$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}

	foreach($_POST['Télécommande'] as $tele){
		$query = mysqli_query($connexion,"DELETE FROM Télécommande WHERE Id_Identité = '$id' AND Id_Télécommande = '$tele'");
	}
	
	foreach($_POST['badge_noir'] as $badgeN){
		$query = mysqli_query($connexion,"DELETE FROM badge_noir WHERE Id_Identité = '$id' AND Id_Badge_Noir = '$badgeN'");
	}
	
	foreach($_POST['badge_bleu'] as $badgeB){
		$query = mysqli_query($connexion,"DELETE FROM badge_bleu WHERE Id_Identité = '$id' AND Id_Badge_Bleu = '$badgeB'");
	}
	
	foreach($_POST['cafe'] as $cafe){
		$query = mysqli_query($connexion,"DELETE FROM café WHERE Id_Identité = '$id' AND Id_Café = '$cafe'");
	}
	
	header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
	mysqli_close($connexion);			
	

?>






