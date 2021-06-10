
<?php
	/*ADD Protection*/
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'application badges';
	
	if($_POST["valider"] == "Retour"){
		header("Location: AfficherComptes.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['login']) && !empty($_POST['mdp'])){
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		$role = $_POST['role'];
		$ancienLogin = $_POST['ancienLog'];
		
		$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}

		$queryUpdate = mysqli_query($connexion,"UPDATE utilisateurs SET Login='$login', mdp='$mdp', Nom='$nom', Prénom='$prenom', Rôle='$role' WHERE Login='$ancienLogin'");
		
		header("Location: AfficherComptes.php");
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: CreationCompte.php?erreur=champs&log='$login'&type=mod");
		exit(0);
	}

?>






