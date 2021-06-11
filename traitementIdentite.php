
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
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$verisure = $_POST['verisure'];
		$parking = $_POST['parking'];
		$fz = $_POST['FZ'];
		$pass = $_POST['pass'];
		$bureau = $_POST['bureau'];
		$periode = $_POST['periode'];
		
		$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}
		
		$queryIdExiste =  mysqli_query($connexion,"SELECT * FROM identités WHERE Nom='$nom' and Prénom='$prenom'");
		
		if(mysqli_num_rows($queryIdExiste) > 0){
			header("Location: CreationIdentite.php?erreur=idExiste");
			mysqli_close($connexion);
			exit(0);
		}
		
		
		$queryIdentite = mysqli_query($connexion,"INSERT INTO identités (Nom,Prénom,Alarme,Parking,Pass,Accès_Bureau,Bureau_FZ,Période) VALUES ('$nom','$prenom','$verisure','$parking','$pass','$bureau','$fz','$periode')");
		
		header("Location: Accueil.php");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: CreationIdentite.php?erreur=champs");
	}
?>






