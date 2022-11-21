<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Gérer les membres</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
session_start();
require('QUERY.php');
if (isset($_POST['boutonSupprimer'])) {
  supprimerMembre($_POST['boutonSupprimer']);
  header("Location: gererMembre.php?params=suppr");
};
if (isset($_POST['boutonValider'])) {
  validerMembre($_POST['boutonValider']);
  header("Location: gererMembre.php?params=valide");
};

if (isset($_GET['params'])) {
  $err = htmlspecialchars($_GET['params']);
  if ($err == 'suppr') {
    echo '
      <div class="supprPopup">
        <h2 class="txtPopup">Le membre a été supprimé !</h2>
        <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
      </div>';
  } else if ($err == 'valide') {
    echo '
      <div class="validationPopup">
        <h2 class="txtPopup">Le compte a bien été validé !</h2>
        <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
      </div>';
  }
}
?>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php faireMenu(); ?>

  <h1>Gérer les membres</h1>

  <form id="formGestionMembre" method="POST">

    <div class="miseEnForme" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="filtres" id="filtres" onchange="this.form.submit()">
          <option value="1">Membres les plus récents</option>
          <option value="2">Membres les plus ancients</option>
          <option value="3">De A à Z</option>
          <option value="4">De Z à A</option>
          <option value="5">Membres validés</option>
          <option value="6">Membres invalides</option>
          <option value="7">Membres les plus jeunes</option>
          <option value="8">Membres les plus agés</option>

        </select>
      </div>
      <div class="centerIconeChamp">
        <img src="images/search.png" class="imageIcone" alt="icone de loupe">
        <input type="text" name="Recherche">
      </div>
    </div>
    <table>
      <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse mail</th>
        <th>Date de naissance</th>
        <th>Validé</th>
      </thead>

      <tbody id="tbodyGererMembres">
        <?php
        switch ($_POST['filtres']) {
          case 1:
            AfficherMembres();
            break;
          case 2:
            AfficherMembresIdMembreDecroissante();
            break;
          case 3:
            AfficherMembresAZ();
            break;
          case 4:
            AfficherMembresZA();
            break;
          case 5:
            AfficherMembresCompteValideDecroissante();
            break;
          case 6:
            AfficherMembresCompteValideCroissante();
            break;
          case 7:
            AfficherMembresDateNaissanceCroissante();
            break;
          case 8:
            AfficherMembresDateNaissanceDecroissante();
            break;
          default:
            AfficherMembres();
            break;
        }
        ?>
      </tbody>
    </table>
  </form>
</body>

</html>