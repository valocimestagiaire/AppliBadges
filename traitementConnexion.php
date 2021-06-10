
<?php
	session_start();
	if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
		header("Location: Connexion.php");
	}
	
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'application badges';
	

	if(!empty($_POST['user_login']) && !empty($_POST['user_password'])){
		$login = $_POST['user_login'];
		$mdp = $_POST['user_password'];
					
		$connexion = new mysqli($servername,$username,$password,$database);
		if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
		}
		$query = mysqli_query($connexion,"SELECT * FROM utilisateurs WHERE Login= '$login' and mdp= '$mdp'");
		
		if($nb_lignes = mysqli_num_rows($query) == 1){
			session_start();
			$user_connecte = mysqli_fetch_array($query);
			$_SESSION['login'] = $user_connecte["Login"];
			$_SESSION['mdp'] = $user_connecte["mdp"]; 
			$_SESSION['Prenom'] = $user_connecte["Nom"]; 
			$_SESSION['Nom'] = $user_connecte["Prénom"]; 
			$_SESSION['role'] = $user_connecte["Rôle"];
			echo "Bonjour ",$_SESSION['Prenom']," ",$_SESSION['Nom']," ",$_SESSION['role']," ",$_SESSION['login']," ",$_SESSION['mdp'];
			header("Location: Accueil.php");
		}
		else{
			header("Location: Connexion.php?erreur=mauvaislog");
			
		}
					
					
		mysqli_close($connexion);			
	}
	else{
		header("Location: Connexion.php?erreur=pasloginoumdp");
	}
?>






