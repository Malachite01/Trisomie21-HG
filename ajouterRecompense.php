<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Ajouter une Récompense</title>
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

  <h1>Ajouter une récompense</h1>


  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php
      if (isset($_POST['idEnfant']) && $_POST['idEnfant'] != 0) {
        echo '<label for="champEnfant">Enfant concerné :</label>';
        afficherNomPrenomEnfantSubmitEquipe($_POST['idEnfant'], $_SESSION['idConnexion']);
        echo '<span></span>';
        echo '<label for="champObjectif">Objectif concerné :</label>';
        afficherIntituleObjectif(null, $_POST['idEnfant']);
        echo '<span></span>';
      } else {
        if ($_SESSION['enfant'] == 0) {
          echo '<label for="champEnfant">Enfant concerné :</label>';
          afficherNomPrenomEnfantSubmitEquipe($_SESSION['enfant'], $_SESSION['idConnexion']);
          echo '<span></span>';
        } else {
          if (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0) {
            echo '<label for="champEnfant">Enfant concerné :</label>';
            afficherNomPrenomEnfantSubmitEquipe($_POST['idEnfant'], $_SESSION['idConnexion']);
            echo '<span></span>';
          } else {
            echo '<label for="champEnfant">Enfant concerné :</label>';
            afficherNomPrenomEnfantSubmitEquipe($_SESSION['enfant'], $_SESSION['idConnexion']);
            echo '<span></span>';
            echo '<label for="champObjectif">Objectif concerné :</label>';
            afficherIntituleObjectif(null, $_SESSION['enfant']);
            echo '<span></span>';
          }
        }
      }
      ?>

      <label for="champIntitule">Titre :</label>
      <input type="text" name="champIntitule" placeholder="Entrez le titre de la récompense" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champDescriptif">Descriptif :</label>
      <input type="text" name="champDescriptif" placeholder="Entrez la description de la récompense" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champImage">Image :</label>
      <input type="file" name="champImage" id="champImage" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp" onchange="refreshImageSelector('champImage','imageJeton');" required>
      <img src="images/placeholder.jpg" id="imageJeton" alt=" ">
    </div>

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
  <?php
  if (isset($_POST['idEnfant'])) {
    if (champRempli(array('champIntitule', 'champDescriptif'))) {
      $image = uploadImage($_FILES['champImage']);
      if($image != null) {
        ajouterRecompense(
          $_POST['champIntitule'],
          $image,
          $_POST['champDescriptif']
        );
        AjouterLienRecompenseObj($_POST['idObjectif'], rechercherIdRecompenseSelonIntitule($_POST['champIntitule']));
        echo '
        <div class="validationPopup">
          <h2 class="txtPopup">La récompense a bien été ajoutée à la récompense !</h2>
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
    }
  }
  ?>
</body>

</html>