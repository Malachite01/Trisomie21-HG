!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les Récompenses</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
session_start();
require('QUERY.php');
testConnexion();

if (isset($_POST['boutonSupprimer'])) {
  unlink(supprimerImageRecompense($_POST['boutonSupprimer']));
  supprimerRecompense($_POST['boutonSupprimer']);

  echo '
  <div class="supprPopup">
    <h2 class="txtPopup">La récompense a été supprimé !</h2>
    <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
    <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
  </div>';
}
if (isset($_GET['params'])) {
  $err = clean($_GET['params']);
  if ($err == 'modif') {
    echo '
    <div class="editPopup">
      <h2 class="txtPopup">La récompense a bien été modifié !</h2>
      <img src="images/edit.png" alt="valider" class="imageIcone centerIcon">
      <button class="boutonFermerPopup" onclick="erasePopup(\'editPopup\')">Fermer X</button>
    </div>';
  }
}
?>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php faireMenu(); ?>

  <h1>Gérer les récompenses</h1>
  <?php

  if (isset($_POST['boutonValider'])) {
    if ($_FILES['champLienImage']['name'] == "") {
      modifierRecompense(
        $_POST['boutonValider'],
        $_POST['champIntitule'],
        $_POST['hiddenImageLink'],
        $_POST['champDescriptif']
      );
    } else {
      $image = uploadImage($_FILES['champLienImage']);
      if ($image != null) {
        modifierRecompense(
          $_POST['boutonValider'],
          $_POST['champIntitule'],
          $image,
          $_POST['champDescriptif']
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
  <form id="formGestionRecompense" method="POST" enctype="multipart/form-data">

    <div class="filtres" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">
        <?php
        if (isset($_POST['idEnfant'])) {
          afficherNomPrenomEnfantSubmitEquipe($_POST['idEnfant'], $_SESSION['idConnexion']);
        } else {
          afficherNomPrenomEnfantSubmitEquipe($_SESSION['enfant'], $_SESSION['idConnexion']);
        }
        ?>
      </div>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="filtres" id="filtres" onchange="this.form.submit()">
          
        </select>
      </div>
    </div>
    <table>
      <thead>
        <th>Image Recompense</th>
        <th>Intitulé</th>
        <th>Descriptif</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </thead>

      <tbody id="tbodyGererRecompenses">
        <?php
         if (!isset($_POST['idEnfant'])) {
          afficherRecompense($_SESSION['enfant']);
        } else {
          afficherRecompense($_POST['idEnfant']);
        }
        ?>
      </tbody>
    </table>
    <?php
    if ((!isset($_POST['idEnfant']) && $_SESSION['enfant'] == 0) || (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0)) {
      echo "<p class='msgSelection'>Veuillez choisir un enfant pour afficher son tableau de bord !</p>";
    }
    ?>
  </form>
</body>

</html>