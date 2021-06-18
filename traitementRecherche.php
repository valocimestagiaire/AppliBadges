<!DOCTYPE html>
<html>
	<head>
		<?php
			include 'head.php';
			include 'fonctions.php';
		?>
	</head>
	<body>
		<?php
			
			sessionExiste();
			include 'menu.php';
			include 'bd.php';
		?>
		
		<h1>Résultat de la recherche pour "<?php echo $_POST['srch-term'] ?>"</h1>
		<table class="table table-striped table-dark table-hover table-bordered d-flex justify-content-center">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Type de badge</th>
				<th>Id du Badge</th>
				<th>Statut</th>
								
			</tr>
			<?php
				$connexion = connexion();
				$id = $_POST['srch-term'];
				
				$queryIdTele = mysqli_query($connexion,"SELECT Nom,Prénom,Id_Télécommande,Statut FROM telecommande NATURAL JOIN identites WHERE Id_Télécommande='$id'");
				if($nb_lignes = mysqli_num_rows($queryIdTele) > 0){
					$tele = mysqli_fetch_array($queryIdTele);
					echo"<td>".$tele['Nom']."</td><td>".$tele['Prénom']."</td><td>Télécommande</td><td>".$tele['Id_Télécommande']."</td><td>".$tele['Statut']."</td>";
				}	
				
				$queryIdBadgeN = mysqli_query($connexion,"SELECT Nom,Prénom,Id_Badge_Noir,Statut FROM badge_noir NATURAL JOIN identites WHERE Id_Badge_Noir='$id'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeN) > 0){
					$badgeN = mysqli_fetch_array($queryIdBadgeN);
					echo"<td>".$badgeN['Nom']."</td><td>".$badgeN['Prénom']."</td><td>Badge Noir</td><td>".$badgeN['Id_Badge_Noir']."</td><td>".$badgeN['Statut']."</td>";
				}
				
				$queryIdBadgeB = mysqli_query($connexion,"SELECT Nom,Prénom,Id_Badge_Bleu,Statut FROM badge_bleu NATURAL JOIN identites WHERE Id_Badge_Bleu='$id'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeB) > 0){
					$badgeB = mysqli_fetch_array($queryIdBadgeB);
					echo"<td>".$badgeB['Nom']."</td><td>".$badgeB['Prénom']."</td><td>Badge Bleu</td><td>".$badgeB['Id_Badge_Bleu']."</td><td>".$badgeB['Statut']."</td>";
				}
				
				$queryIdBadgeC = mysqli_query($connexion,"SELECT Nom,Prénom,Id_Café,Statut FROM cafe NATURAL JOIN identites WHERE Id_Café='$id'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeC) > 0){
					$badgeC = mysqli_fetch_array($queryIdBadgeC);
					echo"<td>".$badgeC['Nom']."</td><td>".$badgeC['Prénom']."</td><td>Badge Café</td><td>".$badgeC['Id_Café']."</td><td>".$badgeC['Statut']."</td>";
				}
				
				$queryIdBadgeP = mysqli_query($connexion,"SELECT Nom,Prénom,Id_Parking,Statut FROM parking NATURAL JOIN identites WHERE Id_Parking='$id'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeP) > 0){
					$badgeP = mysqli_fetch_array($queryIdBadgeP);
					echo"<td>".$badgeP['Nom']."</td><td>".$badgeP['Prénom']."</td><td>Badge Parking</td><td>".$badgeP['Id_Parking']."</td><td>".$badgeP['Statut']."</td>";
				}
				
				$queryIdBadgeA = mysqli_query($connexion,"SELECT Nom,Prénom,Id_Alarme,Statut FROM alarme NATURAL JOIN identites WHERE Id_Alarme='$id'");
				if($nb_lignes = mysqli_num_rows($queryIdBadgeA) > 0){
					$badgeA = mysqli_fetch_array($queryIdBadgeA);
					echo"<td>".$badgeA['Nom']."</td><td>".$badgeA['Prénom']."</td><td>Alarme</td><td>".$badgeA['Id_Alarme']."</td><td>".$badgeA['Statut']."</td>";
				}
				
				
				mysqli_close($connexion);
				
			?>
		</table>
		<script type="text/javascript" src="scripts.js"></script>
	</body>
</html>