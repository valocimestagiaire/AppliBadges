<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Badges Principaux</title>
	</head>
	<body>
		<?php
			include 'fonctions.php';
			sessionExiste();
			include 'menu.php';
			include 'bd.php';
			
			$idChoisi = $_GET['id'];
			$nom = $_GET['nom'];
			$prenom = $_GET['prenom'];
			
			$connexion = connexion();		
			$queryRecupIdentite =  mysqli_query($connexion,"SELECT * FROM identites WHERE Id_Identité='$idChoisi'");
			$user_choisi = mysqli_fetch_array($queryRecupIdentite);
			
		?>
		
		<div class="container">
			<div class="row justify-content-center">
				<div class="col">
					<h1 class="text-white text-center"><?php echo $nom." ".$prenom; ?></h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Pass</th>
							<th>Accès Bureau</th>
							<th>Bureau FZ</th>
							<th>Période d'accès</th>
						</tr>
						<tr>
							<?php echo"<td>".$user_choisi['Nom']."</td><td>".$user_choisi['Prénom']."</td><td>".$user_choisi['Pass']."</td><td>".$user_choisi['Accès_Bureau']."</td><td>".$user_choisi['Bureau_FZ']."</td><td>".$user_choisi['Période']."</td>" ?>
						</tr>
					</table>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Télécommande</th>
							<th>Statut</th>
						</tr>
						<?php

							$queryTele = mysqli_query($connexion,"SELECT Id_Télécommande,Statut FROM telecommande WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Télécommande']."</td><td>".$id['Statut']."</td></tr>";
							}
							
						?>
					</table>
				</div>
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Badge Noir</th>
							<th>Statut</th>
						</tr>
						<?php
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Badge_Noir,Statut FROM badge_noir WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Badge_Noir']."</td><td>".$id['Statut']."</td></tr>";
							}
						?>
					</table>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Badge Bleu</th>
							<th>Statut</th>
						</tr>
						<?php
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Badge_Bleu,Statut FROM badge_bleu WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Badge_Bleu']."</td><td>".$id['Statut']."</td></tr>";
							}
						?>
					</table>
				</div>
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Badge Café</th>
							<th>Statut</th>
						</tr>
						<?php
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Café,Statut FROM cafe WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Café']."</td><td>".$id['Statut']."</td></tr>";
							}
							
							
						?>
					</table>
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Badge Parking</th>
							<th>Statut</th>
						</tr>
						<?php
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Parking,Statut FROM parking WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Parking']."</td><td>".$id['Statut']."</td></tr>";
							}
						?>
					</table>
				</div>
				<div class="col">
					<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
						<tr>
							<th>Alarme</th>
							<th>Statut</th>
						</tr>
						<?php
							
							$queryTele = mysqli_query($connexion,"SELECT Id_Alarme,Statut FROM alarme WHERE Id_Identité=".$idChoisi);
							foreach($queryTele as $id){
								echo"<tr><td>".$id['Id_Alarme']."</td><td>".$id['Statut']."</td></tr>";
							}
							
							mysqli_close($connexion);
						?>
					</table>
				</div>
			</div>
			
			</br>
			<div class="row justify-content-center">
				<div class="col">
					<form method="POST" action="traitementModBadges.php">
						<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $idChoisi; ?>>
						<input class="form-control" type="hidden" id="nomB" name="nomB" value=<?php echo $nom?>>
						<input class="form-control" type="hidden" id="prenomB" name="prenomB" value=<?php echo $prenom?>>
						<div class="button ">
							<?php if($_SESSION['role'] == "Administrateur"){ ?>
								<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Tout Supprimer"/>
							<?php } ?>
							<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Supprimer un ou plusieurs Badges"/>
							<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Modifier"/>
							<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Ajouter un badge"/>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>