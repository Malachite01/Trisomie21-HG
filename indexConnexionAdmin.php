<?php session_start();require_once('QUERY.php');
$linkpdo = connexionBd();
if (!empty($_POST['champIdentifiant']) && !empty($_POST['champMotDePasse'])) // Si il existe les champs email, password et qu'il sont pas vides
{
    $courriel = $_POST['champIdentifiant'];
    $mdp = $_POST['champMotDePasse'] . 'BrIc3 4rNaUlT 3sT &$ Le MeIlLeUr d3s / pRoFesSeUrs DU.Mond3 !';
    $check = $linkpdo->prepare('SELECT courriel, mdp, id_Membre, Prenom, Role FROM membre WHERE courriel = ?');
    $check->execute(array($courriel));
    $data = $check->fetch();
    $row = $check->rowCount();

    $courriel = strtolower($courriel);
    $courriel = clean($courriel);

    if ($row > 0) {
        // Se le courriel est au bon format
        if (filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
            // Si le mdp est bon (pas sécurisé faudra mettre un hash après)
            if (password_verify($mdp, $data['mdp'])) { 
                if($data['Role'] != 0){
                     //On met l'id au $_SESSION pour le réutiliser après
                     $_SESSION['idConnexion'] = $data['id_Membre'];
                     $_SESSION['prenomMembre'] = $data['Prenom'];
                     $_SESSION['role'] = $data['Role'];
                     $_SESSION['enfant'] = 0;
                     $_SESSION['objectif'] = null;
                     
                     //page d'accueil  tableau de bord
                     header('Location: tableauDeBord.php');
                     die();
                } else {
                    header('Location: indexAdmin.php?login_err=role');
                }
           //Si mauvais password on redirige vers une autre page on l'on a codé une erreur du nom de 'password'
            } else {
                header('Location: indexAdmin.php?login_err=erreur');
                die();
            }
            //Si mauvais courriel au mauvais format redirige vers une autre page ou l'on a codé une erreur du nom de 'courriel'
        } else {
            header('Location: indexAdmin.php?login_err=erreur');
            die();
        }
        //Si compte pas encore validé
        //Si compte inexistant
    } else {
        header('Location: indexAdmin.php?login_err=erreur');
        die();
    }
}