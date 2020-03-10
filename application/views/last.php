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
    <div class="login1">
      <div class="form1">
      	<h2>Dernière fiche de frais renseignée</h2>
      	<form method="POST" action="index.php?state=pull">
      		<table>
      			<tr>
      				<th >Mois</th>
      				<th>Date de dernière modification</th>
      				<th>Nombre de justificatifs</th>
      				<th>Etat</th>
      				<th>Forfait de l'étape</th>
      				<th>Frais kilomètriques</th>
      				<th>Nuite de l'hotel</th>
      				<th>Coût du restaurant</th>
      			</tr>

      			<?php
      			if($fetch_data->num_rows() > 0)
      			{
      				foreach ($fetch_data->result() as $row) 
      				{
      			?>
      				<tr>
      					<th><?php echo $row->mois; ?></th>
      					<th><?php echo $row->dateModif; ?></th>
      					<th><?php echo $row->nbJustificatifs; ?></th>
      					<th><?php echo $row->idEtat; ?></th>
      					<th><?php echo $row->forfaitEtape; ?></th>
      					<th><?php echo $row->fraisKm; ?></th>
      					<th><?php echo $row->nuiteHotel; ?></th>
      					<th><?php echo $row->restaurant; ?></th>
      				</tr>
      			<?php
      				}
      			}
      			else
      			{
      			?>
      			<tr>
      				<td colspan="6"> No data found</td>
      			</tr>
      			<?php
      			}
      			?>
      		</table>
      	</form>
      </div>
    </div>
  </section>
</body>
</html>