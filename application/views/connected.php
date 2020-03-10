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
        <h2><?php echo 'Bonjour ' .$_SESSION['prenom']; ?></h2>
        <hr/></br></br>
        <?php echo 'Nous sommes le '. date('d/m/Y') .''; ?>
      </div>
    </div>
  </section>
</body>
</html>
