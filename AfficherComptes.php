<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Affichage des comptes</title>
	</head>
	<body>
		<?php
		
			include 'fonctions.php';
			sessionExiste();
			erreurModificationCompte();
			include 'bd.php';
			include 'menu.php';
		
		?>
		
		<h1>Les comptes pouvant accéder à l'outil</h1>
		<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Login</th>
				<th>Mot de passe</th>
				<th>Rôle</th>
				<th>Actions</th>
			</tr>
			<?php
				$connexion = connexion();
				
				$query = mysqli_query($connexion,"SELECT Nom,Prénom,Login,mdp,Rôle FROM utilisateurs ORDER BY Nom");
				foreach($query as $id){
					echo"<tr><td>".$id['Nom']."</td><td>".$id['Prénom']."</td><td class='log'>".$id['Login']."</td><td type='password'>".$id['mdp']."</td><td class='role'>".$id['Rôle']."</td><td><button type='button' class='btn btn-warning'>Modifier</button> <button type='button' class='btn btn-danger'>Supprimer</button></td></tr>";
				}
				
			?>
		</table>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>