<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="Accueil.php">Accueil</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="CreationIdentite.php">Nouvelle identité</a>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Informations Badges</a>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="AfficherBadges.php?type=PERDU">Afficher les badges perdus</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="AfficherBadges.php?type=PRET">Afficher les badges prêtés</a>
		</div>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Gestion des comptes</a>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="AfficherComptes.php">Afficher les comptes</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="CreationCompte.php">Créer un compte</a>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" onclick="deconnexion()">Déconnexion</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" href="Connexion.php"><?php echo "Rôle: ".$_SESSION['role']?></a>
	</li>
</ul>