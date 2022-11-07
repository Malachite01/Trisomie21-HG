<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Modifier profil</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Modifier profil</h1>
  <?php
    session_start();
    require('QUERY.php');

    if (isset($_POST['boutonValider'])) {
      modifierMembreSession(
        $_SESSION['idConnexion'],
        $_POST['champNom'],
        $_POST['champPrénom'],
        $_POST['champAdresse'],
        $_POST['champCp'],
        $_POST['champVille'],
        $_POST['champDateDeNaissance'],
        $_POST['champMdp'],
        $_POST['champPro']
      );
    }
  ?>
  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')">
    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php
        AfficherInformationsMembreSession($_SESSION['idConnexion']);
      ?>
    </div>    

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
</body>
</html>
