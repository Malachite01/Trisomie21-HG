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
    session_start();
    require('QUERY.php');
    faireMenu();
  ?>

  <h1>Ajouter une recompense</h1>
  
  
  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')">
    <?php
    afficherNomPrenomEnfant();
    ?>
    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <label for="champIntitule">champIntitule :</label>
      <input type="text" name="champIntitule" placeholder="Entrez intitule" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champDescriptif">Descriptif :</label>
      <input type="text" name="champDescriptif" placeholder="Entrez votre description" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champLienImage">Image Récompense:</label>
      <input type="file" name="champLienImage" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp"  onchange="refreshImageSelector('champImageJeton','imageJeton')" required>
      <img src="images/placeholder.jpg" id="imageJeton" alt=" ">
      <span></span>
    </div>    

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
  <?php
    if (isset($_POST['idEnfant'])){
        if (champRempli(array('champIntitule', 'champDescriptif', 'champLienImage'))) {
            ajouterRecompense(
              $_POST['champIntitule'],
              $_POST['champDescriptif'],
              $_POST['champLienImage'],
              $_POST['idEnfant']
            );
    }
   
        echo '
        <div class="validationPopup">
          <h2 class="txtPopup">La Récompense a bien été ajouté à la base !</h2>
          <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
          <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
        </div>';
        // ici ca redirigera vers la liste des enfants
      
    }
    if(isset($_POST['boutonDeco'])) {  
      session_destroy();
      header('Location: index.php');
    };
  ?>
</body>
</html>
