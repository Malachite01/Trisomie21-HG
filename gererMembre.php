<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les membres</title>
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
  supprimerIdMembreDansObjectif($_POST['boutonSupprimer']);
  supprimerMembre($_POST['boutonSupprimer']);
  header("Location: gererMembre.php?params=suppr");
};
if (isset($_POST['boutonValider'])) {
  validerMembre($_POST['boutonValider']);
  header("Location: gererMembre.php?params=valide");
};

if (isset($_GET['params'])) {
  $err = clean($_GET['params']);
  if ($err == 'suppr') {
    echo '
      <div class="supprPopup">
        <h2 class="txtPopup">Le membre a été supprimé !</h2>
        <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
      </div>';
  } else if ($err == 'valide') {
    echo '
      <div class="validationPopup">
        <h2 class="txtPopup">Le compte a bien été validé !</h2>
        <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
      </div>';
  }
}
?>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php faireMenu(); ?>

  <h1>Gérer les membres</h1>

  <form id="formGestionMembre" method="POST">

    <div class="filtres" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="filtres" id="filtres" onchange="this.form.submit()">
          <?php
          if (isset($_POST['filtres'])) {
            echo '<option value="1"';
            if ($_POST['filtres'] == 1) {
              echo 'selected';
            };
            echo '>Membres les plus récents</option>';
            echo '<option value="2"';
            if ($_POST['filtres'] == 2) {
              echo 'selected';
            };
            echo '>Membres les plus anciens</option>';
            echo '<option value="3"';
            if ($_POST['filtres'] == 3) {
              echo 'selected';
            };
            echo '>De A à Z</option>';
            echo '<option value="4"';
            if ($_POST['filtres'] == 4) {
              echo 'selected';
            };
            echo '>De Z à A</option>';
            echo '<option value="5"';
            if ($_POST['filtres'] == 5) {
              echo 'selected';
            };
            echo '>Membres validés</option>';
            echo '<option value="6"';
            if ($_POST['filtres'] == 6) {
              echo 'selected';
            };
            echo '>Membres non validés</option>';
            echo '<option value="7"';
            if ($_POST['filtres'] == 7) {
              echo 'selected';
            };
            echo '>Membres les plus jeunes</option>';
            echo '<option value="8"';
            if ($_POST['filtres'] == 8) {
              echo 'selected';
            };
            echo '>Membres les plus agés</option>';
          } else {
            echo '
            <option value="1">Membres les plus récents</option>
            <option value="2">Membres les plus ancients</option>
            <option value="3">De A à Z</option>
            <option value="4">De Z à A</option>
            <option value="5">Membres validés</option>
            <option value="6">Membres non validés</option>
            <option value="7">Membres les plus jeunes</option>
            <option value="8">Membres les plus agés</option>
          ';
          }

          ?>
        </select>

      </div>
      <div class="centerIconeChamp">
        <img src="images/search.png" class="imageIcone" alt="icone de loupe">
        <input type="text" name="Recherche">
      </div>
    </div>
    <table>
      <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse mail</th>
        <th>Date de naissance</th>
        <th>Valider</th>
        <th>Supprimer</th>
      </thead>

      <tbody id="tbodyGererMembres">
        <?php
        if (isset($_POST['filtres'])) {
          switch ($_POST['filtres']) {
            case 1:
              AfficherMembres();
              break;
            case 2:
              AfficherMembresIdMembreDecroissante();
              break;
            case 3:
              AfficherMembresAZ();
              break;
            case 4:
              AfficherMembresZA();
              break;
            case 5:
              AfficherMembresCompteValideDecroissante();
              break;
            case 6:
              AfficherMembresCompteValideCroissante();
              break;
            case 7:
              AfficherMembresDateNaissanceCroissante();
              break;
            case 8:
              AfficherMembresDateNaissanceDecroissante();
              break;
            default:
              AfficherMembres();
              break;
          }
        }
        if(isset($_POST['Recherche'])){
          $a = rechercheMembre($_POST['Recherche']);
        } else {
          AfficherMembres();
        }

        ?>
      </tbody>
    </table>
  </form>
  <?php 
    if ($a==0){
      echo "<p class='msgSelection'>Aucun Membre trouvé !</p>";         
   } ?>
</body>

</html>