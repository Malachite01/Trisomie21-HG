<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les Recompenses</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
session_start();
require('QUERY.php');
testConnexion();
if (isset($_POST['boutonModifier'])) {
  $test = $_POST['boutonModifier'];
  header('Location: modifierRecompense.php?idRec=' . $test);
}
if (isset($_POST['boutonSupprimer'])) {
  supprimerRecompense($_POST['boutonSupprimer']);
  echo '
      <div class="supprPopup">
        <h2 class="txtPopup">La Récompense a été supprimé !</h2>
        <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
      </div>';
}
?>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php faireMenu(); ?>

  <h1>Gérer les récompenses</h1>

  <form id="formGestionMembre" method="POST">

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
          <option value="1">Filtre</option>
          <option value="2">Filtre</option>
        </select>
      </div>
    </div>
    <table>
      <thead>
        <th>Intitulé</th>
        <th>Descriptif</th>
        <th>Modifier</th>
        <th>Suprimer</th>
      </thead>

      <tbody id="tbodyGererObjectifs">
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
    if (isset($_POST['idEnfant']) && $_POST['idEnfant'] == "Veuillez choisir un enfant") {
      echo "<p class='msgSelection'>Veuillez choisir un enfant !</p>";
    }
    ?>
  </form>
</body>

</html>