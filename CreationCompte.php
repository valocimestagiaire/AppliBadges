<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Création d'un compte utilisateur</title>
	</head>
	<body>
		<?php 
			include 'fonctions.php';
			sessionExiste();
			include 'menu.php';
			if($_SESSION['role'] == "Administrateur"){
		?>
		<h1>Création d'un compte</h1>
		<div class="conteneur">
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<legend>Nouveau compte</legend>
					<form method="POST" action="traitementCreationCompte.php">
						<div class="form-group red-text">
							<?php
								erreurCreationCompte();
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
									<input class="form-control" type="password" id="mdp" name="mdp">
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Rôle</span>
								</div>
								<select class="form-select" name="role" aria-label="Default select example">
									<option value="Administrateur">Administrateur</option>
									<option selected value="Utilisateur">Utilisateur</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							</br>
							</br>
							<div class="button ">
								<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Retour"/>
								<input type="submit" class="btn btn-primary justify-content-center" name="valider" value="Valider"/>
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
			<?php 
			}else{
				header("Location: Accueil.php");
			}	
			?>