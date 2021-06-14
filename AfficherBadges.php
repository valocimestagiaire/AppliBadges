<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<?php
			if($_GET['type'] == "PERDU"){
				echo "<title>VALOCIME/ Application Badges - Affichage des badges perdus</title>";
			}else{
				echo "<title>VALOCIME/ Application Badges - Affichage des badges perdus</title>";
			}
		?>
	</head>
	<body>
		<?php
			
			session_start();
			
			if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
				header("Location: Connexion.php");
			}
			
			$servername = 'localhost';
			$username = 'root';
			$password = 'root';
			$database = 'application badges';
			

		?>
		
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" aria-current="page" href="Accueil.php">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="CreationIdentite.php">Nouvelle identité</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Badges</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="AfficherBadges.php?type=PERDU">Afficher les badges perdus</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="AfficherBadges.php?type=PRET">Afficher les badges prêtés</a>
					
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des comptes</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="AfficherComptes.php">Afficher les comptes</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="CreationCompte.php">Créer un compte</a>
					
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" onclick="deconnexion()">Déconnexion</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="Connexion.php"><?php echo "Rôle: ".$_SESSION['role']?></a>
			</li>
		</ul>
		
		<?php
			if($_GET['type'] == "PERDU"){
				echo "<h1>Les Badges Perdus</h1>";
			}else{
				echo "<h1>Les Badges Prêtés</h1>";
			}
		?>
		
		
		<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Type de badge</th>
				<th>Id du Badge</th>";				
			</tr>
			<?php
				$connexion = new mysqli($servername,$username,$password,$database);
				if($connexion->connect_error){
					die('Erreur : ' .$connexion->connect_error);
				}
				
				$status = $_GET['type'];
				
				$query = mysqli_query($connexion,"SELECT Id_Identité,Nom,Prénom FROM identités");
				foreach($query as $id){
					$queryBadgeTele = mysqli_query($connexion,"SELECT * FROM télécommande WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeTele as $tele){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Télécommande</td><td>".$tele['Id_Télécommande']."</td></tr>";
					}
					$queryBadgeNoir = mysqli_query($connexion,"SELECT * FROM badge_noir WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeNoir as $badgeN){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Badge Noir</td><td>".$badgeN['Id_Badge_Noir']."</td></tr>";
					}
					$queryBadgeBleu = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeBleu as $badgeB){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Badge Bleu</td><td>".$badgeB['Id_Badge_Bleu']."</td></tr>";
					}
					$queryBadgeCafe = mysqli_query($connexion,"SELECT * FROM café WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeCafe as $cafe){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Café</td><td>".$cafe['Id_Café']."</td></tr>";
					}
				}
				
			?>
		</table>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script>
			function deconnexion(){
				location.replace("Deconnexion.php");
				
			}
		</script>

	
		
	
		
	</body>
</html>