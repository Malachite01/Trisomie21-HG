<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <title>Modification mot de passe</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="svgWaveContains">
        <div class="svgWave"></div>
    </div>
    <div class="test"></div>
    <img src="images/logo.png" alt="logo application" class="iconeApp">
    <form id="formConnexion" action="indexConnexion.php" method="POST">
        <div class="miseFormeConnexion" id="miseEnFormeConnexion">
            <label for="champMdp">Mot de passe :</label>
            <input type="password" name="champMdp" id="champMdp" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
            <span></span>

            <label for="champConfirmerMdp">Confirmer mot de passe :</label>
            <input type="password" name="champConfirmerMdp" id="champConfirmerMdp" placeholder="Confirmez votre mot de passe" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp('champMdp','champConfirmerMdp','messageVerifMdp','boutonValider')" required>
            <span></span>
            <p id="messageVerifMdp" style="color: red;"></p>
        </div>
        <div class="center" id="boutonsValiderAnnuler">
            <button type="reset" name="boutonAnnuler" class="boutonAnnuler"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler&ensp;</span></button>
            <button type="submit" name="boutonValider" class="boutonEdit" id="boutonValider" onclick="return confirm('Êtes vous sûr de vouloir appliquer ces modifications ?');"><img src="images/edit.png" class="imageIcone" alt="icone valider"><span>Appliquer</span></button>
        </div>
    </form>
    <script src="js/javascript.js"></script>
</body>

</html>