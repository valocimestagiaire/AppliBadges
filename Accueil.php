<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link href="css/PageConnexion.css"/ rel="stylesheet">
		<title>Page de connexion</title>
	</head>
	<body>
		<?php
			session_start();
			echo "Connecté en tant que: ".$_SESSION["role"];
			$servername = 'localhost';
			$username = 'root';
			$password = 'root';
			$database = 'application badges';
		?>
		<table class="table table-hover">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
			</tr>
			<?php
				$connexion = new mysqli($servername,$username,$password,$database);
				if($connexion->connect_error){
					die('Erreur : ' .$connexion->connect_error);
				}
				
				$query = mysqli_query($connexion,"SELECT Nom,Prénom FROM identité");
				foreach($query as $id){
					echo"<tr><td>".$id['Nom']."</td><td>".$id['Prénom']."</td></tr>";
				}
				
			?>
		</table>
	</body>
</html>