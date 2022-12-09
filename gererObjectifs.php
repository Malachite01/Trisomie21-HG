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
testConnexion();

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
          <?php
          if (isset($_POST['filtres'])) {
            echo '<option value="1"';
            if ($_POST['filtres'] == 1) {
              echo 'selected';
            };
            echo '>Veuillez choisir un filtre</option>';
            echo '<option value="2"';
            if ($_POST['filtres'] == 2) {
              echo 'selected';
            };
            echo '>De A à Z</option>';
            echo '<option value="3"';
            if ($_POST['filtres'] == 3) {
              echo 'selected';
            };
            echo '>De Z à A</option>';
            echo '<option value="4"';
            if ($_POST['filtres'] == 4) {
              echo 'selected';
            };
            echo '>Objectifs les plus courts</option>';
            echo '<option value="5"';
            if ($_POST['filtres'] == 5) {
              echo 'selected';
            };
            echo '>Objectifs les plus longs</option>';
            echo '<option value="6"';
            if ($_POST['filtres'] == 6) {
              echo 'selected';
            };
            echo '>Objectif en cours</option>';
            echo '<option value="7"';
            if ($_POST['filtres'] == 7) {
              echo 'selected';
            };
            echo '>Objectif à venir</option>';
          } else {
            echo '
            <option value="1">Veuillez choisir un filtre</option>
            <option value="2">Membres les plus ancients</option>
            <option value="3">De A à Z</option>
            <option value="4">De Z à A</option>
            <option value="5">Objectifs les plus courts</option>
            <option value="6">Objectifs les plus longs</option>
            <option value="7">Objectif en cours</option>
            <option value="8">Objectif à venir</option>
          ';
          }

          ?>
        </select>
      </div>
    </div>
    <table>
      <thead>
        <th>Image objectif</th>
        <th>Intitulé</th>
        <th>Durée d'évaluation</th>
        <th>Jetons</th>
        <th>Statut</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </thead>

      <tbody id="tbodyGererObjectifs">
        <?php

        if (isset($_POST['idEnfant']) || $_SESSION['enfant'] != null) {
          if (!isset($_POST['filtres'])) {
            $cas = 0;
          } else {
            $cas = $_POST['filtres'];
          }
          switch ($cas) {
            case 2:
              if (!isset($_POST['idEnfant'])) {
                afficherGererObjectifsAZ($_SESSION['enfant']);
              } else {
                afficherGererObjectifsAZ($_POST['idEnfant']);
              }
              break;
            case 3:
              if (!isset($_POST['idEnfant'])) {
                afficherGererObjectifsZA($_SESSION['enfant']);
              } else {
                afficherGererObjectifsZA($_POST['idEnfant']);
              }
              break;
            case 4:
              if (!isset($_POST['idEnfant'])) {
                afficherGererObjectifsDureeCroissante($_SESSION['enfant']);
              } else {
                afficherGererObjectifsDureeCroissante($_POST['idEnfant']);
              }
              break;
            case 5:
              if (!isset($_POST['idEnfant'])) {
                afficherGererObjectifsDureeDecroissante($_SESSION['enfant']);
              } else {
                afficherGererObjectifsDureeDecroissante($_POST['idEnfant']);
              }
              break;
            case 6:
              if (!isset($_POST['idEnfant'])) {
                afficherGererObjectifsStatutCroissant($_SESSION['enfant']);
              } else {
                afficherGererObjectifsStatutCroissant($_POST['idEnfant']);
              }
              break;
            case 7:
              if (!isset($_POST['idEnfant'])) {
                afficherGererObjectifsStatutDecroissant($_SESSION['enfant']);
              } else {
                afficherGererObjectifsStatutDecroissant($_POST['idEnfant']);
              }
              break;
            default:
              if (!isset($_POST['idEnfant'])) {
                afficherGererObjectifs($_SESSION['enfant']);
              } else {
                afficherGererObjectifs($_POST['idEnfant']);
              }
              break;
          }
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
  <?php

  if (isset($_POST['boutonValider'])) {
    if ($_FILES['champLienImage']['name'] == "") {
      modifierObjectif(
        $_POST['champIntitule'],
        $_POST['champNbJetons'],
        dureeDeCagnottage($_POST['champDureeSemaines'], $_POST['champDureeJours'], $_POST['champDureeHeures']),
        $_POST['hiddenImageLink'],
        $_POST['champTravaille'],
        $_SESSION['idConnexion'],
        $_POST['boutonValider']
      );
    } else {
      if(uploadImage($_FILES['champLienImage']) != null) {
        modifierObjectif(
          $_POST['champIntitule'],
          $_POST['champNbJetons'],
          dureeDeCagnottage($_POST['champDureeSemaines'], $_POST['champDureeJours'], $_POST['champDureeHeures']),
          uploadImage($_FILES['champLienImage']),
          $_POST['champTravaille'],
          $_SESSION['idConnexion'],
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
</body>

</html>