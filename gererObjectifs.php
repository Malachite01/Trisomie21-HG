<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Gérer les objectifs</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
  session_start();
  require('QUERY.php');
  if(isset($_POST['boutonSupprimer'])) {
    supprimerMembre($_POST['boutonSupprimer']);
    header("Location: gererMembre.php?params=suppr");
  };
  //!boutonModifier profil
  if(isset($_POST['boutonValider'])) {
    validerMembre($_POST['boutonValider']);
    header("Location: gererMembre.php?params=valide");
  };
?>
<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php faireMenu();?>

  <h1>Gérer les objectifs</h1>  

  <form id="formGestionMembre" method="POST">
    
  <div class="miseEnForme" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">
        <?php
            afficherNomPrenomEnfantSubmit();
        ?>
      </div>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="filtres" id="filtres" onchange="this.form.submit()">
          <option value="1">Filtre</option>
          <option value="2">Filtre</option>
        </select>
      </div>
    </div>
    <table>
      <thead>
        <th>Intitulé</th>
        <th>Durée d'évaluation</th>
        <th>Priorité</th>
        <th>Jetons à gagner</th>
        <th>Statut</th>
        <th>Modifier</th>
        <th>Suprimmer</th>
      </thead>

      <tbody id="tbodyGererObjectifs">
        <?php
          if (isset($_POST['idEnfant'])) {
            afficherObjectifs($_POST['idEnfant']);
          }
        ?>
      </tbody>
    </table>
    <?php 
      if(!isset($_POST['idEnfant'])) {
        echo "<p class='msgSelection'>Veuillez choisir un enfant !</p>";
      }
    ?>
  </form>
</body>
</html>