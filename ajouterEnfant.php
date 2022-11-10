<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Ajouter un enfant</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Ajouter un enfant</h1>
  
  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')">
    
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
      <input type="file" name="champImageJeton" id="champImageJeton" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp"  onchange="refreshImageSelector('champImageJeton','imageJeton')" required>
      <img src="images/placeholder.jpg" id="imageJeton" alt=" ">
    </div>    

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
  <?php
    require('QUERY.php');
    if (champRempli(array('champNom', 'champPrénom', 'champDateDeNaissance', 'champImageJeton'))) {
      if (enfantIdentique(
        $_POST['champNom'],
        $_POST['champPrénom'],
        $_POST['champDateDeNaissance']
      ) == 0) {
        ajouterEnfant(
          $_POST['champNom'],
          $_POST['champPrénom'],
          $_POST['champDateDeNaissance'],
          $_POST['champImageJeton']
        );
        echo '
        <div class="validationPopup">
          <h2 class="txtPopup">L\'enfant a bien été ajouté à la base !</h2>
          <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
          <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
        </div>';
        // ici ca redirigera vers la liste des enfants
      } else {
        echo 
        '<div class="erreurPopup">
          <h2 class="txtPopup">L\'enfant n\'a pas été ajouté à la base car il existe déja.</h2>
          <img src="images/annuler.png" alt="valider" class="imageIcone centerIcon">
          <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
        </div>';
      }
    }
    if(isset($_POST['boutonDeco'])) {  
      session_destroy();
      header('Location: index.php');
    };
  ?>
</body>
</html>
