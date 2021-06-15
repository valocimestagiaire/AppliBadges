<!DOCTYPE html>
<html>
	<head>
		<?php include 'head.php'; ?>
		<title>VALOCIME/ Application Badges - Accueil</title>
	</head>
	<body>
		<?php
			include 'fonctions.php';
			sessionExiste();
			erreurAccueil();
			include 'menu.php';
			include 'bd.php';
		?>
		
		
		
		<h1>Toutes les identités</h1>
		<h6>Cliquez sur une ligne pour voir le détail des badges que l'identité possède</h6>
		
		<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
			<tr>
				<th class='colonneCachee'>id</th>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Alarme Verisure</th>
				<th>Parking</th>
				<th>Pass</th>
				<th>Accès Bureau</th>
				<th>Bureau FZ</th>
				<th>Période d'accès</th>
			</tr>
			<?php
				$connexion = connexion();
				
				$query = mysqli_query($connexion,"SELECT Id_Identité,Nom,Prénom,Alarme,Parking,Pass,Accès_Bureau,Période,Bureau_FZ FROM identités ORDER BY Nom");
				$idChoisi = "";
				foreach($query as $id){
					echo"<tr class='rowTable' ><td class='colonneCachee'>".$id['Id_Identité']."</td><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>".$id['Alarme']."</td><td>".$id['Parking']."</td><td>".$id['Pass']."</td><td>".$id['Accès_Bureau']."</td><td>".$id['Bureau_FZ']."</td><td>".$id['Période']."</td></tr>";
				}
				
				mysqli_close($connexion);
				
			?>
		</table>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>