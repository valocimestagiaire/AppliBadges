<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<title>VALOCIME/ Application Badges - Page de connexion</title>
	</head>
	<body>
		<div class="container h-auto">
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<legend>Connexion</legend>
				

				
					<form method="POST" action="traitementConnexion.php">
						<div class="form-group">
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Login</span>
									</div>
									<input class="form-control" type="text" id="login" name="user_login">
							</div>
						</div>
						</br>
						<div class="form-group">
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Mot de passe</span>
									</div>
									<input class="form-control" type="password" id="psswd" name="user_password">
							</div>
						</div>
						<div class="form-group red-text">
							<?php
								if(!empty($_GET['erreur'])){
									if($_GET['erreur']== "mauvaislog"){
										echo "Login ou mot de passe incorrect";
									}
									else{
										echo "Login ou mot de passe manquant";
									}
								}
							?>
						</div>
						<div class="form-group">
							</br>
							</br>
							<div class="button ">
								<input type="submit" class="btn btn-primary justify-content-cente" name="connexion" value="Connexion"/>
							</div>
						</div>
					</form>
				</fieldset>
			</div>
		</div>
	</body>
</html>