<?php session_start();require('QUERY.php');testConnexion();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Modification mot de passe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <?php
    if (isset($_POST['boutonValider'])) {
        echo '<div class="editPopup">
            <h2 class="txtPopup">Mot de passe modifié !</h2>
            <img src="images/edit.png" alt="valider" class="imageIcone centerIcon">
            <button class="boutonFermerPopup" onclick="erasePopup(\'editPopup\')">Fermer X</button>
            </div>';
        modifierMdp($_POST['champMdp'], $_SESSION['idConnexion']);
        header('refresh: 1;url=modifierProfil.php');
    }
    ?>
    <div class="svgWaveContains">
        <div class="svgWave"></div>
    </div>
    <div class="test"></div>
    <img src="images/passReset.png" alt="icone reinitialiser" class="iconeApp" style="width: 100px; background-color: white; border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
    <form id="formConnexion" method="POST">
        <div class="miseEnForme" id="miseEnFormeConnexion">
            <label for="champMdp">Mot de passe :</label>
            <input type="password" name="champMdp" id="champMdp" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
            <span></span>

            <label for="champConfirmerMdp">Confirmer mot de passe :</label>
            <input type="password" name="champConfirmerMdp" id="champConfirmerMdp" placeholder="Confirmez votre mot de passe" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
            <span></span>
            <p id="messageVerifMdp" style="color: red;"></p>
        </div>
        <div class="center" id="boutonsValiderAnnuler">
            <button type="reset" name="boutonAnnuler" class="boutonAnnuler" onclick="document.location.href = 'modifierProfil.php'"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler&ensp;</span></button>
            <button type="submit" name="boutonValider" class="boutonEdit" id="boutonValider"><img src="images/edit.png" class="imageIcone" alt="icone valider"><span>Appliquer</span></button>
        </div>
    </form>
    <script src="js/javascript.js"></script>
</body>

</html>