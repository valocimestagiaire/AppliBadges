<!DOCTYPE html>
<html>
	<head>
		<?php
			include 'head.php';
			include 'fonctions.php';
			titleAffichageBadges();
		?>
	</head>
	<body>
		<?php
			
			sessionExiste();
			include 'menu.php';
			include 'bd.php';
			
			h1AffichageBadge();
		?>
		
		
		<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Type de badge</th>
				<th>Id du Badge</th>";				
			</tr>
			<?php
				$connexion = connexion();
				$status = $_GET['type'];
				
				$query = mysqli_query($connexion,"SELECT Id_Identité,Nom,Prénom FROM identités ORDER BY Nom");
				foreach($query as $id){
					$queryBadgeTele = mysqli_query($connexion,"SELECT * FROM télécommande WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeTele as $tele){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Télécommande</td><td>".$tele['Id_Télécommande']."</td></tr>";
					}
					$queryBadgeNoir = mysqli_query($connexion,"SELECT * FROM badge_noir WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeNoir as $badgeN){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Badge Noir</td><td>".$badgeN['Id_Badge_Noir']."</td></tr>";
					}
					$queryBadgeBleu = mysqli_query($connexion,"SELECT * FROM badge_bleu WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeBleu as $badgeB){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Badge Bleu</td><td>".$badgeB['Id_Badge_Bleu']."</td></tr>";
					}
					$queryBadgeCafe = mysqli_query($connexion,"SELECT * FROM café WHERE Id_Identité=".$id['Id_Identité']." AND Status='$status'");
					foreach($queryBadgeCafe as $cafe){
						echo"<tr><td class='nom'>".$id['Nom']."</td><td class='prenom'>".$id['Prénom']."</td><td>Café</td><td>".$cafe['Id_Café']."</td></tr>";
					}
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