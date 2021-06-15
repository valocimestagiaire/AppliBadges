<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Nouvelle Identité</title>
	</head>
	<body>
	
		<?php
			include 'fonctions.php';
			sessionExiste();
			include 'menu.php';
		?>
		
		<div class="conteneur">
			<h1>Création d'une nouvelle identité</h1>
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<legend>Nouvelle identité</legend>
								
					<form method="POST" action="traitementIdentite.php">
						<div class="form-group red-text">
							<?php
								erreurCreationIdentite();
							?>
						</div>
						</br>
					
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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>