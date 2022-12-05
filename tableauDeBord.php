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
  session_start();
  require('QUERY.php');
  faireMenu();
  ?>

  <h1>Tableau de bord pour l'enfant:</h1>
  <form id="formTableauDeBord" method="POST">
    <div class="miseEnForme" id="miseEnFormeEnfant">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">
        <?php
            if(isset($_POST['idEnfant'])) {
              afficherNomPrenomEnfantSubmit($_POST['idEnfant']);
            } else {
              afficherNomPrenomEnfantSubmit(null);
            }
        ?>
      </div>
    </div>
    <?php
      if (isset($_POST['idEnfant'])) {
        afficherObjectifs($_POST['idEnfant']);
      } else if(!isset($_POST['idEnfant']) || $_POST['idEnfant']=="Veuillez choisir un enfant"){
        echo "<p class='msgSelection'>Veuillez choisir un enfant pour afficher son tableau de bord !</p>";
      }
      if (isset($_POST['idObjectif'])) {
        UpdateTamponsPlaces($_POST['valeurObjectif'], $_POST['idObjectif']);
      }
    ?>
    <div class="containerTableauDeBord">
      <div id="containerObjectifs">
        <div class="objectif">
          <label for=""><p></p></label>
        </div>
      </div>
    </div>


  </form>
  <script src="js/javascript.js"></script>
</body>

</html>