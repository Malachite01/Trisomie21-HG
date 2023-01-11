<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title> Objectif</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php
  require('QUERY.php');
  faireMenu();
  ?>
  <img src="images/logo.png" alt="Icone de logo" class="logo" style="position: relative;">

  <h1 id="texteH1DemandeInscription"> objectif</h1>

  <?php
  if (champRempli(array('champIntitule', 'champNbJetons', 'champTravaille'))) {
    if (isset($_POST['boutonValider'])) {
      if (objectifIdentique($_POST['champIntitule'], $_POST['idEnfant']) == 0) {
        $image = uploadImage($_FILES['champImageTampon']);
        if($image != null) {
          ajouterObjectif(
            $_POST['champIntitule'],
            $_POST['champNbJetons'],
            dureeDeCagnottage($_POST['champDureeSemaines'], $_POST['champDureeJours'], $_POST['champDureeHeures']),
            $image,
            $_POST['champTravaille'],
            $_SESSION['idConnexion'],
            $_POST['idEnfant']
          );
          echo '
            <div class="validationPopup">
              <h2 class="txtPopup">L\'objectif a bien été ajouté à l\'enfant !</h2>
              <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
              <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
            </div>';
        } else {
          echo '
          <div class="erreurPopup">
            <h2 class="txtPopup">Erreur, image trop grande.</h2>
            <img src="images/annuler.png" alt="valider" class="imageIcone centerIcon">
            <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
          </div>';
        }
      } else {
        echo
        '<div class="erreurPopup">
            <h2 class="txtPopup">L\'objectif n\'a pas été ajouté car il existe déja pour cet enfant.</h2>
            <img src="images/annuler.png" alt="image annuler" class="imageIcone centerIcon">
            <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
          </div>';
      }
    }
  }
  if (isset($_POST['boutonSupprimer'])) {
    unlink(supprimerImageObjectif($_POST['boutonSupprimer']));
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

  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <label for="champEnfant">Enfant concerné :</label>
      <?php
      if (isset($_POST['idEnfant'])) {
        afficherNomPrenomEnfantEquipe($_POST['idEnfant'], $_SESSION['idConnexion']);
      } else {
        afficherNomPrenomEnfantEquipe($_SESSION['enfant'], $_SESSION['idConnexion']);
      }

      ?>
      <span></span>

      <label for="champIntitule">Intitulé :</label>
      <input type="text" name="champIntitule" placeholder="Entrez l'intitulé de l'objectif" minlength="1" maxlength="50" required>
      <span></span>

      <label>Durée de cagnottage :</label>
      <div id="selecteurDuree">
        <div class="center"><label for="inline champDureeSemaines" class="labelSemJourH">Semaine(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeSemaines" min="0" max="99" value="0" required></div>
        <div class="center"><label for="inline champDureeJours">Jour(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeJours" min="0" max="99" value="0" required></div>
        <div class="center"><label for="inline champDureeHeures">Heure(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeHeures" min="0" max="99" value="0" required></div>
      </div>
      <span></span>

      <label for="champTravaille">Statut de l'objectif :</label>
      <div class="center" style="width: 100%;">
        <span class="center1Item">
          <input type="radio" name="champTravaille" id="Avenir" value="2" checked required>
          <label for="Avenir" class="radioLabel" tabindex="0">A venir</label>
        </span>
        <span class="center1Item">
          <input type="radio" name="champTravaille" id="enCours" value="1" required>
          <label for="enCours" class="radioLabel" tabindex="0">En cours</label>
        </span>
      </div>
      <span></span>

      <label for="champImageTampon">Image de l'objectif :</label>
      <input type="file" name="champImageTampon" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp" onchange="refreshImageSelector('champImageTampon','imageTampon')" required>
      <img src="images/placeholder.jpg" id="imageTampon" alt=" ">

      <label for="champNbJetons">Jetons à placer :</label>
      <input type="number" name="champNbJetons" placeholder="Entrez le nombre de jetons à gagner" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="1" max="99999999999" required>
      <span></span>

    </div>

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php faireMenu(); ?>

  <h1>Gérer les objectifs</h1>
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
      $image = uploadImage($_FILES['champLienImage']);
      if ($image != null) {
        modifierObjectif(
          $_POST['champIntitule'],
          $_POST['champNbJetons'],
          dureeDeCagnottage($_POST['champDureeSemaines'], $_POST['champDureeJours'], $_POST['champDureeHeures']),
          $image,
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
    if ((!isset($_POST['idEnfant']) && $_SESSION['enfant'] == 0) || (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0)) {
      echo "<p class='msgSelection'>Veuillez choisir un enfant pour afficher son tableau de bord !</p>";
    }
    ?>
  </form>
  <script src="js/javascript.js"></script>
</body>

</html>