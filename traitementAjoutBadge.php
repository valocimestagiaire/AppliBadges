
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
	
	if($_POST["valider"] == "Retour"){
		header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
		exit(0);
	}

	$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}

	$queryAjoutBadge = mysqli_query($connexion,"INSERT INTO $badge VALUES('$idBadge','ACTIF','$id')");
	echo var_dump($queryAjoutBadge);
	echo var_dump($badge);
	echo var_dump($idBadge);
	echo var_dump($id);
	
	header("Location: Badges.php?id=$id&nom=$nom&prenom=$prenom");
	mysqli_close($connexion);			
	

?>






