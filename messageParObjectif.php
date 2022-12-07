<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Chat général par objectif youpi</title>
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

  <h1>Chat général youpi</h1>
  <?php
  afficherMessageParObjectif($_POST['idEnfant'],$_POST['idObjectif']);
    ?>
  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
    <?php if (isset($_POST['idEnfant'])) {
            afficherNomPrenomEnfantSubmitEquipe($_POST['idEnfant'],$_SESSION['idConnexion']);
            afficherIntituleObjectifSubmit(null, $_POST['idEnfant']);
            
        } else {
            afficherNomPrenomEnfantSubmitEquipe(null,$_SESSION['idConnexion']);
            echo "<p class='msgSelection'>Veuillez choisir un enfant pour pouvoir sélectionner un objectif 
                afin de lui ajouter une récompense !</p>";
        }?>
      <input type="text" name="champSujet" placeholder="Entrez votre sujet" minlength="1" maxlength="50" required>
      <input type="text" name="champCorps" placeholder="Ecrivez votre corps !" minlength="1" maxlength="500" required>
      <span></span>

      <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
    </form>
    <?php
        
    if (champRempli(array('champSujet','champCorps'))){
           ajouterMessage(
            $_POST['champSujet'],
            $_POST['champCorps'],
            time(),
            $_POST['idObjectif'],
            $_SESSION['idConnexion']
           );
    }
    ?>