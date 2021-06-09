<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		
		<title>Accueil</title>
	</head>
	<body>
		<?php
			session_start();
			echo "Connecté en tant que: ".$_SESSION["role"];
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
				<a class="nav-link" data-bs-toggle="modal" href="CreationIdentite.php">Nouvelle identité</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			</li>
		</ul>
		<table class="table table-striped table-dark table-hover">
			<tr class="blue-row">
				<th>Nom</th>
				<th>Prénom</th>
			</tr>
			<?php
				$connexion = new mysqli($servername,$username,$password,$database);
				if($connexion->connect_error){
					die('Erreur : ' .$connexion->connect_error);
				}
				
				$query = mysqli_query($connexion,"SELECT Nom,Prénom FROM identité");
				foreach($query as $id){
					echo"<tr onclick='redirectBadges()'><td>".$id['Nom']."</td><td>".$id['Prénom']."</td></tr>";
				}
				
			?>
		</table>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script>
			function redirectBadges(){
				location.replace("Badges.php")
				
			}
		</script>

	
		
	
		
	</body>
</html>