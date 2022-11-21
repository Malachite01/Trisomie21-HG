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
    <?php
    afficherNomPrenomEnfant();
    // ma merde
    if (isset($_POST['idEnfant'])) {
      afficherObjectifs($_POST['idEnfant']);
    }
    // fin de ma merde
    ?>
    <!-- ma merde  -->
    <input type="submit">
    <!-- fin de ma merde -->
    <div class="containerTableauDeBord">
      <div id="containerObjectifs">
        <div class="objectif">
          <label for="">Intitulé : <p></p></label>
        </div>
      </div>
    </div>


  </form>
  <script src="js/javascript.js"></script>
</body>

</html>