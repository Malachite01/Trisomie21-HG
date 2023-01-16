<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les Récompenses</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
require('QUERY.php');
faireMenu();

//!AJOUT D'UNE RECOMPENSE
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
            <h2 class="txtPopup">La récompense a bien été ajoutée à la base !</h2>
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

//!SUPRESSION D'UN OBJECTIF
if (isset($_POST['boutonSupprimer'])) {
    if(file_exists(supprimerImageRecompense($_POST['boutonSupprimer']))) {
        unlink(supprimerImageRecompense($_POST['boutonSupprimer']));
    }
    supprimerRecompense($_POST['boutonSupprimer']);

  echo '
  <div class="supprPopup">
    <h2 class="txtPopup">La récompense a été supprimé !</h2>
    <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
    <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
  </div>';
}
if (isset($_GET['params'])) {
  $err = clean($_GET['params']);
  if ($err == 'modif') {
    echo '
    <div class="editPopup">
      <h2 class="txtPopup">La récompense a bien été modifié !</h2>
      <img src="images/edit.png" alt="valider" class="imageIcone centerIcon">
      <button class="boutonFermerPopup" onclick="erasePopup(\'editPopup\')">Fermer X</button>
    </div>';
  }
}

//!MODIFICATIONS D'UNE RECOMPENSE (depuis la page modifierRecompense)
if (isset($_POST['boutonAppliquer'])) {
    if ($_FILES['champLienImage']['name'] == "") {
      modifierRecompense(
        $_POST['boutonAppliquer'],
        $_POST['champIntitule'],
        $_POST['hiddenImageLink'],
        $_POST['champDescriptif']
      );
    } else {
      $image = uploadImage($_FILES['champLienImage']);
      if ($image != null) {
        modifierRecompense(
          $_POST['boutonAppliquer'],
          $_POST['champIntitule'],
          $image,
          $_POST['champDescriptif']
        );
        //Pour régler les problemes de réactualisation de page alors que l'image est déja suprimée
        if(file_exists($_POST['hiddenImageLink'])) {
            unlink($_POST['hiddenImageLink']);
        }
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

<body>
  
<div class="svgWaveContains">
    <div class="svgWave"></div>
</div>

  <h1>Gérer les récompenses</h1>

<!-- PAGE DE FORMULAIRE -->

<div class="aCacher fenButtonOff transparent" id="formAjoutRecompense">
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
            <button type="button" name="boutonAnnuler" class="boutonAnnuler" id="boutonAnnuler" onclick="fenClose('aCacher')"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
            <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider" formaction="recompense.php"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
        </div>
    </form>
</div>

<!-- PAGE DE GESTION -->
  <form id="formGestionRecompense" method="POST" enctype="multipart/form-data">
    <div class="filtres" id="miseEnFormeFiltresEnfants">
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
    </div>

    <button type="button" name="boutonAjouterRecompense" class="boutons boutonAjouterA" onclick="fenOpen('aCacher'),deCache('aCacher')"><span>Ajouter une récompense</span><img style="transform: rotate(-45deg);" src="images/annuler.png" class="imageIcone" alt="icone cadenas"></button>

    <table>
      <thead>
        <th>Image Recompense</th>
        <th>Intitulé</th>
        <th>Descriptif</th>
        <th>Objectif concerné</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </thead>

      <tbody id="tbodyGererRecompenses">
        <?php
         if (!isset($_POST['idEnfant'])) {
          afficherRecompense($_SESSION['enfant']);
        } else {
          afficherRecompense($_POST['idEnfant']);
        }
        ?>
      </tbody>
    </table>
    <?php
        if ((!isset($_POST['idEnfant']) && $_SESSION['enfant'] == 0) || (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0)) {
        echo "<p class='msgSelection'>Veuillez choisir un enfant pour afficher ses récompenses !</p>";
        }
    ?>
  </form>
</body>

</html>