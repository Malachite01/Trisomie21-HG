<?php session_start();require('QUERY.php');testConnexion();?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <title>Gérer les équipes</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
faireMenu();

if (isset($_POST['boutonSupprimer'])) {
    supprimerMembreEquipe($_POST['boutonSupprimer']);
    echo '
  <div class="supprPopup">
    <h2 class="txtPopup">Le membre a été retiré de l\'équipe!</h2>
    <img src="images/bin.png" alt="image suppression" class="imageIcone centerIcon">
    <button class="boutonFermerPopup" onclick="erasePopup(\'supprPopup\')">Fermer X</button>
  </div>';
}
if (champRempli(array('champRole'))) {
    AjouterUneEquipe(
        $_POST['idEnfant'],
        $_POST['idMembre'],
        time(),
        $_POST['champRole']
    );
    echo '
    <div class="validationPopup">
      <h2 class="txtPopup">Le membre a bien été ajouté à l\'équipe de l\'enfant !</h2>
      <img src="images/valider.png" alt="valider" class="imageIcone centerIcon">
      <button class="boutonFermerPopup" onclick="erasePopup(\'validationPopup\')">Fermer X</button>
    </div>';
}
?>

<body>
    <div class="svgWaveContains">
        <div class="svgWave"></div>
    </div>

    <h1>Gérer les équipes</h1>

    <div class="aCacher fenButtonOff transparent" id="formAjoutEquipe">
        <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">

            <div class="miseEnForme" id="miseEnFormeFormulaire">
                <?php
                echo '<label for="champEnfant">Enfant concerné :</label>';
                afficherNomPrenomEnfantSelect($_SESSION['enfant']);
                echo '<span></span>';
                echo '<label for="champEnfant">Membre concerné :</label>';
                afficherNomPrenomMembre();
                echo '<span></span>';
                ?>
                <label for="champRole">Rôle du membre :</label>
                <input type="text" name="champRole" placeholder="Entrer le rôle de cette personne" minlength="1" maxlength="50" required>
                <span></span>
            </div>
            <div class="center" id="boutonsValiderAnnuler">
                <button type="button" name="boutonAnnuler" class="boutonAnnuler" id="boutonAnnuler" onclick="fenClose('aCacher')"><img src="images/annuler.png" class="imageIcone" alt="icone annuler"><span>Annuler</span></button>
                <button type="submit" name="boutonValider" class="boutonValider" id="boutonValider"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider</span></button>
            </div>
        </form>
    </div>

    <form id="formGestionObjectifs" method="POST" enctype="multipart/form-data">

        <div class="filtres" id="miseEnFormeFiltresEnfants">
            <label for="Recherche">Filtres :</label>
            <div class="centerIconeChamp">
                <img src="images/enfants.png" class="imageIcone" alt="icone de filtre">
                <?php
                if (isset($_POST['idEnfant'])) {
                    afficherNomPrenomEnfantSubmit($_POST['idEnfant']);
                } else {
                    afficherNomPrenomEnfantSubmit($_SESSION['enfant']);
                }
                ?>
            </div>
        </div>

        <button type="button" name="boutonAjouterAEquipe" class="boutons boutonAjouterA" onclick="fenOpen('aCacher'),deCache('aCacher')"><span>Ajouter un membre à l'équipe</span><img style="transform: rotate(-45deg);" src="images/annuler.png" class="imageIcone" alt="icone cadenas"></button>

        <table>
            <thead>
                <th>Rôle</th>
                <th>Nom du membre</th>
                <th>Prénom du membre</th>
                <th>Retirer</th>
            </thead>

            <tbody id="tbodyGererEquipe">
                <?php

                if (isset($_POST['idEnfant'])) {
                    afficherGererEquipe($_POST['idEnfant']);
                } else {
                    afficherGererEquipe($_SESSION['enfant']);
                }
                ?>
            </tbody>
        </table>
        <?php
        if ((!isset($_POST['idEnfant']) && $_SESSION['enfant'] == 0) || (isset($_POST['idEnfant']) && $_POST['idEnfant'] == 0)) {
            echo "<p class='msgSelection'>Veuillez choisir un enfant pour afficher son équipe !</p>";
        }
        ?>
    </form>
</body>

</html>