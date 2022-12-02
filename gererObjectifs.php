<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les objectifs</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
session_start();
require('QUERY.php');
// if (isset($_POST['boutonModifier'])) {

// }
if (isset($_POST['boutonSupprimer'])) {
  supprimerObjectif($_POST['boutonSupprimer']);
  echo '
  <div class="supprPopup">
    <h2 class="txtPopup">L\'objectif a été supprimé !</h2>
    <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
    <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
  </div>';
}
if (isset($_GET['params'])) {
  $err = clean($_GET['params']);
  if ($err == 'modif') {
    echo '
    <div class="editPopup">
      <h2 class="txtPopup">L\'objectif a bien été modifié !</h2>
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

  <h1>Gérer les objectifs</h1>

  <form id="formGestionObjectifs" method="POST" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">
        <?php
          afficherNomPrenomEnfantSubmit();
        ?>
      </div>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="filtres" id="filtres" onchange="this.form.submit()">
          <option value="1">Filtre</option>
          <option value="2">Filtre</option>
        </select>
      </div>
    </div>
    <table>
      <thead>
        <th>Image jeton</th>
        <th>Intitulé</th>
        <th>Durée d'évaluation</th>
        <th>Jetons</th>
        <th>Statut</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </thead>

      <tbody id="tbodyGererObjectifs">
        <?php
        if (isset($_POST['idEnfant'])) {
          afficherGererObjectifs($_POST['idEnfant']);
        }
        ?>
      </tbody>
    </table>
    <?php
    if (!isset($_POST['idEnfant'])) {
      echo "<p class='msgSelection'>Veuillez choisir un enfant !</p>";
    }
    ?>
  </form>
  <?php

  if (isset($_POST['boutonValider'])) {
    if ($_FILES['champLienImage']['name'] == "") {
      modifierObjectif(
        $_POST['champIntitule'],
        $_POST['champNbJetons'],
        $_POST['champDuree'],
        $_POST['hiddenImageLink'],
        $_POST['champTravaille'],
        $_SESSION['idConnexion'],
        $_POST['boutonValider']
      );
    } else {
      modifierObjectif(
        $_POST['champIntitule'],
        $_POST['champNbJetons'],
        $_POST['champDuree'],
        uploadImage($_FILES['champLienImage']),
        $_POST['champTravaille'],
        $_SESSION['idConnexion'],
        $_POST['boutonValider']
      );
      unlink($_POST['hiddenImageLink']);
    }
  }
  ?>
</body>

</html>