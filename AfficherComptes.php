<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		
		<title>VALOCIME/ Application Badges - Affichage des comptes</title>
	</head>
	<body>
		<?php
			session_start();
			$servername = 'localhost';
			$username = 'root';
			$password = 'root';
			$database = 'application badges';
		?>
		
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active acueil" aria-current="page" href="Accueil.php">Accueil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="CreationIdentite.php">Nouvelle identité</a>
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
				<a class="nav-link" href="Connexion.php" onclick="deconnexion()">Déconnexion</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="Connexion.php"><?php echo "Rôle: ".$_SESSION['role']?></a>
			</li>
		</ul>
		<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
			<tr class="blue-row">
				<th>Nom</th>
				<th>Prénom</th>
				<th>Login</th>
				<th>Mot de passe</th>
				<th>Rôle</th>
				<th>Actions</th>
			</tr>
			<?php
				$connexion = new mysqli($servername,$username,$password,$database);
				if($connexion->connect_error){
					die('Erreur : ' .$connexion->connect_error);
				}
				
				$query = mysqli_query($connexion,"SELECT Nom,Prénom,Login,mdp,Rôle FROM utilisateurs");
				foreach($query as $id){
					echo"<tr><td>".$id['Nom']."</td><td>".$id['Prénom']."</td><td class='log'>".$id['Login']."</td><td>".$id['mdp']."</td><td>".$id['Rôle']."</td><td><button type='button' class='btn btn-warning'>Modifier</button> <button type='button' class='btn btn-danger'>Supprimer</button></td></tr>";
				}
				
			?>
		</table>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script>
			function deconnexion(){
				session_destroy();
				location.replace("Connexion.php");
				
			}
		</script>
		<script>
			$(".btn-warning").click(function() {
				var $row = $(this).closest("tr");
				var $text = $row.find(".log").text();
				
				location.replace("traitementModComptes.php?log="+$text+"&type=mod");
			});
		</script>
		<script>
			$(".btn-danger").click(function() {
				var $row = $(this).closest("tr");
				var $text = $row.find(".log").text();
				
				location.replace("traitementModComptes.php?log="+$text+"&type=supp");
			});
		</script>

	
		
	
		
	</body>
</html>