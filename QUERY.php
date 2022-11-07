<?php

/*
/ -----------------------------------------------Liste des requetes---------------------------------------------------------
*/

// requete pour ajouter un enfant a la BD
$qAjouterEnfant = 'INSERT INTO enfant (Nom,Prenom,Date_Naissance,Lien_Jeton) 
                    VALUES (:nom , :prenom, :dateNaissance, :lienJeton)';

// requete pour recuperer le nom, le prenom et la date de naissance d'un enfant dans la BD
$qEnfantIdentique = 'SELECT Nom, Prenom, Date_Naissance FROM enfant 
                    WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance';

// requete pour ajouter un membre a la BD
$qAjouterMembre = 'INSERT INTO membre (Nom,Prenom,Adresse,Code_Postal,Ville,Courriel,Date_Naissance,Mdp,Pro) 
                    VALUES (:nom,:prenom,:adresse,:codePostal,:ville,:courriel,:dateNaissance,:mdp,:pro)';

// requete pour recuperer toute les informations des membre de la BD
$qAfficherMembres = 'SELECT * FROM Membre';

// requete pour rechercher un membre dans la BD
$qRechercherUnMembre = 'SELECT * FROM membre WHERE Id_Membre = :id';

// requete pour supprimer un membre de la BD
$qSupprimerMembre = 'DELETE FROM membre WHERE Id_Membre = :id';

// requete pour modifier les données d'un membre de la BD
$qModifierInformationsMembre = 'UPDATE membre SET Nom = :nom, Prenom = :prenom, Adresse = :adresse, Code_Postal = :codePostal, 
                                Ville = :ville, Date_Naissance = :dateNaissance, Mdp = :mdp, Courriel = :courriel, 
                                Pro = :pro WHERE Id_Membre = :idMembre;';

// requete pour recuperer le nom, prenom, date naissance d'un enfant de la BD
$qMembreIdentique = 'SELECT Nom, Prenom, Date_Naissance, Courriel FROM membre WHERE Nom = :nom AND Prenom = :prenom AND 
                    Date_Naissance = :dateNaissance AND Courriel = :courriel';

// requete pour valider le compte d'un membre de la BD
$qValiderCompteMembre;

/*
/ -----------------------------------------------Liste des requetes---------------------------------------------------------
*/

// fonction qui permet de se connecter a la BD
function connexionBd()
{
    // parametre de connexion a la BD
    $SERVER = '127.0.0.1';
    $DB = 'projet_sae';
    $LOGIN = 'root';
    $MDP = '';
    // tentative de connexion a la BD
    try {
        // connexion a la BD
        $linkpdo = new PDO("mysql:host=$SERVER;dbname=$DB", $LOGIN, $MDP);
    } catch (Exception $e) {
        die('Erreur ! Probleme de connexion a la base de donnees' . $e->getMessage());
    }
    return $linkpdo;
}

// fonction qui vérifie que les champs $_POST sont bien remplis
function champRempli($field)
{
    // parcoure la liste des champs 
    foreach ($field as $name) {
        // vérifie s'ils sont vides 
        if (empty($_POST[$name])) {
            return false; // au moins un champs vides
        }
    }
    return true; // champs remplis
}

// fonction qui permet d'enlever les balises de code dans les champs
function clean($champEntrant)
{
    $champEntrant = strip_tags($champEntrant); // permet d'enlever les balises html, xml, php
    $champEntrant = htmlspecialchars($champEntrant); // permet de transformer les balises html en *String
    return $champEntrant;
}

// fonction qui permet d'ajouter un enfant a la BD
function ajouterEnfant(
    $nom,
    $prenom,
    $dateNaissance,
    $lienJeton
) {

    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un enfant a la BD');
    }
    //execution de la requete sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':dateNaissance' => clean($dateNaissance),
        ':lienJeton' => clean($lienJeton)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un enfant a la BD');
    }
}

// fonction qui retourne les lignes si un enfant a le meme nom, prenom, date naissance qu'un enfant de la BD
function enfantIdentique(
    $nom,
    $prenom,
    $dateNaissance
) {
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qEnfantIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour verifier si un enfant existe deja');
    }
    //execution de la requete sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':dateNaissance' => clean($dateNaissance)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour verifier si un enfant existe deja');
    }
    return $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
}

// fonction qui retourne les lignes si un membre à le meme nom, prenom, date naissance et courriel qu'un membre de la BD
function membreIdentique(
    $nom,
    $prenom,
    $dateNaissance,
    $courriel
) {
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qMembreIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour verifier si un membre existe deja');
    }
    //execution de la requete sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':dateNaissance' => clean($dateNaissance),
        ':courriel' => clean($courriel)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour verifier si un membre existe deja');
    }
    return $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
}

// fonction qui permet d'ajouter un membre a la BD
function ajouterMembre(
    $nom,
    $prenom,
    $adresse,
    $codePostal,
    $ville,
    $courriel,
    $dateNaissance,
    $mdp,
    $pro
) {

    
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un membre a la BD');
    }
    //execution de la requete sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':adresse' => clean($adresse),
        ':codePostal' => clean($codePostal),
        ':ville' => clean($ville),
        ':courriel' => clean($courriel),
        ':dateNaissance' => clean($dateNaissance),
        ':mdp' => clean($mdp),
        ':pro' => clean($pro)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un membre a la BD');
    }
}

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre
function AfficherNomPrenomDateNaissanceCourrielBoutonSupprimerMembrePlusValidation()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // execution de la requete sql
    $req = $linkpdo->query($GLOBALS['qAfficherMembres']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete : query($GLOBALS['qAfficherMembres'])
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete : query($GLOBALS['qAfficherMembres'])
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Date_Naissance' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Compte_Valide') {
                $compteValide = $value;
            }
        }
        // permet de dire si un membre a son compte valide ou non 
        if ($compteValide == Null) {
            echo '<td><a href="gererMembre.php?id=' . $idMembre . '"><input type="checkbox" value="Valider"</a></td>'; // compte valide
        } else {
            echo '<td><input type="checkbox" checked  disabled="disabled"></td>'; // compte invalide
        }
        // creation du bouton supprimer dans le tableau
        echo '
            <td>
                <button type="submit" name="boutonSupprimer" value="' . $idMembre . '
                " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
                </button>
            </td>
        </tr>';
    }
}

// ---------------------------------------------------------------------------------------------------A revoir options input
// fonction qui permet d'afficher les informations du membre de la session
function AfficherInformationsMembreSession($idMembre)
{
    // recherche les informations d'un membre selon son idMembre
    $req = RechercherMembre($idMembre); // retoune le membre selon $idMembre
    // permet de parcourir la ligne de la requetes : RechercherMembre($idMembre);
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete : RechercherMembre($idMembre);
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Nom') {
                echo '<input type="text" name="champNom" value="' . $value . '" required>';
            } elseif ($key == 'Prenom') {
                echo '<input type="text" name="champPrénom" value="' . $value . '" required>';
            } elseif ($key == 'Adresse') {
                echo '<input type="text" name="champAdresse" value="' . $value . '" required>';
            } elseif ($key == 'Date_Naissance') {
                echo '<input type="date" name="champDateNaissance" value="' . $value . '" required>';
            } elseif ($key == 'Code_Postal') {
                echo '<input type="text" name="champCp" value="' . $value . '" required>';
            } elseif ($key == 'Ville') {
                echo '<input type="text" name="champVille" value="' . $value . '" required>';
            } elseif ($key == 'Pro') {
                echo '<input type="number" name="champPro" value="' . $value . '" required>';
            } elseif ($key == 'Mdp') {
                echo '<input type="text" name="champMdp"value="' . $value . '" required>';
            } elseif ($key == 'Courriel') {
                echo '<input type="email" name="champMail" value="' . $value . '" required>';
            }
        }
    }
}

// fonction qui permet de modifier les informations du membre de la session
function modifierMembreSession($idMembre, $nom, $prenom, $adresse, $codePostal, $ville, $courriel, $dateNaissance, $mdp, $pro)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qModifierInformationsMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations du membre de la 
            session');
    }
    //execution de la requete sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':adresse' => clean($adresse),
        ':codePostal' => clean($codePostal),
        ':ville' => clean($ville),
        ':courriel' => clean($courriel),
        ':dateNaissance' => clean($dateNaissance),
        ':mdp' => clean($mdp),
        ':pro' => clean($pro),
        ':idMembre' => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour permet de modifier les informations du membre de la 
            session');
    }
}

// fonction qui permet de supprimer un membre a partir de son idMembre
function supprimerMembre($idMembre)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour supprimer un membre de la BD');
    }
    //execution de la requete sql
    $req->execute(array(
        ':id' => $idMembre
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
    }
}

// fonction qui permet de rechercher un membre à partir de son idMembre
function rechercherMembre($idMembre)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour rechercher un membre dans la BD');
    }
    //execution de la requete sql
    $req->execute(array(
        ':id' => $idMembre
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour rechercher un membre dans la BD');
    }
    return $req; // retourne le membre correspondant a $idMembre
}

//----------------------------------------------------------------------------------------------------A revoir car pas fini
// fonction qui permet de valider le compte d'un membre 
function validerCompteMembre($idMembre)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    RechercherMembre($idMembre); // recherche du membre selon son idMembre pour valider son compte 
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherUnMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour valider le compte d\'un membre');
    }
    //execution de la requete sql
    $req->execute(array(
        ':id' => $idMembre
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour valider le compte d\'un membre');
    }
}

/*                                                                
                                                                          .                                                
                                                                          / V\                                               
                                                                       / `  /                                                
                                                                     <<    |                                                 
 ,_)/                                                                 /    |                                                 
   (-'                    ":"                                       /      |               ', ,'                                
.-'\                    ___:____     |"\/"|                       /        |            ,----'--------------------------.    
  "'\'"""""'),        ,'        `.    \  /                      /    \  \ /            ("""|```|```|```|```|```|```|``|` |   
    )/- -,(          |  O        \___/  |                      (      ) | |            |---'---'---'---'---'---'---'--'--|   
   / \  / |        ~^~^~^~^~^~^~^~^~^~^~^~^~          ________|   _/_  | |          __,_    ______           ______     |_o 
                                                    <__________\______)\__)            '---'(O)(O)'---------'(O)(O)'---'   
*/
