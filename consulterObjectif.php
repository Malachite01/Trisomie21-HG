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
<!-- Inclure Chart.js -->
<script src="js/chart.js"></script>

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
        <h1 style="margin-top: 100px; margin-bottom: 20px">Consulter objectif : </h1>

        <?php

        //! --------------------------------------------------Seance-----------------------------------------------------------------------

        if (isset($_POST['butonResetSceance'])) {
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

        if (isset($_POST['boutonRecuperer'])) {
            reinitialiserObjectif($_SESSION['objectif']);
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
        if (recupererPremierJetonJamaisPose($_SESSION['objectif']) == null || recupererPremierJetonJamaisPose($_SESSION['objectif']) + 5  >= time()) {
            afficherObjectifsZoom($_SESSION['objectif']);
        ?>
            <div id="containerRecompenses">
                <?php
                afficherRecompenseSelonObjectif($_SESSION['objectif']);
                ?>
            </div>
            <button type="button" id="boutonStats" class="boutonEdit" onclick="createPieChart('chartData','chartTata'),fenOpenStats('containerStats'),deCache('containerStats');"><img src="images/flecheBas.png" id="flecheBas"><span></span></button>

        <?php
            afficherBarresProgression($_SESSION['objectif']);
        } else {
            echo '<button type="button" id="boutonStats" class="boutonEdit" onclick="createPieChart(\'chartData\',\'chartTata\'),fenOpenStats(\'containerStats\'),deCache(\'containerStats\');"><img src="images/flecheBas.png" id="flecheBas"><span></span></button>';
            afficherBarresProgression($_SESSION['objectif']);
            if ($_SESSION['pourcentPie'] >= 80) {
                
                echo '
                <h2 style="font-size: 1.5em; color: black;">Objectif validé à 80% pendant 4 semaines, félicitations ! 🎈🎉</h2>';
                echo '<img src="images/confetti.gif" style="border-radius: 8px; width: max-content; max-width: 320px; place-self: center; margin-top: 30px;">
                <button type="submit" name="boutonAVenir" formaction="tableauDeBord.php" class="boutonValider seanceFinie" style="width: fit-content; place-self: center;"><img src="images/valider.png" class="imageIcone" alt="icone valider"><span>Valider l\'objectif et changer son statut</span></button>
                ';
                
            } else {
                echo '
                <h2 style="font-size: 1.5em; color: black;">L\'objectif n\'a pas été validé à 80% pendant 4 semaines, vous ferez mieux la prochaine fois ! </h2>';
                echo '<img src="images/echec.gif"  style="border-radius: 8px; width: max-content; max-width: 320px; place-self: center; margin-top: 30px;">
                <button type="submit" name="boutonAnnuler" formaction="tableauDeBord.php" class="boutonAnnuler seanceFinie" id="boutonAnnuler" style="width: fit-content; place-self: center;"><img src="images/reinitialiser.png" class="imageIcone" alt="icone valider"><span>Réinitialiser et relancer l\'objectif</span></button>
                ';
                
            }
        } ?>

    </form>


    <?php

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