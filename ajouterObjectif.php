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
  faireMenu();
  ?>
  <img src="images/logo.png" alt="Icone de logo" class="logo" style="position: relative;">

  <h1 id="texteH1DemandeInscription">Création d'un objectif</h1>

  <?php
  if (champRempli(array('champIntitule', 'champDuree', 'champNbJetons', 'champTravaille'))) {
    if (isset($_POST['boutonValider'])) {
      if (objectifIdentique($_POST['champIntitule'], $_POST['idEnfant']) == 0) {
        ajouterObjectif(
          $_POST['champIntitule'],
          $_POST['champNbJetons'],
          dureeDeCagnottage($_POST['champDureeSemaines'],$_POST['champDureeJours'],$_POST['champDureeHeures']),
          uploadImage($_FILES['champImageTampon']),
          $_POST['champTravaille'],
          $_SESSION['idConnexion'],
          $_POST['idEnfant']
        );
        echo '
          <div class="validationPopup">
            <h2 class="txtPopup">L\'objectif a bien été ajouté à l\'enfant !</h2>
            <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
            <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
          </div>';
      } else {
        echo
        '<div class="erreurPopup">
            <h2 class="txtPopup">L\'objectif n\'a pas été ajouté car il existe déja pour cet enfant.</h2>
            <img src="images/annuler.png" alt="image annuler" class="imageIcone centerIcon">
            <button class="boutonFermerPopup" onclick="erasePopup(\'erreurPopup\')">Fermer X</button>
          </div>';
      }
    }
  }

  ?>

  <form id="form" method="POST" onsubmit="erasePopup('validationPopup'),erasePopup('erreurPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <label for="champIntitule">Enfant concerné :</label>
      <?php
      afficherNomPrenomEnfant();
      ?>
      <span></span>

      <label for="champIntitule">Intitulé :</label>
      <input type="text" name="champIntitule" placeholder="Entrez l'intitulé de l'objectif" minlength="1" maxlength="50" required>
      <span></span>

      <label>Durée de cagnottage :</label>
      <div id="selecteurDuree">
        <div class="center"><label for="inline champDureeSemaines" class="labelSemJourH">Semaine(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeSemaines" min="0" max="99"></div>
        <div class="center"><label for="inline champDureeJours">Jour(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeJours" min="0" max="99"></div>
        <div class="center"><label for="inline champDureeHeures">Heure(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeHeures" min="0" max="99"></div>
      </div>
      <span></span>

      <label for="champTravaille">Statut de l'objectif :</label>
      <div class="center" style="width: 100%;">
        <span class="center1Item">
          <input type="radio" name="champTravaille" id="Avenir" value="2" checked required>
          <label for="Avenir" class="radioLabel" tabindex="0">A venir</label>
        </span>
        <span class="center1Item">
          <input type="radio" name="champTravaille" id="enCours" value="1" required>
          <label for="enCours" class="radioLabel" tabindex="0">En cours</label>
        </span>
      </div>
      <span></span>

      <label for="champImageTampon">Image du Jeton :</label>
      <input type="file" name="champImageTampon" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp" onchange="refreshImageSelector('champImageTampon','imageTampon')" required>
      <img src="images/placeholder.jpg" id="imageTampon" alt=" ">

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