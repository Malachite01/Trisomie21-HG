<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Modifier objectifs</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Modifier les objectifs</h1>
  <?php
  session_start();
  require('QUERY.php');

  faireMenu();
  if (isset($_POST['boutonValider'])) {
    modifierObjectif(
      $_POST['champIntitule'],
      $_POST['champDuree'],
      $_POST['champPriorite'],
      $_POST['champTravaille'],
      $_POST['champLien_Image'],
      $_POST['champNb_Tampons'],
      $_POST['champNb_Jetons'],
      $_SESSION['idConnexion'],
      $_GET['idObj']
    );
    header('Location: gererObjectifs.php??params=modif');
  }
  ?>
  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')">
    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php
      AfficherInformationUnObjectif($_GET['idObj']);
      ?>
    </div>

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonEdit" id="boutonValider"><img src="images/edit.png" class="imageIcone" alt="icone valider"><span>Editer </span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
</body>

</html>