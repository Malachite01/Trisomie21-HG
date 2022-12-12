<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Ajouter un membre à une équipe</title>
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
  testConnexion();
  faireMenu();
  ?>

  <h1>Ajouter un membre à une équipe</h1>
  <?php

    if (champRempli(array('champRole'))) {
      AjouterUneEquipe(
        $_POST['idEnfant'],
        $_POST['idMembre'],
        time(),
        $_POST['champRole']
      );
      echo '
      <div class="validationPopup">
        <h2 class="txtPopup">L\'enfant a bien été ajouté à l\'équipe !</h2>
        <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
      </div>';
      //ICI IL FAUDRA FAIRE LA VERIFICATION SI L4ENFANT EST DEJA DANS LEQUIPE ET ECHO CA
      // echo '
      // <div class="erreurPopup">
      //   <h2 class="txtPopup">Erreur, l\'enfant est déja dans cette équipe.</h2>
      //   <img src="images/annuler.png" alt="valider" class="imageIcone centerIcon">
      //   <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
      // </div>';
    }
    ?>
  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php
      echo '<label for="champEnfant">Enfant concerné :</label>';
      afficherNomPrenomEnfant($_SESSION['enfant']);
      echo '<span></span>';
      echo '<label for="champEnfant">Membre concerné :</label>';
      afficherNomPrenomMembre();
      echo '<span></span>';
      ?>
      <label for="champRole">Rôle du membre :</label>
      <input type="text" name="champRole" placeholder="Entrer le rôle de cette personne" minlength="1" maxlength="50" required>
      <span></span>
    </div>
    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
  </body>
</html>