<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Création d'un objectif</title>
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
    session_start();
    $id = $_SESSION['idConnexion'];
    faireMenu();
  ?>
  <img src="images/logo.png" alt="Icone de logo" class="logo" style="position: relative;">

  <h1 id="texteH1DemandeInscription">Création d'un objectif</h1>

  <?php
      if (champRempli(array('champIntitule', 'champDuree', 'champImageTampon', 'champPriorite', 'champNbTampons'))) {
        if(isset($_POST['boutonValider'])) {
          ajouterObjectif($_POST['champIntitule'],
                          $_POST['champDuree'],
                          $_POST['champImageTampon'],
                          $_POST['champPriorite'],
                          $_POST['champNbTampons'],
                          $id,
                          $_POST['idEnfant']);
          echo '
          <div class="validationPopup">
            <h2 class="txtPopup">L\'objectif a bien été ajouté à l\'enfant !</h2>
            <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
            <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
          </div>';
        }
      }
    ?>

  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')">
  
    <div class="miseEnForme" id="miseEnFormeFormulaire">
    <label for="champIntitule">Enfant concerné :</label>
      <?php
        afficherNomPrenomEnfant();
      ?>
      <span></span>

      <label for="champIntitule">Intitulé :</label>
      <input type="text" name="champIntitule" placeholder="Entrez l'intitulé de l'objectif" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champDuree">Durée d'évaluation :</label>
      <input type="text" name="champDuree" placeholder="Entrez la durée d'évaluation" minlength="1" maxlength="50" required>
      <span></span>

      <label for="champImageTampon">Image du tampon :</label>
      <input type="file" name="champImageTampon" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp"  onchange="refreshImageSelector('champImageTampon','imageTampon')" required>
      <img src="images/placeholder.jpg" id="imageTampon" alt=" ">

      <label for="champPriorite">Priorité :</label>
      <input type="text" name="champPriorite" placeholder="Entrez la priorité de l'objectif" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="5" required>
      <span></span>

      <label for="champNbTampons">Nombre de tampons :</label>
      <input type="number" name="champNbTampons" placeholder="Entrez le nombre de tampons pour valider l'objectif"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"maxlength="8" required>
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
