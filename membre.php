<?php session_start();require('QUERY.php');testConnexion();?>
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
faireMenu();

//!AJOUTER UN MEMBRE PRO
if (champRempli(array('champNom', 'champPrénom', 'champAdresse', 'champCp', 'champVille', 'champMail', 'champDate', 'champMdp', 'champRole'))) {
  ajouterMembre(
    $_POST['champNom'],
    $_POST['champPrénom'],
    $_POST['champAdresse'],
    $_POST['champCp'],
    $_POST['champVille'],
    $_POST['champMail'],
    $_POST['champDate'],
    saltHash($_POST['champMdp']),
    1,
    $_POST['champRole']
  );
  $id = recupererIdMembre($_POST['champMail']);
  validerMembre($id);
  echo '
    <div class="validationPopup">
        <h2 class="txtPopup">Le compte administratif a bien été ajouté à la base !</h2>
        <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
    </div>';
}

//!SUPRESSION D'UN MEMBRE
if (isset($_POST['boutonSupprimer'])) {
  supprimerIdMembreDansObjectif($_POST['boutonSupprimer']);
  supprimerMembre($_POST['boutonSupprimer']);
  echo '
    <div class="supprPopup">
        <h2 class="txtPopup">Le membre a été supprimé !</h2>
        <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
    </div>';
};

//!VALIDATION D'UN MEMBRE
if (isset($_POST['boutonValiderMembre'])) {
  validerMembre($_POST['boutonValiderMembre']);
  echo '
      <div class="validationPopup">
        <h2 class="txtPopup">Le compte a bien été validé !</h2>
        <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
      </div>';
};
?>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <h1>Gérer les membres</h1>

  <div class="aCacher fenButtonOff transparent" id="formAjoutMembrePro">
    <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">
      <div class="miseEnForme" id="miseEnFormeFormulaire">
        <label for="champRole">Rôle: </label>
        <select name="champRole" id="champRole">
          <option value="">Choisissez une option</option>
          <option value="1">Coordinateur</option>
          <option value="2">Gestionnaire</option>
          <option value="3">Admin</option>
        </select>
        <span></span>

        <label for="champNom">Nom :</label>
        <input type="text" name="champNom" placeholder="Entrez le Nom" minlength="1" maxlength="50" required>
        <span></span>
        <label for="champPrénom">Prénom :</label>
        <input type="text" name="champPrénom" placeholder="Entrez le prénom" minlength="1" maxlength="50" required>
        <span></span>
        <label for="champDate">Date de Naissance :</label>
        <input type="date" name="champDate" placeholder="Entrez la date de naissance" minlength="1" maxlength="50" required>
        <span></span>
        <label for="champAdresse">Adresse :</label>
        <input type="text" name="champAdresse" placeholder="Entrez votre adresse" maxlength="50" required>
        <span></span>

        <label for="champCp">Code postal :</label>
        <input type="text" name="champCp" placeholder="Entrez votre code postal" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="5" required>
        <span></span>

        <label for="champVille">Ville :</label>
        <input type="text" name="champVille" placeholder="Entrez votre ville" maxlength="50" required>
        <span></span>

        <label for="champMail">Adresse mail :</label>
        <input type="email" name="champMail" placeholder="Ex: exemple@xyz.com" minlength="3" maxlength="50" required>
        <span></span>

        <label for="champMdp">Mot de passe :</label>
        <input type="password" name="champMdp" id="champMdp" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
        <span></span>

        <label for="champConfirmerMdp">Confirmer mot de passe :</label>
        <input type="password" name="champConfirmerMdp" id="champConfirmerMdp" placeholder="Confirmez votre mot de passe" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
        <span></span>
        <p id="messageVerifMdp" style="color: red;"></p>
      </div>

      <div class="center" id="boutonsValiderAnnuler">
        <button type="button" name="boutonAnnuler" class="boutonAnnuler" id="boutonAnnuler" onclick="fenClose('aCacher')"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
        <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider" formaction="membre.php"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
      </div>
    </form>
  </div>


  <form id="formGestionMembre" method="POST">
    <div class="filtres" id="miseEnFormeFiltres">
      <label for="Recherche">Filtres :</label>
      <div class="centerIconeChamp">
        <input type="text" name="Recherche" placeholder="Rechercher par Nom">
        <button type="submit" id="btnRecherche"><img src="images/search.png" class="imageIcone" alt="icone de loupe"></button>
      </div>
      <div class="centerIconeChamp">
        <img src="images/filtre.png" class="imageIcone" alt="icone de filtre">
        <select name="filtres" id="filtres" onchange="this.form.submit()">
          <?php
          if (isset($_POST['filtres'])) {
            echo '<option value="1"';
            if ($_POST['filtres'] == 1) {
              echo 'selected';
            };
            echo '>De A à Z</option>';
            echo '<option value="2"';
            if ($_POST['filtres'] == 2) {
              echo 'selected';
            };
            echo '>De Z à A</option>';
            echo '<option value="3"';
            if ($_POST['filtres'] == 3) {
              echo 'selected';
            };
            echo '>Membres validés</option>';
            echo '<option value="4"';
            if ($_POST['filtres'] == 4) {
              echo 'selected';
            };
            echo '>Membres non validés</option>';
            echo '<option value="5"';
            if ($_POST['filtres'] == 5) {
              echo 'selected';
            };
            echo '>Membres les plus récents</option>';
            echo '<option value="6"';
            if ($_POST['filtres'] == 6) {
              echo 'selected';
            };
            echo '>Membres les plus anciens</option>';
            echo '<option value="7"';
            if ($_POST['filtres'] == 7) {
              echo 'selected';
            };
            echo '>Membres les plus jeunes</option>';
            echo '<option value="8"';
            if ($_POST['filtres'] == 8) {
              echo 'selected';
            };
            echo '>Membres les plus agés</option>';
          } else {
            echo '
            <option value="1">De A à Z</option>
            <option value="2">De Z à A</option>
            <option value="3">Membres validés</option>
            <option value="4">Membres non validés</option>
            <option value="5">Membres les plus récents</option>
            <option value="6">Membres les plus anciens</option>
            <option value="7">Membres les plus jeunes</option>
            <option value="8">Membres les plus agés</option>
          ';
          }

          ?>
        </select>

      </div>
    </div>

    <button type="button" name="boutonAjouterMembrePro" class="boutons boutonAjouterA" onclick="fenOpen('aCacher'),deCache('aCacher')"><span>Ajouter un <b style="text-decoration: underline; color: orange;">professionnel</b></span><img style="transform: rotate(-45deg);" src="images/annuler.png" class="imageIcone" alt="icone cadenas"></button>

    <table>
      <thead>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Adresse mail</th>
        <th>Date de naissance</th>
        <th>Rôle</th>
        <th>Valider</th>
        <th>Supprimer</th>
        <? if($_SESSION['role'] == 2 ||  $_SESSION['role'] == 3){?>
          <th>Consulter</th>
        <?}?>
      </thead>

      <tbody id="tbodyGererMembres">
        <?php
        if (!isset($_POST['filtres'])) {
          AfficherMembres();
        }
        if (isset($_POST['filtres'])) {
          switch ($_POST['filtres']) {
            case 1:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembresAZ();
              }
              break;
            case 2:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembresZA();
              }
              break;
            case 3:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembresCompteValideDecroissante();
              }
              break;
            case 4:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembresCompteValideCroissante();
              }
              break;
            case 5:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembres();
              }
              break;
            case 6:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembresIdMembreDecroissante();
              }
              break;
            case 7:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembresDateNaissanceCroissante();
              }
              break;
            case 8:
              if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
                $a = rechercheMembre($_POST['Recherche']);
              } else {
                AfficherMembresDateNaissanceDecroissante();
              }
              break;
          }
        }
        ?>
      </tbody>
    </table>
  </form>
  <?php
  if (isset($_POST['Recherche']) && $_POST['Recherche'] != null) {
    if ($a == 0) {
      echo "<p class='msgSelection'>Aucun membre trouvé !</p>";
    }
  }
  ?>
</body>

</html>