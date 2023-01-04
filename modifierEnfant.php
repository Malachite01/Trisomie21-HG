<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Modifier informations enfant</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Modifier informations enfant</h1>
  <?php
  session_start();
  require('QUERY.php');
  testConnexion();
  faireMenu();
  ?>
  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php
      afficherInformationsEnfantModification($_POST['boutonModifier']);
      echo '
      <label for="champLienJeton">Image du jeton :</label>
      <input type="file" name="champLienJeton" id="champImageJeton" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp" onchange="refreshImageSelector(\'champImageJeton\',\'imageJeton\')">
      <img src="' . afficherImageTampon($_POST['boutonModifier']) . '" alt=" " id="imageJeton">';
      echo '<input type="hidden" value="' . afficherImageTampon($_POST['boutonModifier']) . '" name="hiddenImageLink">';

      ?>
    </div>

    <div class="center" id="boutonsValiderAnnuler">
      <button type="submit" formaction="gererEnfant.php" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler&ensp;</span></button>
      <button type="submit" formaction="gererEnfant.php?params=modif" value="<?php echo $_POST['boutonModifier']; ?>" name="boutonValider" class="boutonEdit" id="boutonValider"><img src="images/edit.png" class="imageIcone" alt="icone valider"><span>Appliquer</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
</body>

</html>