<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		
		<title>VALOCIME/ Application Badges - Badges Principaux</title>
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
		
		<div class="container">
			<div class="row">
				<div class="col">
					
					
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Télécommande</th>
							<th>Status</th>
						</tr>
						<?php
							$connexion = new mysqli($servername,$username,$password,$database);
							if($connexion->connect_error){
								die('Erreur : ' .$connexion->connect_error);
							}
							
							$idChoisi = $_GET['id'];
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Télécommande,Status FROM télécommande WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Télécommande']."</td><td>".$id['Status']."</td></tr>";
							}
							
						?>
					</table>
					
					
					
					
				</div>
				<div class="col">
				
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Badge Noir</th>
							<th>Status</th>
						</tr>
						<?php
							$connexion = new mysqli($servername,$username,$password,$database);
							if($connexion->connect_error){
								die('Erreur : ' .$connexion->connect_error);
							}
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Badge_Noir,Status FROM badge_noir WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Badge_Noir']."</td><td>".$id['Status']."</td></tr>";
							}
							
						?>
					</table>
				
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Badge Bleu</th>
							<th>Status</th>
						</tr>
						<?php
							$connexion = new mysqli($servername,$username,$password,$database);
							if($connexion->connect_error){
								die('Erreur : ' .$connexion->connect_error);
							}
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Badge_Bleu,Status FROM badge_bleu WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Badge_Bleu']."</td><td>".$id['Status']."</td></tr>";
							}
							
						?>
					</table>
				</div>
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Badge Café</th>
							<th>Status</th>
						</tr>
						<?php
							$connexion = new mysqli($servername,$username,$password,$database);
							if($connexion->connect_error){
								die('Erreur : ' .$connexion->connect_error);
							}
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Café,Status FROM café WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Café']."</td><td>".$id['Status']."</td></tr>";
							}
							
						?>
					</table>
				</div>
			</div>
			
			
		
		
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