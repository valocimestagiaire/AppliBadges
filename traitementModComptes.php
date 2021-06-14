<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<title>VALOCIME/ Application Badges - Modification d'un compte utilisateur</title>
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
			$login = $_GET['log'];
			$role = $_GET['role'];
			
			if($_GET['type'] == "mod"){
				$connexion = new mysqli($servername,$username,$password,$database);
				if($connexion->connect_error){
						die('Erreur : ' .$connexion->connect_error);
				}
				
				$queryModif = mysqli_query($connexion,"SELECT * FROM utilisateurs WHERE Login='$login'");
				$user_modification = mysqli_fetch_array($queryModif);?>				
				
				<h1>Modification du compte</h1>
				<div class="container h-auto">
					<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
						<fieldset>
							<legend>Nouvelles informations</legend>
						

						
							<form method="POST" action="traitementModificationUser.php">
								<div class="form-group red-text">
									<?php
										if(!empty($_GET['erreur'])){
											if($_GET['erreur'] == "champs"){
												echo "Un ou plusieurs champs sont manquants";
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
											<input class="form-control" type="text" id="nom" name="nom" value=<?php echo $user_modification['Nom'];?>>
									</div>
									</br>
									<div class="input-group input-groupe-sm">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Prénom</span>
											</div>
											<input class="form-control" type="text" id="prenom" name="prenom" value=<?php echo $user_modification['Prénom'];?>>
									</div>
									</br>
									<div class="input-group input-groupe-sm">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Login</span>
											</div>
											<input class="form-control" type="text" id="login" name="login" value=<?php echo $user_modification['Login'];?>>
									</div>
									</br>
									<div class="input-group input-groupe-sm">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">Mot de passe</span>
											</div>
											<input class="form-control" type="password" id="mdp" name="mdp" value=<?php echo $user_modification['mdp'];?>>
									</div>
									</br>
									<div class="input-group input-groupe-sm">
										<div class="input-group-prepend">
											<span class="input-group-text" id="basic-addon1">Rôle</span>
										</div>
										<select class="form-select" name="role" aria-label="Default select example">
											<?php if($role == "Administrateur"){ ?>
												<option selected value="Administrateur">Administrateur</option>
												<option value="Utilisateur">Utilisateur</option>
											<?php }else{ ?>
												<option value="Administrateur">Administrateur</option>
												<option selected value="Utilisateur">Utilisateur</option>
											<?php } ?>
										</select>
									</div>
									<div class="input-group input-groupe-sm">
											<input class="form-control invisible" type="text" id="ancienLog" name="ancienLog" value=<?php echo $login;?>>
									</div>
								</div>
								<div class="form-group">
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
				
				
		<?php
			}elseif($_GET['type'] == "supp"){
				$connexion = new mysqli($servername,$username,$password,$database);
				if($connexion->connect_error){
						die('Erreur : ' .$connexion->connect_error);
				}
				
				$querySupp = mysqli_query($connexion,"DELETE FROM utilisateurs WHERE Login='$login'");
				header("Location: AfficherComptes.php");
				exit(0);
			}
		?>
	</body>
</html>