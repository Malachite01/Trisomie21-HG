<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Modifier profil</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Informations du membre</h1>
  <span></span>
  <?php
  require('QUERY.php');
  faireMenu();
  
  ?>
    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php
      AfficherInformationsMembre($_POST['boutonModifier']);
      ?>
    </div>
  <script src="js/javascript.js"></script>
    <a href="membre.php">
    <button type="button" style="align:center" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Retour&ensp;</span></button>
    </a>
</body>

</html>