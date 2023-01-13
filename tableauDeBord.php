<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Tableau de bord</title>
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

  <h1>Tableau de bord pour l'enfant:</h1>
  <form id="formTableauDeBord" method="POST">
    <div class="filtres" id="miseEnFormeEnfant">
      <label for="Recherche">Enfant :</label>
      <div class="centerIconeChamp">
        <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">
        <?php
        if (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0) {
          $_SESSION['enfant'] = 0;
        }
        if (isset($_POST['idEnfant']) && $_POST['idEnfant'] != 0) {
          $_SESSION['enfant'] = $_POST['idEnfant'];
          afficherNomPrenomEnfantSubmitEquipe($_POST['idEnfant'], $_SESSION['idConnexion']);
        } else {
          afficherNomPrenomEnfantSubmitEquipe($_SESSION['enfant'], $_SESSION['idConnexion']);
        }
        ?>

      </div>
    </div>

    <?php
    if ($_SESSION['enfant'] == 0 || (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0)) {
      echo "<p class='msgSelection'>Veuillez choisir un enfant pour afficher son tableau de bord !</p>";
    }
    if (isset($_POST['valeurJetonsIdObjectif'])) {
      $valeur = explode(".", $_POST['valeurJetonsIdObjectif']);
      if ($valeur[0] > NombreDeJetonsPlaces($valeur[1])) {
        AjouterJetonsPlaces($valeur[1]);
        ajouterJeton($valeur[1], time(), $_SESSION['idConnexion'], recupererTempsDebutObjectif($_SESSION['objectif']));
      } else {
        SupprimerJetonsPlaces($valeur[1]);
      }
    }
    ?>

    <div id="containerTableauDeBord">
      <div id="containerObjectifs">
        <?php
        if (!isset($_POST['idEnfant'])) {
          afficherObjectifs($_SESSION['enfant']);
        } else {
          afficherObjectifs($_POST['idEnfant']);
        }

        ?>
      </div>
    </div>
  </form>

  <?php
  //!CHAT
  if (champRempli(array('champSujet', 'champCorps'))) {



    ajouterMessage(
      $_POST['champSujet'],
      $_POST['champCorps'],
      time(),
      $_POST['idObjectif'],
      $_SESSION['idConnexion']
    );
  }

  faireChatTb();

  ?>

  <script src="js/javascript.js"></script>
</body>

</html>