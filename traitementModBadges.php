<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<title>VALOCIME/ Application Badges - Modification d'une Identité et ses badges</title>
	</head>
	
	
		<?php
			session_start();
			
			if(!isset($_SESSION['login']) OR empty($_SESSION['login'])){
				header("Location: Connexion.php");
			}
			
			$servername = 'localhost';
			$username = 'root';
			$password = 'root';
			$database = 'application badges';
			

			
			$connexion = new mysqli($servername,$username,$password,$database);
			if($connexion->connect_error){
				die('Erreur : ' .$connexion->connect_error);
			}
			
			$id = $_POST['id'];
			

			if($_POST['valider']=="Tout Supprimer"){
				$querySuppTele = mysqli_query($connexion,"DELETE FROM télécommande WHERE Id_Identité='$id'");
				$querySuppNoir = mysqli_query($connexion,"DELETE FROM badge_noir WHERE Id_Identité='$id'");
				$querySuppBleu = mysqli_query($connexion,"DELETE FROM badge_bleu WHERE Id_Identité='$id'");
				$querySuppCafe = mysqli_query($connexion,"DELETE FROM café WHERE Id_Identité='$id'");
				$querySuppressionId = mysqli_query($connexion,"DELETE FROM identités WHERE Id_Identité='$id'");
				header("Location: Accueil.php");
				exit(0);
			}
			elseif($_POST['valider'] == "Supprimer un ou plusieurs Badges"){?>
				<body>
					<h1>Suppression(s) de badge(s)</h1>
					<div class="container h-auto">
					<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
							<fieldset>
								<legend>Supprimer un ou plusieurs badge(s)</legend>
								</br>
								</br>
								<form method="POST" action="traitementSuppBadge.php">
									<div class="form-group">
									<?php

										
										$queryBadges = mysqli_query($connexion,"SELECT * FROM télécommande WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Télécommande'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='Télécommande[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='Télécommande'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Télécommande</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Status']."</span>
														</div>

													</div>
												</div>
												</br>";
										}
										
										$queryBadges = mysqli_query($connexion,"SELECT * FROM badge_noir WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Badge_Noir'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend' col-md>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='badge_noir[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='badge_noir'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Badge Noir</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Status']."</span>
														</div>

													</div>
												</div>
												</br>";
										}

										$queryBadges = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Badge_Bleu'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='badge_bleu[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='badge_bleu'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Badge Bleu</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Status']."</span>
														</div>

													</div>
												</div>
												</br>";
										}

										$queryBadges = mysqli_query($connexion,"SELECT * FROM café WHERE Id_Identité='$id'");
										foreach($queryBadges as $badges){
											$id_B = $badges['Id_Café'];
											echo "
												<div class='row'>
													<div class='input-group input-groupe-sm'>
														<div class='input-group-prepend col-md'>
															<div class='input-group-text'>
																<input class='checkbox' type='checkbox' name='cafe[]' value='$id_B' aria-label='Checkbox for following text input'>
																<label for='cafe'>$id_B</label>
															</div>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>Café</span>
														</div>
														<div class='input-group-append col-md'>
															<span class='input-group-text'>".$badges['Status']."</span>
														</div>

													</div>
												</div>
												</br>";
										}
									?>
										</br>
										<div class="row">
											<div class="button">
												<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id?>>
												<input type="submit" class="btn btn-primary justify-content-cente" name="valider" value="Retour"/>
												<input type="submit" class="btn btn-primary justify-content-cente" name="valider" value="Valider"/>
											</div>
										</div>
									</div>
								</form>
							</fieldset>
						</div>
					</div>
				</body>
			
			<?php
			}
			elseif($_POST['valider']=="Ajouter un badge"){?>
			<body>
				<h1>Création d'un nouveau badge</h1>
				<div class="container h-auto">
					<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
							<fieldset>
								<legend>Ajouter un badge</legend>
								</br>
								</br>
								<form method="POST" action="traitementAjoutBadge.php">
									<div class="form-group">
										<div class="row">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Id du badge</span>
												</div>
												<input class="form-control" type="text" id="Id_badge" name="Id_badge">
											</div>
										</div>
										</br>
										<div class="row">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Type de badge</span>
												</div>
												<select class="form-select" name="typeBadge" aria-label="Default select example">
													<option selected value="télécommande">Télécommande</option>
													<option value="badge_noir">Badge Noir</option>
													<option value="badge_bleu">Badge Bleu</option>
													<option value="café">Café</option>
												</select>
											</div>
										</div>
										</br>
										<div class="row">
											<div class="input-group input-groupe-sm">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Status du badge</span>
												</div>
												<select class="form-select" name="status_badge" aria-label="Default select example">
													<option selected value="ACTIF">ACTIF</option>
													<option value="PERDU">PERDU</option>
													<option value="PRET">PRET</option>
												</select>
											</div>
										</div>
										</br>
										</br>
										<div class="row">
											<div class="button">
												<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id?>>
												<input class="form-control" type="hidden" id="nomB" name="nomB" value=<?php echo $_POST['nomB']?>>
												<input class="form-control" type="hidden" id="prenomB" name="prenomB" value=<?php echo $_POST['prenomB']?>>
												<input type="submit" class="btn btn-primary justify-content-cente" name="valider" value="Retour"/>
												<input type="submit" class="btn btn-primary justify-content-cente" name="valider" value="Valider"/>
											</div>
										</div>
									</div>
								</form>
							</fieldset>
						</div>
					</div>
				</body>
			<?php
			}else{

			
				$queryRecupIdentite =  mysqli_query($connexion,"SELECT * FROM identités WHERE Id_Identité='$id'");
				$user_choisi = mysqli_fetch_array($queryRecupIdentite);
			

		?>
	
	<body class="bodyModBadge">
		<div class="containerBadge">
			<div class="d-flex justify-content-center align-middle form_container border rounded blue-container cadre">
				<fieldset>
					<legend>L'identité</legend>
								
					<form method="POST" action="traitementModificationBadgeId.php">
						<div class="form-group red-text">
							<?php
								if(!empty($_GET['erreur'])){
										echo "Un ou plusieurs champs sont manquants";
								}
							?>
						</div>
					
						<div class="form-group">
							<input class="form-control" type="hidden" id="id" name="id" value=<?php echo $id?>>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Nom</span>
									</div>
									<input class="form-control" type="text" id="nom" name="nom" value=<?php echo $user_choisi['Nom'] ?>>
							</div>
						</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Prénom</span>
									</div>
									<input class="form-control" type="text" id="prenom" name="prenom" value=<?php echo $user_choisi['Prénom'] ?>>
							</div>
						</div>
						</br></br>
						<legend>Télécommande</legend>
						<div class="form-group">
							<?php 
								$queryRecupStatusTele = mysqli_query($connexion,'SELECT * FROM télécommande WHERE Id_Identité='.$id);
								foreach($queryRecupStatusTele as $badge){
								
								echo "
								<div class='input-group input-groupe-sm'>
									<input class='form-control' type='text' id='id_tele' name='id_tele[]' value=".$badge['Id_Télécommande']." readonly='readonly'/>
							
									<div class='input-group-prepend'>
										<span class='input-group-text' id='basic-addon1'>Status</span>
									</div>
									<select class='form-select' name='tele[]' aria-label='Default select example'>";
									if($badge['Status'] == 'ACTIF'){
										echo"
										<option selected value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}elseif($badge['Status'] == 'PERDU'){
										echo"
										<option value='ACTIF'>ACTIF</option>
										<option selected value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}else{
										echo "
										<option value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option selected value='PRET'>PRET</option>";
									}
									echo"
										</select>
									
								</div>
								</br>";
								}
								
							?>
							
							
						</div>
						</br>
						<legend>Badge Noir</legend>
						<div class="form-group">
						
							<?php 
								$queryRecupStatusNoir = mysqli_query($connexion,'SELECT * FROM badge_noir WHERE Id_Identité='.$id);

								foreach($queryRecupStatusNoir as $badge){	
								echo "
								<div class='input-group input-groupe-sm'>
									<input class='form-control' type='text' id='id_badgeN' name='id_badgeN[]' value=".$badge['Id_Badge_Noir']." readonly='readonly'/>
							
									<div class='input-group-prepend'>
										<span class='input-group-text' id='basic-addon1'>Status</span>
									</div>
									<select class='form-select' name='badgeN[]' aria-label='Default select example'>";
									if($badge['Status'] == 'ACTIF'){
										echo"
										<option selected value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}elseif($badge['Status'] == 'PERDU'){
										echo"
										<option value='ACTIF'>ACTIF</option>
										<option selected value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}else{
										echo "
										<option value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option selected value='PRET'>PRET</option>";
									}
									echo"
										</select>
									
								</div>
								</br>";
								}
							?>
						</div>
						</br>
						<div class="form-group">
							<legend>Badge Bleu</legend>
							
							<?php 
								$queryRecupStatusBleu = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité=".$id);

								foreach($queryRecupStatusBleu as $badge){	
								echo "
								<div class='input-group input-groupe-sm'>
									<input class='form-control' type='text' id='id_badgeB' name='id_badgeB[]' value=".$badge['Id_Badge_Bleu']." readonly='readonly'/>
							
									<div class='input-group-prepend'>
										<span class='input-group-text' id='basic-addon1'>Status</span>
									</div>
									<select class='form-select' name='badgeB[]' aria-label='Default select example'>";
									if($badge['Status'] == 'ACTIF'){
										echo"
										<option selected value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}elseif($badge['Status'] == 'PERDU'){
										echo"
										<option value='ACTIF'>ACTIF</option>
										<option selected value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}else{
										echo "
										<option value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option selected value='PRET'>PRET</option>";
									}
									echo"
										</select>
									
								</div>
								</br>";
								}
							?>
						</div>
						</br>
						<div class="form-group">
							<legend>Badge Café</legend>
							
							<?php 
								$queryRecupStatusCafe = mysqli_query($connexion,"SELECT * FROM café WHERE Id_Identité=".$id);

								foreach($queryRecupStatusCafe as $badge){	
								echo "
								<div class='input-group input-groupe-sm'>
									<input class='form-control' type='text' id='id_cafe' name='id_cafe[]' value=".$badge['Id_Café']." readonly='readonly'/>
									<div class='input-group-prepend'>
										<span class='input-group-text' id='basic-addon1'>Status</span>
									</div>
									<select class='form-select' name='cafe[]' aria-label='Default select example'>";
									if($badge['Status'] == 'ACTIF'){
										echo"
										<option selected value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}elseif($badge['Status'] == 'PERDU'){
										echo"
										<option value='ACTIF'>ACTIF</option>
										<option selected value='PERDU'>PERDU</option>
										<option value='PRET'>PRET</option>";
									}else{
										echo "
										<option value='ACTIF'>ACTIF</option>
										<option value='PERDU'>PERDU</option>
										<option selected value='PRET'>PRET</option>";
									}
									echo"
										</select>
									
								</div>
								</br>";
								}
							?>
							
						</br></br>
						<legend>Autres Badges</legend>
						<div class="form-group">
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Alarme Verisure</span>
								</div>
								<select class="form-select" name="verisure" aria-label="Default select example">
									<?php if($user_choisi['Alarme'] == "OUI"){ ?>
										<option selected value="OUI">Oui</option>
										<option value="NON">Non</option>
									<?php }else{ ?>
										<option value="OUI">Oui</option>
										<option selected value="NON">Non</option>
									<?php } ?>
									
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
									<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Parking</span>
								</div>
								<select class="form-select" name="parking" aria-label="Default select example">
									<?php if($user_choisi['Parking'] == "OUI"){ ?>
										<option selected value="OUI">Oui</option>
										<option value="NON">Non</option>
									<?php }else{ ?>
										<option value="OUI">Oui</option>
										<option selected value="NON">Non</option>
									<?php } ?>									
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Bureau FZ</span>
								</div>
								<select class="form-select" name="FZ" aria-label="Default select example">
									<?php if($user_choisi['Bureau_FZ'] == "OUI"){ ?>
										<option selected value="OUI">Oui</option>
										<option value="NON">Non</option>
									<?php }else{ ?>
										<option value="OUI">Oui</option>
										<option selected value="NON">Non</option>
									<?php } ?>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Clé Pass</span>
								</div>
								<select class="form-select" name="pass" aria-label="Default select example">
									<?php if($user_choisi['Pass'] == "OUI"){ ?>
										<option selected value="OUI">Oui</option>
										<option value="NON">Non</option>
									<?php }else{ ?>
										<option value="OUI">Oui</option>
										<option selected value="NON">Non</option>
									<?php } ?>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Clé Accès Bureau</span>
								</div>
								<select class="form-select" name="bureau" aria-label="Default select example">
									<?php if($user_choisi['Accès_Bureau'] == "OUI"){ ?>
										<option selected value="OUI">Oui</option>
										<option value="NON">Non</option>
									<?php }else{ ?>
										<option value="OUI">Oui</option>
										<option selected value="NON">Non</option>
									<?php } ?>
								</select>
							</div>
							</br>
							<div class="input-group input-groupe-sm">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1">Période d'accès</span>
								</div>
								<select class="form-select" name="periode" aria-label="Default select example">
									<?php if($user_choisi['Période'] == "Du Lundi au Vendredi"){ ?>
										<option selected value="Du Lundi au Vendredi">Du Lundi au Vendredi</option>
										<option value="Du Lundi au Dimanche">Du Lundi au Dimanche</option>
									<?php }else{ ?>
										<option value="Du Lundi au Vendredi">Du Lundi au Vendredi</option>
										<option selected value="Du Lundi au Dimanche">Du Lundi au Dimanche</option>
									<?php } ?>
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
			<?php } ?>
	</body>
</html>