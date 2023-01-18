<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <title>Consulter objectif</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
    <link rel="stylesheet" href="style/style.css">
</head>
<script src="js/javascript.js"></script>
<?php
require('QUERY.php');
faireMenu();
?>

<body>
    <div class="svgWaveContains">
        <div class="svgWave"></div>
    </div>

    <?php
    if (isset($_POST['redirect'])) {
        $_SESSION['objectif'] = $_POST['redirect'];
    }
    ?>
    <form method="POST" id="formConsulter">
        <h1 style="margin-top: 100px; margin-bottom: 20px">Consulter objectif :
            <?php
            echo afficherUnIntituleObjectif($_SESSION['objectif']) . "  " . nomPrenomEnfant($_SESSION['enfant']);
            ?>
        </h1>

        <?php

        //! --------------------------------------------------Seance-----------------------------------------------------------------------

        if (isset($_POST['butonResetSceance'])) {
            reinitialiserObjectif($_SESSION['objectif']);
        }

        if (isset($_POST['boutonRecuperer'])) {
            reinitialiserObjectif($_SESSION['objectif']);
        }

        // lancement de la séance 
        if (recupererTempsDebutObjectif($_SESSION['objectif']) == 0 && isset($_POST['butonDebutSeance'])) {
            $nowPlusDureeObjectif = time() + (recupererDureeUnObjectif($_SESSION['objectif']) * 3600);
            ajouterTempsDebutObjectif($nowPlusDureeObjectif, $_SESSION['objectif']);
            unset($_POST['butonDebutSeance']);
        }

        // Temps restant de la séance
        if ((recupererTempsDebutObjectif($_SESSION['objectif']) != 0) && (recupererTempsDebutObjectif($_SESSION['objectif']) - time() > 0)) {
        } else {
            // Fin séance apparition boutton début séance
            unset($_POST['butonDebutSeance']);
            reinitialiserObjectif($_SESSION['objectif']);
            unset($_POST['valeurJetonsIdObjectif']);
        }

        //! --------------------------------------------------Seance-----------------------------------------------------------------------

        if (isset($_POST['valeurJetonsIdObjectif'])) {
            $valeur = explode(".", $_POST['valeurJetonsIdObjectif']);
            if ($valeur[0] > NombreDeJetonsPlaces($valeur[1])) {
                AjouterJetonsPlaces($valeur[1]);
                ajouterJeton($valeur[1], time(), $_SESSION['idConnexion'], recupererTempsDebutObjectif($_SESSION['objectif']));
                header("location: consulterObjectif.php");
            } else {
                SupprimerJetonsPlaces($valeur[1]);
                header("location: consulterObjectif.php");
            }
        }
        // 2419200 = 4 weeks
        if (recupererPremierJetonJamaisPose($_SESSION['objectif']) == null) {
            afficherObjectifsZoom($_SESSION['objectif']);
        } else {
            if (recupererPremierJetonJamaisPose($_SESSION['objectif']) + 2419200  >= time()) {
                afficherObjectifsZoom($_SESSION['objectif']);
            } else {
                echo '<h1> Objectif terminé !';
            }
        }



        ?>
        <div id="containerRecompenses">
            <?php
            // 2419200 = 4 weeks
            if (recupererPremierJetonJamaisPose($_SESSION['objectif']) == null) {
                afficherRecompenseSelonObjectif($_SESSION['objectif']);
            } else {
                if (recupererPremierJetonJamaisPose($_SESSION['objectif']) + 2419200  >= time()) {
                    afficherRecompenseSelonObjectif($_SESSION['objectif']);
                } else {
                    echo '<h1> Objectif terminé !';
                }
            }
            ?>
        </div>
    </form>
    <?php
    afficherBarresProgression($_SESSION['objectif']);
    if (champRempli(array('champSujet', 'champCorps'))) {
        ajouterMessage(
            $_POST['champSujet'],
            $_POST['champCorps'],
            time(),
            $_SESSION['objectif'],
            $_SESSION['idConnexion']
        );
    }
    faireChatObjectif();
    ?>
</body>

</html>