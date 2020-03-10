<!-- @author aDahirel -->
<?php session_start(); // Démarre la session 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Bienvenue</title>  <!-- Titre de l'onglet -->
	<meta charset="utf-8">	<!-- Spécifie un encodage -->
	<link rel="stylesheet" type="text/css" href="././assets/css/css.css">	<!-- Lien vers le fichier css -->
</head>
<body>
	<!-- Partie formulaire de connexion -->
	<section>
		<div class="login">  <!-- Conteneur des formulaires -->
  			<div class="form">
  				<h2 id="connexion_titre">Laboratoire GSB</h2> 	<!-- Titre du forulaire -->
  				<!-- Formulaire de connexion -->
    			<form class="login-form" action="index.php?state=connexion" method="post"> 
    				<!-- Entrée de données pour le pseudonyme et retiens sa valeur-->
      				<input type="text" placeholder="Login" name="login" value="<?php if(isset($login)) { echo $login; } ?>"/>
      				<!-- Entrée de données pour le mot de passe -->
      				<input type="password" placeholder="Mot de passe" name="password" />
      				<!-- Bouton de connexion -->
      				<button name="connexion">Connexion</button>
    			</form>
  			</div> <!-- fin div form -->
		</div> <!-- fin div login -->
	</section>
</body>
</html>