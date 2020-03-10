<?php $this->load->view('interface'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Connecté</title>
  <link rel="stylesheet" type="text/css" href="././assets/css/css.css">
  <meta name="viewport" content="width=device-width" />
  <meta charset="utf-8">
</head>
<body>
  <section>
    <div class="login">
      <div class="form">
      	<h2>Renseigner une fiche de frais</h2>
      	<form method="POST" action="index.php?state=addFicheFrais">

      		<label>Etat de la visite : </label></br></br>
      		<input type="text" value="<?php echo "Fiche créée, saisie en cours" ?>" disabled style="color: black;" /></br></br>

      		<label>Date de modification : </label></br></br>
            <input type="date" value="<?php echo date('Y-m-d') ?>" disabled style="color: black;" /></br></br>
            <hr/></br></br>
            <label>A renseigner : </label></br></br>
      		<select size="1" name="mois">
                <option>Janvier</option>
                <option>Février</option>
                <option>Mars</option>
                <option>Avril</option>
                <option>Mai</option>
                <option>Juin</option>
                <option>Juillet</option>
                <option>Août</option>
                <option>Septembre</option>
                <option>Octobre</option>
                <option>Novembre</option>
                <option>Décembre</option>
              </select></br></br>

              <input type="text" placeholder="Nombre de justificatifs" name="nbJustificatifs" value="<?php if(isset($nbJustificatifs)) { echo $nbJustificatifs; } ?>" /></br></br>

              <input type="text" placeholder="Forfait de l'Etape €" name="forfaitEtape" value="<?php if(isset($forfaitEtape)) { echo $forfaitEtape; } ?>"/></br></br>

              <input type="text" placeholder="Frais kilomètriques €" name="fraisKm" value="<?php if(isset($fraisKm)) { echo $fraisKm; } ?>"/></br></br>

              <input type="text" placeholder="Nuite de l'hotel €" name="nuiteHotel" value="<?php if(isset($nuiteHotel)) { echo $nuiteHotel; } ?>"/></br></br>

              <input type="text" placeholder="Restaurant €" name="restaurant" value="<?php if(isset($restaurant)) { echo $restaurant; } ?>"/></br></br>

              <button name="send">Envoyer</button> <!-- Bouron pour envoyer les informations -->
      	</form>
      </div>
    </div>
  </section>
</body>
</html>