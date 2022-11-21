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
    if (isset($_POST['boutonValider'])) {
      ajouterObjectif(
        $_POST['champIntitule'],
        $_POST['champDuree'],
        $_POST['champImageTampon'],
        $_POST['champPriorite'],
        $_POST['champTravaille'],
        $_POST['champNbJetons'],
        $id,
        $_POST['idEnfant'],
        $_POST['champNbTampons'],
        0
      );
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

      <label for="champPriorite">Priorité :</label>
      <input type="number" name="champPriorite" placeholder="Entrez la priorité de l'objectif (un nombre)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="11" required>
      <span></span>

      <label for="champTravaille">Statut de l'objectif :</label>
      <div class="center" style="width: 100%;">
        <span class="center1Item">
          <input type="radio" name="champTravaille" id="enCours" value="1" checked required>
          <label for="enCours" class="radioLabel" tabindex="0">En cours</label>
        </span>
        <span class="center1Item">
          <input type="radio" name="champTravaille" id="Avenir" value="2" required>
          <label for="Avenir" class="radioLabel" tabindex="0">A venir</label>
        </span>
      </div>
      <span></span>

      <label for="champImageTampon">Image du tampon :</label>
      <input type="file" name="champImageTampon" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp" onchange="refreshImageSelector('champImageTampon','imageTampon')" required>
      <img src="images/placeholder.jpg" id="imageTampon" alt=" ">

      <label for="champNbTampons">Nombre de tampons :</label>
      <input type="number" name="champNbTampons" placeholder="Entrez le nombre de tampons pour valider l'objectif" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="1" max="99999999999" required>
      <span></span>

      <label for="champNbJetons">Jetons à gagner :</label>
      <input type="number" name="champNbJetons" placeholder="Entrez le nombre de jetons à gagner" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="1" max="99999999999" required>
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