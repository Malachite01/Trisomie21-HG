<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les enfants</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
require('QUERY.php');
faireMenu();

//!AJOUT D'UN ENFANT
if (champRempli(array('champNom', 'champPrénom', 'champDateDeNaissance'))) {
    if (isset($_POST['boutonValider'])) {
        if (enfantIdentique(
        $_POST['champNom'],
        $_POST['champPrénom'],
        $_POST['champDateDeNaissance']
        ) == 0) {
        $image = uploadImage($_FILES['champImageJeton']);
        if($image != null) {
            ajouterEnfant(
            $_POST['champNom'],
            $_POST['champPrénom'],
            $_POST['champDateDeNaissance'],
            $image
            );
            echo '
            <div class="validationPopup">
                <h2 class="txtPopup">L\'enfant a bien été ajouté à la base !</h2>
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
        } else {
        echo
        '<div class="erreurPopup">
            <h2 class="txtPopup">L\'enfant n\'a pas été ajouté à la base car il existe déja.</h2>
            <img src="images/annuler.png" alt="valider" class="imageIcone centerIcon">
            <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
            </div>';
        }
    }
}

//!SUPRESSION D'UN ENFANT
if (isset($_POST['boutonSupprimer'])) {
    if(file_exists(supprimerImageEnfant($_POST['boutonSupprimer']))) {
         unlink(supprimerImageEnfant($_POST['boutonSupprimer']));
     }
    supprimerEnfant($_POST['boutonSupprimer']);
    echo '
    <div class="supprPopup">
        <h2 class="txtPopup">L\'enfant a été supprimé !</h2>
        <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
    </div>';
}
if (isset($_GET['params'])) {
  $err = clean($_GET['params']);
  if ($err == 'modif') {
    echo '
    <div class="editPopup">
      <h2 class="txtPopup">Les informations de l\'enfant ont bien été modifiées !</h2>
      <img src="images/edit.png" alt="valider" class="imageIcone centerIcon">
      <button class="boutonFermerPopup" onclick="erasePopup(\'editPopup\')">Fermer X</button>
    </div>';
  }
}

//!MODIFICATIONS D'UN ENFANT (depuis la page modifierEnfant)
if (isset($_POST['boutonAppliquer'])) {
  if ($_FILES['champLienJeton']['name'] == "") {
    //IMAGE NON MODIFIEE
    modifierInformationsEnfant(
      $_POST['champNom'],
      $_POST['champPrénom'],
      $_POST['champDateDeNaissance'],
      $_POST['hiddenImageLink'],
      $_POST['boutonAppliquer']
    );
  } else {
    //UTILISER UNE NOUVELLE IMAGE A LA MODIF
    $image = uploadImage($_FILES['champLienJeton']);
    if ($image != null) {
      modifierInformationsEnfant(
            $_POST['champNom'],
            $_POST['champPrénom'],
            $_POST['champDateDeNaissance'],
            $image,
            $_POST['boutonAppliquer']
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

  <h1>Gérer les enfants</h1>

<div class="aCacher fenButtonOff transparent" id="formAjoutEnfant">
  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">
    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <label for="champNom">Nom :</label>
      <input type="text" name="champNom" placeholder="Entrez votre nom" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champPrénom">Prénom :</label>
      <input type="text" name="champPrénom" placeholder="Entrez votre prénom" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champDateDeNaissance">Date de naissance :</label>
      <input type="date" name="champDateDeNaissance" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" required>
      <span></span>

      <label for="champImageJeton">Image du jeton :</label>
      <input type="file" name="champImageJeton" id="champImageJeton" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp, image/gif" onchange="refreshImageSelector('champImageJeton','imageJeton');" required>
      <img src="images/placeholder.jpg" id="imageJeton" alt=" ">
    </div>

    <div class="center" id="boutonsValiderAnnuler">
        <button type="button" name="boutonAnnuler" class="boutonAnnuler" id="boutonAnnuler" onclick="fenClose('aCacher')"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
        <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider" formaction="enfant.php"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
</div>


  <form id="formGestionEnfants" method="POST" enctype="multipart/form-data">
    <div class="filtres" id="miseEnFormeFiltresEnfants">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <div class="centerIconeChamp">
          <input type="text" name="Recherche" placeholder="Rechercher par Nom">
        </div>
        <button type="submit" id="btnRecherche"><img src="images/search.png" class="imageIcone" alt="icone de loupe"></button>
      </div>
    </div>

    <button type="button" name="boutonAjouterEnfant" class="boutons boutonAjouterA" onclick="fenOpen('aCacher'),deCache('aCacher')"><span>Ajouter un enfant</span><img style="transform: rotate(-45deg);" src="images/annuler.png" class="imageIcone" alt="icone cadenas"></button>

    <table>
      <thead>
        <th>Image du jeton</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </thead>

      <tbody id="tbodyGererEnfants">
        <?php
        if (isset($_POST['Recherche'])) {
          $a = rechercherEnfant($_POST['Recherche']);
        } else {
          afficherInformationsEnfant();
        }

        ?>
      </tbody>
    </table>
  </form>
  <?php
  if (isset($_POST['Recherche'])) {
    if ($a == 0) {
      echo "<p class='msgSelection'>Aucun enfant trouvé !</p>";
    }
  }
  ?>
</body>

</html>