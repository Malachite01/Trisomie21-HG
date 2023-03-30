<?php session_start();require_once('QUERY.php');testConnexion();?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Informations du membre</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>
  <script src="js/javascript.js"></script>
  
  <?php
    faireMenu();
  ?>

  <h1><img src="images/oeil.png" alt="icone oeil" class="iconeH1"> Informations du membre</h1>
    <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')">
      <div class="miseEnForme" id="miseEnFormeFormulaire">
        <?php
          if(isset($_POST['boutonConsulter'])){
            AfficherInformationsMembre($_POST['boutonConsulter']);
          } else{
            AfficherInformationsMembre($_POST['boutonReset']);
          }
          if(isset($_POST['boutonReset'])){
            resetPassword($_POST['boutonReset']);
            echo '
            <div class="validationPopup">
                <h2 class="txtPopup">Le mot de passe de l\'utilisateur a bien été réinitialisé</h2>
                <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
                <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
            </div>';
          }
        ?>
      </div>

    </form>

    <a href="membre.php" style="align-self: center; justify-self: center;">
      <button type="button" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Retour&ensp;</span></button>
    </a>
</body>

</html>