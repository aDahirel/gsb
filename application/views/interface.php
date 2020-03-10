<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Axel DAHIREL</title>
	<link rel="stylesheet" type="text/css" href="./assets/style/css.css">
	<meta name="viewport" content="width=device-width" />
	<meta charset="utf-8">
</head>
<body>
	<header>
		<h1>Laboratoire GSB</h1>
	</header>
	<nav id="menu">
		<ul>
			<li><p style="color: black; border: solid black 1px; padding: 8px;"><?php echo 'Connecté sous : ' . $_SESSION['login']; ?></p></li>
			<li><a href="index.php?state=home">Accueil</a></li>
			<li><a href="#">Renseigner</a>
			<ul>
				<li><a href="index.php?state=insertFrais">Fiche Frais</a></li>
				<li><a href="index.php?state=insertHorsFrais">Fiche Hors-Frais</a></li>
			</ul>
			</li>
			<li><a href="index.php?state=last">Dernière Fiche</a></li>
			<!-- <li><a href="index.php?state=modify">Modifier</a></li> -->
			<li><a href="index.php?state=deconnexion">Déconnexion</a></li>
		</ul>
	</nav>
</body>
</html>