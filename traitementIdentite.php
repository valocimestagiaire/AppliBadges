
<?php
	
	$servername = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'application badges';
	
	if($_POST["valider"] == "Retour"){
		header("Location: Accueil.php");
		exit(0);
	}
	
	if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['tele']) && !empty($_POST['badgeB']) && !empty($_POST['badgeB']) && !empty($_POST['badgeC'])&& !empty($_POST['verisure']) && !empty($_POST['parking'])){
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$tele = $_POST['tele'];
		$badgeN = $_POST['badgeN'];
		$badgeB = $_POST['badgeB'];
		$badgeC = $_POST['badgeC'];
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
		
		$queryIdExiste =  mysqli_query($connexion,"SELECT * FROM identité WHERE Nom='$nom' and Prénom='$prenom'");
		
		if(mysqli_num_rows($queryIdExiste) > 0){
			header("Location: CreationIdentite.php?erreur=idExiste");
			mysqli_close($connexion);
			exit(0);
		}
		
		$queryBadgeExiste = mysqli_query($connexion,"SELECT * FROM badge WHERE  ");
		
		$queryBadge = mysqli_query($connexion,"INSERT INTO badge (Télécommande,Badge_Noir,Badge_Bleu,Café,Alarme,Parking,Pass,Accès_Bureau,Période_accès,Bureau_FZ)
															values('$tele','$badgeN','$badgeB','$badgeC','$verisure','$parking','$pass','$bureau','$periode','$fz')");
		
		
	
		mysqli_close($connexion);			
	
	
	}
	else{
		header("Location: CreationIdentite.php?erreur=champs");
	}
?>






