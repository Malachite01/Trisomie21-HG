<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les enfants</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
session_start();
require('QUERY.php');
testConnexion();

// if (isset($_POST['boutonModifier'])) {

// }
if (isset($_POST['boutonSupprimer'])) {
  supprimerEnfant($_POST['boutonSupprimer']);
  echo '
  <div class="supprPopup">
    <h2 class="txtPopup">L\'enfant a été supprimé !</h2>
    <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
    <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
  </div>';
}
if (isset($_GET['params'])) {
  $err = clean($_GET['params']);
  if ($err == 'modif') {
    echo '
    <div class="editPopup">
      <h2 class="txtPopup">L\'enfant a bien été modifié !</h2>
      <img src="images/edit.png" alt="valider" class="imageIcone centerIcon">
      <button class="boutonFermerPopup" onclick="erasePopup(\'editPopup\')">Fermer X</button>
    </div>';
  }
}
?>

<body>
<?php

if (isset($_POST['boutonValider'])) {
  if ($_FILES['champLienJeton']['name'] == "") {
    modifierImageEnfant(
      $_POST['hiddenImageLink'],
      $_POST['boutonValider']
    );
  } else {
    $image = uploadImage($_FILES['champLienJeton']);
    if($image != null) {
      modifierImageEnfant(
        $image,
        $_POST['boutonValider']
      );
      unlink($_POST['hiddenImageLink']);
    } else {
      echo '
      <div class="erreurPopup">
        <h2 class="txtPopup">Erreur, image trop grande.</h2>
        <img src="images/annuler.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
      </div>';
    }
  }
}
?>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php faireMenu(); ?>

  <h1>Gérer les enfants</h1>

  <form id="formGestionEnfants" method="POST" enctype="multipart/form-data">

    <div class="filtres" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">

      </div>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="filtres" id="filtres" onchange="this.form.submit()">
          <?php
          ?>
        </select>
      </div>
    </div>
    <table>
      <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Image du jeton</th>
        <th>Modifier l'image</th>
        <th>Supprimer</th>
      </thead>

      <tbody id="tbodyGererEnfants">
        <?php
             afficherInformationsEnfant();
        ?>
      </tbody>
    </table>
  </form>
  
</body>

</html>