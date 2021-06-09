<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<title>VALOCIME/ Application Badges - Création d'un compte utilisateur</title>
	</head>
	<body>
		<div class="container h-auto">
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<legend>Création d'un compte</legend>
				

				
					<form method="POST" action="traitementCreationCompte.php">
						<div class="form-group red-text">
							<?php
								if(!empty($_GET['erreur'])){
									if($_GET['erreur'] == "champs"){
										echo "Un ou plusieurs champs sont manquants";
									}
									elseif($_GET['erreur'] == "logExist"){
										echo "Cet utilisateur possède déjà un compte";
									}
								}
							?>
						</div>		
						<div class="form-group">
							</br>
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
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Login</span>
									</div>
									<input class="form-control" type="text" id="login" name="login">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Mot de passe</span>
									</div>
									<input class="form-control" type="text" id="mdp" name="mdp">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Rôle</span>
								</div>
								<select class="form-select" name="role" aria-label="Default select example">
									<option selected value="admin">Administrateur</option>
									<option value="user">Utilisateur</option>
								</select>
							</div>
						</div>
						<div class="form-group">
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