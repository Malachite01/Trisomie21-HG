<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Modifier Recompense</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Modifier Recompense</h1>
  <?php
    session_start();
    require('QUERY.php');

    faireMenu();

    $idRecompense = 1;

    if (isset($_POST['boutonValider'])) {
      modifierRecompense(
       // $_POST['idRecompense']
       
        $_POST['champIntitule'],
        $_POST['champDescriptif'],
        $_POST['champImage'],
        1,
        $_POST['champCoutJetons']
      );
      echo '
      <div class="editPopup">
        <h2 class="txtPopup">Votre profil a bien été modifié !</h2>
        <img src="images/edit.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'editPopup\')">Fermer X</button>
      </div>';
    }
  ?>
  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')">
    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php
        afficherInfoRecompense(1);
      ?>
    </div>    

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonEdit" id="boutonValider"><img src="images/edit.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
</body>
</html>
