<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<title>Identités</title>
	</head>
	<body>
		<div class="container h-auto">
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<legend>Création d'une identité</legend>
				

				
					<form method="POST" action="traitementIdentite.php">
						<div class="form-group red-text">
							<?php
								if(!empty($_GET['erreur'])){
									if($_GET['erreur'] == "champs"){
										echo "Un ou plusieurs champs sont manquants";
									}
									elseif($_GET['erreur'] == "idExiste"){
										echo "Cette personne existe déja";
									}
								}
							?>
						</div>
					
						<div class="form-group">
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Nom</span>
									</div>
									<input class="form-control" type="text" id="nom" name="nom">
							</div>
						</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Prénom</span>
									</div>
									<input class="form-control" type="text" id="prenom" name="prenom">
							</div>
						</div>
						</br></br>
						<legend> Badges</legend>
						<div class="form-group">
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Télécommande</span>
									</div>
									<input class="form-control" type="text" id="tele" name="tele">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Porte vitrée</span>
									</div>
									<input class="form-control" type="text" id="badgeN" name="badgeN">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Portes palières</span>
									</div>
									<input class="form-control" type="text" id="badgeB" name="badgeB">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Café</span>
									</div>
									<input class="form-control" type="text" id="badgeC" name="badgeC">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Verisure</span>
									</div>
									<input class="form-control" type="text" id="verisure" name="verisure">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Parking</span>
									</div>
									<input class="form-control" type="text" id="parking" name="parking">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Bureau FZ</span>
								</div>
								<select class="form-select" name="FZ" aria-label="Default select example">
									<option selected value="Non">Non</option>
									<option value="Oui">Oui</option>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Clé Pass</span>
								</div>
								<select class="form-select" name="pass" aria-label="Default select example">
									<option selected value="Non">Non</option>
									<option value="Oui">Oui</option>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Clé Accès Bureau</span>
								</div>
								<select class="form-select" name="bureau" aria-label="Default select example">
									<option selected value="Non">Non</option>
									<option value="Oui">Oui</option>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Période d'accès</span>
								</div>
								<select class="form-select" name="periode" aria-label="Default select example">
									<option selected value="Lundi au Vendredi">Du Lundi au Vendredi</option>
									<option value="Lundi au Dimanche">Du Lundi au Dimanche</option>
								</select>
							</div>
							</br>
						</div>
						
						
						<div class="form-group">
							</br>
							</br>
							<div class="button ">
								<input type="submit" class="btn btn-primary justify-content-cente" name="valider" value="Valider"/>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</body>
</html>