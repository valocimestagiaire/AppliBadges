
<?php
	
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'application badges';
	
	if($_POST["valider"] == "Retour"){
		header("Location: Accueil.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['mdp'])){
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$role = $_POST['role'];
		
		$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}
		
		$queryUserExist = mysqli_query($connexion,"SELECT * FROM utilisateurs WHERE Login='$login'");
		if($nb_lignes = mysqli_num_rows($queryUserExist) > 0){
			header("Location: CreationCompte.php?erreur=logExist");
			exit(0);
		}
		
		
		$queryInsert = mysqli_query($connexion,"INSERT INTO utilisateurs(Login,mdp,Nom,Prénom,Rôle) VALUES ('$login','$mdp','$nom','$prenom','$role')");
		header("Location: Accueil.php");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: CreationCompte.php?erreur=champs");
		exit(0);
	}

?>






