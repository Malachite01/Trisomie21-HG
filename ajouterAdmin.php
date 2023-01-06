<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Ajouter un Admin</title>
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
  //testConnexion();
  if (champRempli(array('champNom','champPrénom','champDate','champMail','champMdp', 'champRole'))) {
    ajouterAdmin(
      $_POST['champNom'],
      $_POST['champPrénom'],
      $_POST['champDate'],
      $_POST['champMail'],
      saltHash($_POST['champMdp']),
      $_POST['champRole']
    );
    echo '
      <div class="validationPopup">
        <h2 class="txtPopup">Le compte administratif a bien été ajouté à la base !</h2>
        <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
        <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
      </div>';
 }
  //faireMenu();
  ?>

  <h1>Ajouter un Admin</h1>

  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <label for="champNom">Nom :</label>
      <input type="text" name="champNom" placeholder="Entrez le Nom" minlength="1" maxlength="50" required>
      <span></span>
      <label for="champPrenom">Prénom :</label>
      <input type="text" name="champPrénom" placeholder="Entrez le prénom" minlength="1" maxlength="50" required>
      <span></span>
      <label for="champDate">Mot de passe :</label>
      <input type="date" name="champDate" placeholder="Entrez la date de naissance" minlength="1" maxlength="50" required>
      <span></span>
      <label for="champMail">Adresse mail :</label>
      <input type="email" name="champMail" placeholder="Ex: exemple@xyz.com" minlength="3" maxlength="50" required>
      <span></span>
      <label for="champRole">Rôle: </label>
        <select name="champRole" id="champRole">
            <option value="">Choisissez une option</option>
            <option value="1">Coordinatrice</option>
            <option value="2">Gestionnaire</option>
            <option value="3">Admin</option>
    
      <label for="champMdp">Mot de passe :</label>
      <input type="password" name="champMdp" id="champMdp" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
      <span></span>

      <label for="champConfirmerMdp">Confirmer mot de passe :</label>
      <input type="password" name="champConfirmerMdp" id="champConfirmerMdp" placeholder="Confirmez votre mot de passe" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
      <span></span>
      <p id="messageVerifMdp" style="color: red;"></p>

       
    </select>


      
    </div>

    <div class="center" id="boutonsValiderAnnuler">
      <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
      <button type="submit" name="boutonValider" class="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
    </div>
  </form>
  <script src="js/javascript.js"></script>
  <?php

  
  ?>
</body>

</html>