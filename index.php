<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<title>Connexion</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>
  <?php 
    if(isset($_GET['login_err']))
    {
        $err = htmlspecialchars($_GET['login_err']);
        switch($err)
        {
            case 'password':
            ?>
              <div class="erreurPopup">
                <h2 class="txtPopup">Erreur, mot de passe incorrect</h2>
                <img src="images/annuler.png" alt="image annuler" class="imageIcone centerIcon">
                <button class="boutonFermerPopup" onclick="erasePopup('erreurPopup')">Fermer X</button>
              </div>
            <?php
            break;

            case 'courriel':
            ?>
              <div class="erreurPopup">
                <h2 class="txtPopup">Erreur, e-mail incorrect</h2>
                <img src="images/annuler.png" alt="image annuler" class="imageIcone centerIcon">
                <button class="boutonFermerPopup" onclick="erasePopup('erreurPopup')">Fermer X</button>
              </div>
            <?php
            break;

            case 'already':
            ?>
              <div class="erreurPopup">
                <h2 class="txtPopup">Erreur, compte non existant</h2>
                <img src="images/annuler.png" alt="image annuler" class="imageIcone centerIcon">
                <button class="boutonFermerPopup" onclick="erasePopup('erreurPopup')">Fermer X</button>
              </div>
            <?php
            break;
        }
    }
  ?> 
  
  <div class="test"></div>
  <img src="images/logo.png" alt="logo application" class="iconeApp"> 
  <form id="formConnexion" action="indexConnexion.php" method="POST">
    <div class="miseEnForme" id="miseEnFormeConnexion">
      <label for="champIdentifiant">Identifiant :</label>
      <input type="email" name="champIdentifiant" id="champIdentifiant" placeholder="Entrez votre adresse mail"  minlength="1" maxlength="50"  required>
      <span></span>

      <label for="champMotDePasse">Mot de passe :</label>
      <input type="password" name="champMotDePasse" id="champMotDePasse" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" required>
      <span><img src="images/oeilFermé.png" id="oeilMdp" alt="oeil" onclick="afficherMDP('champMotDePasse','oeilMdp')"></span>
      
      <a href="ajouterEnfant.html"> Mot de passe oublié ?</a>
    </div>

    <button type="submit" name="boutonConnexion" class="boutons" id="boutonConnexion"><img src="images/unlock.png" class="imageIcone" alt="icone cadenas"><span>Connexion</span></button>
  </form>
  <script src="js/javascript.js"></script>
</body>
</html>