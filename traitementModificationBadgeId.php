
<?php
	
	session_start();
	if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
		header("Location: Connexion.php");
	}
	
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'application badges';
	
	if($_POST["valider"] == "Retour"){
		header("Location: Accueil.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom'])){
		
		$id = $_POST['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$tele = $_POST['tele'];
		$badgeN = $_POST['badgeN'];
		$badgeB = $_POST['badgeB'];
		$badgeC = $_POST['badgeC'];
		$verisure = $_POST['verisure'];
		$parking = $_POST['parking'];
		$FZ = $_POST['FZ'];
		$pass = $_POST['pass'];
		$bureau = $_POST['bureau'];
		$periode = $_POST['periode'];
		
		$idTele = $_POST['teleChoix'];
		$idNoir = $_POST['noirChoix'];
		$idBleu = $_POST['bleuChoix'];
		$idCafe = $_POST['cafeChoix'];
		
		$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}

		

		$queryUpdateIdentite = mysqli_query($connexion,"UPDATE identités SET Nom='$nom',Prénom='$prenom',Alarme='$verisure',Parking='$parking',Pass='$pass',Accès_Bureau='$bureau',Bureau_FZ='$FZ',Période='$periode' WHERE Id_Identité='$id'");
		
		$queryUpdateTele = mysqli_query($connexion,"UPDATE télécommande SET Status='$tele' WHERE Id_Identité='$id' and Id_Télécommande='$idTele'");

		$queryUpdateNoir = mysqli_query($connexion,"UPDATE badge_noir SET Status='$badgeN' WHERE Id_Identité='$id' and Id_Badge_Noir='$idNoir'");
		
		$queryUpdateBleu = mysqli_query($connexion,"UPDATE badge_bleu SET Status='$badgeB' WHERE Id_Identité='$id' and Id_Badge_Bleu='$idBleu'");
		
		$queryUpdateCafe = mysqli_query($connexion,"UPDATE café SET Status='$badgeC' WHERE Id_Identité='$id' and Id_Café='$idCafe'");
		
		header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: Accueil.php?erreur=modBadge");
		exit(0);
	}

?>






