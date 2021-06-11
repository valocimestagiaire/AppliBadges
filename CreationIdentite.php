<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<title>VALOCIME/ Application Badges - Nouvelle Identité</title>
	</head>
	<body>
	
		<?php
			session_start();
			
			if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
				header("Location: Connexion.php");
			}
		?>
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
									<span class="input-group-text" id="basic-addon1">Alarme Verisure</span>
								</div>
								<select class="form-select" name="verisure" aria-label="Default select example">
									<option selected value="OUI">Oui</option>
									<option value="NON">Non</option>
									
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Parking</span>
								</div>
								<select class="form-select" name="parking" aria-label="Default select example">
									<option selected value="OUI">Oui</option>
									<option value="NON">Non</option>									
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Bureau FZ</span>
								</div>
								<select class="form-select" name="FZ" aria-label="Default select example">
									<option selected value="NON">Non</option>
									<option value="OUI">Oui</option>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Clé Pass</span>
								</div>
								<select class="form-select" name="pass" aria-label="Default select example">
									<option selected value="NON">Non</option>
									<option value="OUI">Oui</option>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Clé Accès Bureau</span>
								</div>
								<select class="form-select" name="bureau" aria-label="Default select example">
									<option selected value="NON">Non</option>
									<option value="OUI">Oui</option>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Période d'accès</span>
								</div>
								<select class="form-select" name="periode" aria-label="Default select example">
									<option selected value="Du Lundi au Vendredi">Du Lundi au Vendredi</option>
									<option value="Du Lundi au Dimanche">Du Lundi au Dimanche</option>
								</select>
							</div>
							</br>
							</br>
							<div class="button ">
								<input type="submit" class="btn btn-primary justify-content-cente" name="valider" value="Retour"/>
								<input type="submit" class="btn btn-primary justify-content-cente" name="valider" value="Valider"/>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</body>
</html>