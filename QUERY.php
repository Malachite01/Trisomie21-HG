<?php

/*
* --------------------------------------------------------------------------------------------------------------------------
* -----------------------------------------------Liste des requetes---------------------------------------------------------
* --------------------------------------------------------------------------------------------------------------------------
*/

//? ----------------------------------------------Enfant---------------------------------------------------------------------

// requete pour ajouter un enfant a la BD
$qAjouterEnfant = 'INSERT INTO enfant (Nom,Prenom,Date_Naissance,Lien_Jeton) VALUES (:nom , :prenom, :dateNaissance, :lienJeton)';

// requete pour verifier qu'un enfant avec les données en parametre n'existe pas deja dans la BD
$qEnfantIdentique = 'SELECT Nom, Prenom, Date_Naissance FROM enfant WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance';

// requete pour supprimer un enfant de la BD selon son Id_Enfant
$qSupprimerEnfant = 'DELETE  FROM Enfant where Id_Enfant = :idEnfant';

// requete pour recuperer l'Id_enfant, l'image du jeton, le nom, le prenom et la date de naissance de tout les enfants de la BD
$qRecupererInformationEnfants = 'SELECT Id_Enfant, Lien_Jeton, Nom, Prenom, Date_Naissance From Enfant';

// requete pour recuperer l'Id_enfant, l'image du jeton, le nom, le prenom et la date de naissance d'un enfants de la BD
$qRecupererInformationUnEnfants = 'SELECT Id_Enfant, Lien_Jeton, Nom, Prenom, Date_Naissance From Enfant WHERE Id_Enfant = :idEnfant';

// requete pour recuperer le nom, prenom de tous les enfants ( trie par nom )
$qRecupererNomPrenomEnfant = 'SELECT Id_Enfant, Nom,Prenom FROM Enfant ORDER BY Nom';

// requete pour recuperer le nom, prenom d'un enfant selon son Id_Enfant
$qRecupererNomPrenomUnEnfant = 'SELECT Nom, Prenom FROM enfant WHERE Id_Enfant = :idEnfant';

// requete pour recuperer le nom prenom de tous les enfants que suis le membre de la session ( trie par nom )
$qRecupererNomPrenomEnfantEquipe = 'SELECT enfant.Id_Enfant, Nom,Prenom FROM Enfant,suivre WHERE enfant.Id_Enfant = suivre.Id_Enfant AND suivre.Id_Membre = :idMembre ORDER BY Nom';

// requete pour modifier l'image du jeton d'un enfant selon son Id_Enfant
$qModifierInformationsEnfant = 'UPDATE enfant SET Nom = :nom, Prenom = :prenom, Date_Naissance = :dateNaissance, Lien_Jeton = :lienJeton WHERE Id_Enfant = :idEnfant';


//? ----------------------------------------------Membre---------------------------------------------------------------------


// requete pour ajouter un membre a la BD
$qAjouterMembre = 'INSERT INTO membre (Nom,Prenom,Adresse,Code_Postal,Ville,Courriel,Date_Naissance,Mdp,Pro,Role) VALUES (:nom,:prenom,:adresse,:codePostal,:ville,:courriel,:dateNaissance,:mdp,:pro,:role)';

// requete pour vérifier qu'un membre avec les données en parametre n'existe pas deja dans la BD
$qMembreIdentique = 'SELECT Nom, Prenom, Date_Naissance, Courriel FROM membre WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance AND Courriel = :courriel';

// requete pour supprimer un membre de la BD
$qSupprimerMembre = 'DELETE FROM membre WHERE Id_Membre = :idMembre';

// requete pour valider le compte d'un membre de la BD
$qValiderMembre = 'UPDATE membre SET Compte_Valide = 1 WHERE Id_Membre = :idMembre';

// requete pour vérifier la validite du compte d'un membre selon son courriel dans la BD
$qVerifierValidationMembre = 'SELECT Id_Membre FROM Membre WHERE Courriel = :courriel AND Compte_Valide = 1';

// requete pour rechercher un membre dans la BD
$qRechercherUnMembre = 'SELECT Nom, Prenom, Adresse, Date_Naissance, Code_Postal, Ville, Pro, Mdp FROM membre WHERE Id_Membre = :idMembre';

// requete pour modifier les données d'un membre de la BD
$qModifierInformationsMembre = 'UPDATE membre SET Nom = :nom, Prenom = :prenom, Adresse = :adresse, Code_Postal = :codePostal, Ville = :ville, Date_Naissance = :dateNaissance WHERE Id_Membre = :idMembre';

// requete pour recuperer le prenom du membre connecté
$qRecupererPrenomMembre = 'SELECT Prenom FROM Membre WHERE Id_Membre = :idMembre';

// requete pour recuperer le prenom du membre connecté
$qRecupererNomPrenomMembre = 'SELECT Nom, Prenom FROM Membre WHERE Id_Membre = :idMembre';

// requete pour modifier le mot de passe du membre de connexion
$qModifierMotDePasse = 'UPDATE membre SET Mdp = :mdp WHERE Id_Membre = :idMembre';

// requete pour recuperer le mot de passe d'un membre selon son courriel
$qRecupererMotDePasse = 'SELECT Mdp FROM membre WHERE Courriel = :courriel';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des membres de la BD
$qRecupererInformationsMembres = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des  membres de la BD ( trie par Nom croissant puis prenom croissant )
$qRecupererInformationsMembresAZ = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Nom, Prenom';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des membres de la BD ( trie par Nom decroissant puis prenom croissant )
$qRecupererInformationsMembresZA = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Nom DESC, Prenom';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des membres de la BD ( trie par date naissance croissante puis nom puis prenom )
$qRecupererInformationsMembresDateNaissanceCroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Date_Naissance, Nom, Prenom';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des membres de la BD ( trie par date naissance decroissante puis nom puis prenom )
$qRecupererInformationsMembresDateNaissanceDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Date_Naissance DESC , Nom, Prenom';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des membres de la BD ( trie par validation croissant puis nom puis prenom )
$qRecupererInformationsMembresCompteValideCroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Compte_Valide, Nom, Prenom';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des membres de la BD ( trie par validation decroissant puis nom puis prenom )
$qRecupererInformationsMembresCompteValideDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Compte_Valide DESC, Nom, Prenom';

// requete pour recuperer l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des membres de la BD ( trie par Id_Membre decroissant )
$qRecupererInformationsMembresIdMembreDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Id_Membre DESC';

$qRecupererIdMembre = 'SELECT Id_Membre FROM membre WHERE courriel = :courriel';

//? ----------------------------------------------Objectif-------------------------------------------------------------------


// requete pour ajouter un objectif a la BD
$qAjouterObjectif = 'INSERT INTO objectif (Intitule, Nb_Jetons, Duree,Lien_Image,Travaille,Id_Membre,Id_Enfant) VALUES (:intitule, :nbJetons, :duree, :lienObjectif, :travaille, :idMembre, :idEnfant)';

// requete pour vérifier qu'un objectif n'est pas deja present dans la BD pour un enfant donne
$qObjectifIdentique = 'SELECT Intitule FROM objectif WHERE Intitule = :intitule AND Id_Enfant = :idEnfant';

// requete pour recuperer les informations des objectifs de la BD selon un Id_Enfant
$qRecupererInformationsObjectifs = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Travaille, Nb_Jetons_Places, Nb_Jetons  FROM objectif WHERE Id_Enfant = :idEnfant';

// requete pour recuperer les informations des objectifs de la BD selon un Id_Enfant et qui sont "en cours"
$qRecupererInformationsObjectifsEnCours = 'SELECT Id_Objectif, Nb_Jetons_Places, Nb_Jetons, Lien_Image, Intitule, Duree   FROM objectif WHERE Id_Enfant = :idEnfant AND Travaille = 1';

// requete pour recuperer Nb_Jetons_Places, Nb_Jetons d'un objectif en cours selon son Id_Objectif 
$qRecupererJetonsUnObjectif = 'SELECT Nb_Jetons_Places, Nb_Jetons FROM objectif WHERE Id_Objectif = :idObjectif AND Travaille = 1';

// requete pour recuperer les informations d'un objectif pour un enfant ( trie par intitule )
$qRecupererInformationsObjectifsAZ = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule';

// requete pour recuperer les informations d'un objectif pour un enfant ( trie par intitule decroissant )
$qRecupererInformationsObjectifsZA = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule DESC';

// requete pour recuperer les informations d'un objectif pour un enfant ( trie par duree )
$qRecupererInformationsObjectifsDureeCroissante = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Duree';

// requete pour recuperer les informations d'un objectif pour un enfant ( trie par duree decroissante )
$qRecupererInformationsObjectifsDureeDecroissante = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Duree DESC';

// requete pour recuperer les informations d'un objectif pour un enfant ( trie par statut )
$qRecupererInformationsObjectifsStatutCroissant = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Travaille';

// requete pour recuperer les informations d'un objectif pour un enfant ( trie par statut decroissant )
$qRecupererInformationsObjectifsStatutDecroissant = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Travaille DESC';

//requete pour modifier un objectif
$qModifierInformationsObjectif = 'UPDATE objectif SET Intitule = :intitule, Nb_Jetons = :nbJetons, Duree = :duree, Lien_Image = :lienImage, Travaille = :travaille, Id_Membre = :idMembre WHERE id_Objectif = :idObjectif';

// requete pour supprimer un objectif selon son Id_Objectif
$qSupprimerObjectif = 'DELETE FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour recuperer les informations d'un objectif selon son Id_Objectif
$qRecupererInformationsUnObjectif = 'SELECT Id_Objectif, Intitule, Duree, Travaille, Lien_Image, Nb_Jetons_Places, Nb_Jetons  FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour recuperer l'image d'un objectif 
$qRecupererImageObjectif = 'SELECT Lien_Image FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour recuperer le nombre de jetons pour un objectif selon son Id_Objectif
$qRecupererNombreDeJetons = 'SELECT Nb_Jetons FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour recuperer le nombre de jetons places pour un objectif selon son Id_Objectif
$qRecupererNombreDeJetonsPlaces = 'SELECT Nb_Jetons_Places FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour modifier le nombre de jetons places pour un objectif selon son Id_Objectif
$qAjouterJetonsPlaces = 'UPDATE objectif set Nb_Jetons_Places = Nb_Jetons_Places+1 WHERE Id_Objectif = :idObjectif';

$qSupprimerJetonsPlaces = 'UPDATE objectif set Nb_Jetons_Places = Nb_Jetons_Places-1 WHERE Id_Objectif = :idObjectif';

$qSupprimerPlacerJetons = 'DELETE FROM placer_jeton WHERE Id_Objectif = :idObjectif AND Date_Heure = (select max(Date_Heure) from placer_jeton)';

// requete pour mettre a null l'Id_Membre dans les objectifs selon son Id_Membre
$qSupprimerIdMembreObjectif = 'UPDATE objectif SET Id_Membre = NULL WHERE Id_Membre = :idMembre';

// requete pour recuperer l'intitule d'un objectif selon son Id_Enfant ( trie par intitule )
$qRecupererIntituleObjectif = 'SELECT Id_Objectif, Intitule FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule';

// requete pour recuperer l'intitule d'un objectif selon son Id_Objectif
$qRecupererUnIntituleObjectif = 'SELECT Intitule FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour supprimer l'image d'un objectif selon son Id_Objectif
$qSupprimerImageObjectif = 'SELECT Lien_Image from Objectif WHERE Id_Objectif = :idObjectif';

$qReinitialiserObjectif = 'UPDATE objectif set Nb_Jetons_Places = 0,, Temps_Restant=0 WHERE Id_Objectif = :idObjectif';
//! !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qSupprimerImageRecompense = 'SELECT Lien_Image from Objectif WHERE Id_Objectif = :idObjectif';

$qRecupererDureeUnObjectif = 'SELECT Duree FROM objectif WHERE Id_Objectif = :idObjectif';

$qAjouterTempsRestantUnObjectif = 'UPDATE objectif SET Temps_Debut = :tempsRestant WHERE Id_Objectif = :idObjectif';

$qRecupererTempsRestantUnObjectif = 'SELECT Temps_Debut FROM objectif WHERE Id_Objectif = :idObjectif';

//? ----------------------------------------------Recompense-----------------------------------------------------------------

// requete pour ajuter une recompense a la BD
$qAjouterRecompense = 'INSERT INTO recompense (Intitule,Lien_Image,Descriptif) 
                        VALUES (:intitule,:lienImage,:descriptif)';
$qAjouterLienRecompenseObj = 'INSERT INTO lier (lier.Id_Objectif,lier.Id_Recompense) VALUES (:idObjectif,:idRecompense)';


// requete pour rechercher une recompense selon son Id_Recompense
$qRechercherRecompense = 'SELECT Id_Recompense, Intitule, Descriptif, Lien_Image FROM Recompense WHERE id_Recompense = :idRecompense';

// requete pour modifier les informations d'une recompense selon son Id_Recompense
$qModifierRecompense = 'UPDATE recompense SET Intitule = :intitule, Lien_Image = :lienImage, Descriptif = :descriptif 
                         WHERE id_Recompense = :idRecompense';

$qAfficherImageRecompense = 'SELECT Lien_Image FROM recompense WHERE Id_Recompense = :idRecompense';

// requete pour supprimer une recompense selon son id
$qSupprimerRecompense = 'DELETE FROM Recompense WHERE Id_Recompense = :idRecompense';

// requete pour afficher toutes les recompenses d'un enfant donne
$qAfficherRecompense = 'SELECT recompense.Id_Recompense, recompense.Lien_Image, recompense.Intitule, recompense.Descriptif FROM recompense, lier, enfant, objectif WHERE recompense.Id_Recompense = lier.Id_Recompense AND lier.Id_Objectif = objectif.Id_Objectif AND enfant.Id_Enfant = objectif.Id_Enfant AND enfant.Id_Enfant = :idEnfant';


// requete pour afficher toutes les informations d'un objectif selon son idObjectif
$qAfficherObjectifSelonId = 'SELECT Intitule, Nb_Jetons, Duree, Lien_Image, Nb_Jetons_Places FROM objectif WHERE Id_Objectif = :idObjectif';

$qRechercherIdRecompenseSelonIntitule = 'SELECT Id_Recompense FROM recompense WHERE Intitule = :intitule';

$qAfficherRecompenseSelonObjectif = 'SELECT recompense.Lien_Image, recompense.Intitule, recompense.Descriptif, recompense.Id_Recompense FROM recompense, lier, objectif WHERE objectif.Id_Objectif = lier.Id_Objectif AND lier.Id_Recompense = recompense.Id_Recompense AND lier.ID_Objectif = :idObjectif';

//? ----------------------------------------------Tableau de Bord-----------------------------------------------------------------
$qAfficherImageTampon = 'SELECT Lien_Jeton from Enfant WHERE Id_Enfant = :idEnfant';

//?--------------------------------Equipe---------------------------------------------------------------------------
$qAjouterUneEquipe = 'INSERT INTO suivre (Id_Enfant,Id_Membre,Date_Demande_Equipe,Role) 
VALUES (:idEnfant,:idMembre,FROM_UNIXTIME(:dateDemandeEquipe),:role)';

$qAfficherNomPrenomMembre = 'SELECT Id_Membre, Nom,Prenom FROM Membre ORDER BY Nom';

$qAfficherEquipe = 'SELECT suivre.Role, membre.Nom,membre.Prenom,suivre.Id_Membre,suivre.Id_Enfant from membre,suivre,enfant WHERE membre.Id_Membre = suivre.Id_Membre AND
suivre.Id_Enfant = enfant.Id_Enfant AND enfant.Id_Enfant = :idEnfant';

$qSupprimerUnMembreEquipe = 'DELETE FROM suivre WHERE suivre.Id_Enfant = :idEnfant AND suivre.Id_Membre =:idMembre';
//?----------------------------------------------------MESSAGE-----------------------------------------------------------------
$qAjouterMessage = 'INSERT INTO message (Sujet,Corps,Date_Heure,Id_Objectif,Id_Membre) VALUES (:sujet,:corps,FROM_UNIXTIME(:dateHeure),:idObjectif,:idMembre)';

$qAfficherMessage = 'SELECT message.Id_Membre, membre.Nom,membre.Prenom, objectif.Intitule,message.Sujet,message.Corps,DATE_FORMAT(message.Date_Heure, "%d %b %H:%i") AS Date_Heure FROM objectif,message,membre,suivre,enfant WHERE  message.Id_Objectif = objectif.Id_Objectif AND
                        message.Id_Membre = membre.Id_Membre AND membre.Id_Membre = suivre.Id_Membre 
                        AND suivre.Id_Enfant = enfant.Id_Enfant AND objectif.Id_Enfant = enfant.Id_Enfant AND suivre.Id_Enfant = :idEnfant ORDER BY message.Date_Heure';
$qAfficherMessageParObjectif = 'SELECT message.Id_Membre,membre.Nom,membre.Prenom, objectif.Intitule,message.Sujet,message.Corps,DATE_FORMAT(message.Date_Heure, "%d %b %H:%i")AS Date_Heure FROM objectif,message,membre,suivre,enfant WHERE  message.Id_Objectif = objectif.Id_Objectif AND
message.Id_Membre = membre.Id_Membre AND membre.Id_Membre = suivre.Id_Membre 
AND suivre.Id_Enfant = enfant.Id_Enfant AND objectif.Id_Enfant = enfant.Id_Enfant AND suivre.Id_Enfant = :idEnfant AND objectif.Id_Objectif = :idObjectif ORDER BY message.Date_Heure';

$qMessageIdentique = 'SELECT Sujet, Corps, Id_Objectif, Id_Membre FROM message WHERE Sujet = :sujet AND Corps = :Corps AND Id_Objectif = :idObjectif AND Id_Membre = :idMembre';

//?---------------------------------------------PLACER JETON-----------------------------------------------------------------------------------
$qAjouterJeton = 'INSERT INTO placer_jeton (Id_Objectif,Date_Heure,Id_Membre,Jetons) VALUES (:idObjectif,:dateHeure,:idMembre,:jetons)';

$qRechercherEnfant = 'SELECT Id_Enfant, Lien_Jeton, Nom, Prenom, Date_Naissance FROM enfant WHERE nom LIKE ? ';

$qRechercherMembre = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre Where nom LIKE ?';

$qRechercherIdMembreMessage = 'SELECT Id_Membre From message ';

$qNombreJetonsPlaces = '';

//?------------------------------------------------PARTIE ADMIN-----------------------------------------------

//$qAjouterCompteAdmin = 'INSERT INTO admin (Id_Admin,Nom,Prenom,Adresse,Code_Postal,Ville,Courriel,Date_Naissance,Mdp,Role) VALUES (:idAdmin,:nom,:prenom,:adresse,:codePostal,:ville,:courriel,:dateNaissance,:mdp,:role)';

//$qSupprimerCompteAdmin = 'DELETE  FROM admin where Id_Admin = :idAdmin';

//$qVerifierValidationAdmin = 'SELECT Id_Admin FROM admin WHERE courriel = :courriel';
//----------------------------------------------------------------------------------------------------------------------------
/*
/ --------------------------------------------------------------------------------------------------------------------------
/ -----------------------------------------------Liste des fonctions--------------------------------------------------------
/ --------------------------------------------------------------------------------------------------------------------------
*/

//! -----------------------------------------------GENERALES-----------------------------------------------------------------

// fonction qui permet de se connecter a la BD
function connexionBd()
{
    // parametre de connexion a la BD
    // cDRvPP\2mwea(LGp
    // https://test-saetrisomie21.000webhostapp.com/
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

function saltHash($mdp)
{
    $code = $mdp . 'BrIc3 4rNaUlT 3sT &$ Le MeIlLeUr d3s / pRoFesSeUrs DU.Mond3 !';
    return password_hash($code, PASSWORD_DEFAULT);
}

function uploadImage($photo)
{

    if (isset($photo)) {
        $tmpName = $photo['tmp_name'];
        $name = $photo['name'];
        $size = $photo['size'];
        $error = $photo['error'];

        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));

        $extensions = ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp', 'bmp'];
        $maxSize = 4000000;

        if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {

            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName . "." . $extension;
            $chemin = "upload/";
            //$file = 5f586bf96dcd38.73540086.jpg
            move_uploaded_file($tmpName, 'upload/' . $file);
            $result = $chemin . $file;
        }
    } else {
        echo '<h1>erreur</h1>';
    }
    if (!isset($result)) {
        return null;
    }
    return $result;
}

function faireMenu()
{
    // $effacer = ["/leSite/", ".php", "?params=suppr"];
    // $get_url = str_replace($effacer, "", $_SERVER['REQUEST_URI']);


    $get_url = $_SERVER['REQUEST_URI'];
    $idAChercher = "";
    if (stripos($get_url, "tableau")) {
        $idAChercher = "tableauDeBord";
    } else if (stripos($get_url, "enfant")) {
        $idAChercher = "Enfants";
    } else if (stripos($get_url, "membre")) {
        $idAChercher = "Membres";
    } else if (stripos($get_url, "objectif")) {
        $idAChercher = "Objectifs";
    } else if (stripos($get_url, "recompense")) {
        $idAChercher = "Recompenses";
    } else if (stripos($get_url, "equipe")) {
        $idAChercher = "Equipe";
    }
    echo ' <nav class="navbar">
    <div class="fondMobile"></div>
    <a href="tableauDeBord.php"><img src="images/logo.png" alt="logo" class="logo"></a>
    
    <div class="nav-links">
      <ul class="nav-ul">';
    if ($_SESSION['role'] != 2) {
        echo
        '
            <li><a href="tableauDeBord.php" id="tableauDeBord">Tableau de bord</a></li>
    
            <div class="separateur"></div>
    ';
    }
    if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) {
        echo
        '     
            <li><a href="#" id="Enfants">Enfants</a>
                <ul class="sousMenu">
                    <li><a href="ajouterEnfant.php" >Ajouter un enfant</a></li>
                    <li><a href="gererEnfant.php" >Gérer les enfants</a></li>
                </ul>
            </li>        
            
            <div class="separateur"></div>
    ';
    }
    if ($_SESSION['role'] == 2 || $_SESSION['role'] == 3) {
        echo '     
            <li><a href="#" id="Membres">Membres</a>
                <ul class="sousMenu">
                    <li><a href="gererMembre.php">Gérer les membres</a></li>
                    <li><a href="ajouterAdmin.php">Ajouter un membre Admin</a></li>
                </ul>
            </li>

            <div class="separateur"></div>
    ';
    }
    if ($_SESSION['role'] != 0) {
        echo '
            <li><a href="#" id="Equipe">Equipe</a>
                <ul class="sousMenu">
                    <li><a href="ajouterEquipe.php">Ajouter un enfant à une équipe</a></li>
                    <li><a href="gererEquipe.php">Gérer une équipe</a></li>
                    <li><a href="equipe.php">Équipe</a></li>
                </ul>
            </li>    
            
            <div class="separateur"></div>
    ';
    }
    echo '        
            <li><a href="#" id="Objectifs">Objectifs</a>
                <ul class="sousMenu">
                    <li><a href="ajouterObjectif.php">Ajouter un objectif</a></li>
                    <li><a href="gererObjectifs.php">Gérer les objectifs</a></li>
                </ul>
            </li>

            <div class="separateur"></div>

            <li><a href="#" id="Recompenses">Récompenses</a>
                <ul class="sousMenu">
                    <li><a href="ajouterRecompense.php">Ajouter une récompense</a></li>
                    <li><a href="gererRecompense.php">Gérer les récompenses</a></li>
                </ul>
            </li>
            
            <div class="separateur"></div>

            <li>
                <div id="centerDeconnexion">
                    <a href="modifierProfil.php" class="centerProfil"><p class="txtBoutonDeconnexion">' . $_SESSION['prenomMembre'] . '</p><img src="images/profil.png" alt="profil" class="imageIcone"></a>
                    <a href="deconnexion.php" class="lienBoutonDeconnexion"><button name="boutonDeco" class="boutons" id="boutonDeconnexion"><img src="images/logout.png" id="imgDeconnexion" class="imageIcone" alt="icone déconnexion"><span class="txtBoutonDeconnexion">Déconnexion</span></button></a>
                </div>
            </li>
          </ul>
        </div>
        
        <img src="images/menu.png" onclick="menuMobile(\'nav-links\')" alt="barre de menu" class="menu-hamburger">
        
    </nav>';

    echo '
    <script>
        var elementActif = document.querySelector("#' . $idAChercher . '");
        elementActif.classList.add("active");
    </script>';
}

function dureeString($duree)
{
    $s = intdiv($duree, 168);
    $duree -= 168 * $s;
    $j = intdiv($duree, 24);
    $duree -= 24 * $j;
    $h = intdiv($duree, 1);
    if ($s != 0) {
        if ($s == 1) {
            $s = $s . ' semaine ';
        } else {
            $s = $s . ' semaines ';
        }
    } else {
        $s = null;
    }
    if ($j != 0) {
        if ($j == 1) {
            $j = $j . ' jour ';
        } else {
            $j = $j . ' jours ';
        }
    } else {
        $j = null;
    }
    if ($h != 0) {
        if ($h == 1) {
            $h = $h . ' heure ';
        } else {
            $h = $h . ' heures ';
        }
    } else {
        $h = null;
    }
    return  $s . $j . $h;
}

function dureeStringMinutes($duree)
{
    $w = intdiv($duree, 10080);
    $duree -= 10080 * $w;
    $j = intdiv($duree, 1440);
    $duree -= 1440 * $j;
    $h = intdiv($duree, 60);
    $duree -= 60 * $h;
    $s = intdiv($duree, 1);
    if ($w != 0) {
        if ($w == 1) {
            $w = $w . ' semaine ';
        } else {
            $w = $w . ' semaines ';
        }
    } else {
        $w = null;
    }
    if ($j != 0) {
        if ($j == 1) {
            $j = $j . ' jour ';
        } else {
            $j = $j . ' jours ';
        }
    } else {
        $j = null;
    }
    if ($h != 0) {
        if ($h == 1) {
            $h = $h . ' heure ';
        } else {
            $h = $h . ' heures ';
        }
    } else {
        $h = null;
    }
    if ($s != 0) {
        if ($s == 1) {
            $s = $s . ' minute ';
        } else {
            $s = $s . ' minutes ';
        }
    } else {
        $s = null;
    }
    return  $w . $j . $h . $s;
}
function testConnexion()
{
    if ($_SESSION['idConnexion'] == null) {
        header('Location: index.php');
    }
    $get_url = $_SERVER['REQUEST_URI'];
    if (stripos($get_url, "upload")) {
        header('Location: index.php');
    }

    $get_url = $_SERVER['REQUEST_URI'];
    if (stripos($get_url, "tableau") && $_SESSION['role'] == 2) {
        header('Location:modifierProfil.php');
    } else if (stripos($get_url, "enfant") && ($_SESSION['role'] == 0 || $_SESSION['role'] == 1)) {
        header('Location: tableauDeBord.php');
    } else if (stripos($get_url, "membre") && ($_SESSION['role'] == 0 || $_SESSION['role'] == 1)) {
        header('Location: tableauDeBord.php');
    } else if (stripos($get_url, "equipe") && $_SESSION['role'] == 0) {
        header('Location: tableauDeBord.php');
    }
}
function rechercherEnfant($champ)
{
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour rechercher les information de enfant');
    }
    // execution de la requete sql
    $req->execute(array("%" . $champ . "%"));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    if ($req->rowCount() == 0) {
        return 0;
    } else {
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la requete
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Nom' || $key == 'Prenom') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Date_Naissance') {
                    echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
                }
                if ($key == 'Lien_Jeton') {
                    echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
                }
                // recuperation valeurs importantes dans des variables
                if ($key == 'Id_Enfant') {
                    $idEnfant = $value;
                }
            }
            // creation du bouton supprimer dans le tableau
            echo '
            <td>
                <button type="submit" name="boutonModifier" value="' . $idEnfant . '" 
                class="boutonModifier" formaction="modifierEnfant.php">
                    <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                    <span>Modifier</span>
                </button>
             </td>
                 <td>
                     <button type="submit" name="boutonSupprimer" value="' . $idEnfant . '
                     " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet enfant ?\');" >
                         <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                         <span>Supprimer</span>
                     </button>
                 </td>
             </tr>';
        }
        return 1;
    }
    // permet de parcourir toutes les lignes de la requete

}
function rechercheMembre($champ)
{
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour rechercher les information de enfant');
    }
    // execution de la requete sql
    $req->execute(array("%" . $champ . "%"));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    if ($req->rowCount() == 0) {
        return 0;
    } else {
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            // permet de parcourir toutes les colonnes de la requete
            foreach ($data as $key => $value) {
                // selectionne toutes les colonnes $key necessaires
                if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                    echo '<td>' . $value . '</td>';
                }
                if ($key == 'Date_Naissance') {
                    echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
                echo '
                <td>
                    <button type="submit" name="boutonValider" value=' . $idMembre . '
                    class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                        <img src="images/valider.png" class="imageIcone" alt="icone valider">
                        <span>Valider</span>
                    </button>
                </td>';  // compte doit etre validé
            } else {
                echo '
                <td>
                    <p style="color: green">Compte valide !</p>
                </td>'; // compte valide donc bouton innactif
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
    return 1;
}
//! -----------------------------------------------ENFANT--------------------------------------------------------------------

// fonction qui permet d'ajouter un enfant a la BD
function ajouterEnfant($nom, $prenom, $dateNaissance, $lienJeton)
{

    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un enfant a la BD');
    }
    // execution de la requete sql
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
function enfantIdentique($nom, $prenom, $dateNaissance)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qEnfantIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour verifier si un enfant existe deja');
    }
    // execution de la requete sql
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

// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html) et envoie le form direct
function afficherNomPrenomEnfantSelect($enfantSelect)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idEnfant" required>';
    echo '<option value="">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}

// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html)
function afficherNomPrenomEnfantSubmit($enfantSelect)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idEnfant" onchange="this.form.submit()">';
    echo '<option value="0">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}
// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html) et envoie le form direct
function afficherNomPrenomEnfantEquipe($enfantSelect, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfantEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idMembre' => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idEnfant" required>';
    echo '<option value="">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}

// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html)
function afficherNomPrenomEnfantSubmitEquipe($enfantSelect, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomEnfantEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idMembre' => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idEnfant" onchange="this.form.submit()">';
    echo '<option value="0">Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom' && $idEnfant == $enfantSelect) {
                echo '<option value=' . $idEnfant . ' selected>' . $nom . " " . $value . '</option>';
            } else if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}
function modifierInformationsEnfant($nom, $prenom, $dateNaissance, $lienJeton, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qModifierInformationsEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un enfant a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':dateNaissance' => clean($dateNaissance),
        ':lienJeton' => clean($lienJeton),
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un enfant a la BD');
    }
}
function afficherImageTampon($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherImageTampon']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher une image');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher une image');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            return $value;
        }
    }
}
function afficherInformationsEnfant()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationEnfants']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
            }
            if ($key == 'Lien_Jeton') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            // recuperation valeurs importantes dans des variables
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
        }
        // creation du bouton supprimer dans le tableau
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idEnfant . '" 
            class="boutonModifier" formaction="modifierEnfant.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
         </td>
             <td>
                 <button type="submit" name="boutonSupprimer" value="' . $idEnfant . '
                 " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet enfant ?\');" >
                     <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                     <span>Supprimer</span>
                 </button>
             </td>
         </tr>';
    }
}
function supprimerEnfant($idEnfant)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qSupprimerEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour supprimer un enfant de la BD');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un enfant de la BD');
    }
}

function nomPrenomEnfant($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomUnEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => $idEnfant));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
            }
        }
    }
    return ' - ' . $nom . ' ' . $prenom;
}

function afficherInformationsEnfantModification($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationUnEnfants']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher une image');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher une image');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Nom') {
                echo '<label for="champNom">Nom :</label>
                <input type="text" name="champNom" placeholder="Entrez votre nom" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            }
            if ($key == 'Prenom') {
                echo '<label for="champPrénom">Prénom :</label>
                <input type="text" name="champPrénom" placeholder="Entrez votre prénom" minlength="1" maxlength="50" value="' . $value . '"required>
                <span></span>';
            }
            if ($key == 'Date_Naissance') {
                echo '<label for="champDateDeNaissance">Date de naissance :</label>
                <input type="date" name="champDateDeNaissance" id="champDateDeNaissance" min="1900-01-01" max="<?php echo date(\'Y-m-d\'); ?>" value="' . $value . '" required>
                <span></span>';
            }
        }
    }
}


//! -----------------------------------------------MEMBRE--------------------------------------------------------------------

// fonction qui permet d'ajouter un membre a la BD
function ajouterMembre($nom, $prenom, $adresse, $codePostal, $ville, $courriel, $dateNaissance, $mdp, $pro, $role)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un membre a la BD');
    }
    // execution de la requete sql
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
        ':role' => clean($role)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un membre a la BD');
    }
}

// fonction qui retourne les lignes si un membre a le meme nom, prenom, date naissance et courriel qu'un membre de la BD
function membreIdentique($nom, $prenom, $dateNaissance, $courriel)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qMembreIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour verifier si un membre existe deja');
    }
    // execution de la requete sql
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre
function AfficherMembres()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresIdMembreDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par Nom croissant puis prenom croissant
function AfficherMembresAZ()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresAZ']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par Nom décroissant puis prenom croissant
function AfficherMembresZA()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresZA']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par date de naissance croissante puis nom puis prenom
function AfficherMembresDateNaissanceCroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresDateNaissanceCroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par date de naissance decroissante puis nom puis prenom
function AfficherMembresDateNaissanceDecroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresDateNaissanceDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par validation croissante puis nom puis prenom
function AfficherMembresCompteValideCroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresCompteValideCroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par validation decroissante puis nom puis prenom
function AfficherMembresCompteValideDecroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembresCompteValideDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre le tout trie par Id_Membre decroissante
function AfficherMembresIdMembreDecroissante()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsMembres']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nom' || $key == 'Prenom' || $key == 'Courriel') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Date_Naissance') {
                echo '<td>' . date('d/m/Y', strtotime($value)) . '</td>';
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
            echo '
            <td>
                <button type="submit" name="boutonValider" value=' . $idMembre . '
                class="boutonValiderMembre" onclick="return confirm(\'Êtes vous sûr de vouloir valider ce membre ?\');">
                    <img src="images/valider.png" class="imageIcone" alt="icone valider">
                    <span>Valider</span>
                </button>
            </td>';  // compte doit etre validé
        } else {
            echo '
            <td>
                <p style="color: green">Compte valide !</p>
            </td>'; // compte valide donc bouton innactif
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

// fonction qui permet de valider un membre a partir de son id
function validerMembre($idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qValiderMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour valider le compte membre');
    }
    // execution de la requete sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour valider le compte membre');
    }
}

// fonction qui permet de vérifier si un membre est validé ou non avant de se connecter
function verifierValidationMembre($courriel)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qVerifierValidationMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour vérifier la validité du membre');
    }
    // execution de la requete sql
    $req->execute(array(':courriel' => clean($courriel)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour vérifier la validité du membre');
    }
    if ($req->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

// ---------------------------------------------------------------------------------------------------A finir
// fonction qui permet d'afficher le prenom d'un membre (barre menu)
function afficherPrenomMembre($idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererPrenomMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour vérifier la validité du membre');
    }
    // execution de la requete sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour vérifier la validité du membre');
    }
    return $req;
}

// fonction qui permet d'afficher le prenom d'un membre (barre menu)
function afficherNomPrenomMembreMessage($idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNomPrenomMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour vérifier la validité du membre');
    }
    // execution de la requete sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour vérifier la validité du membre');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete 
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
            }
            return $nom . '.' . $prenom;
        }
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
    // execution de la requete sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour rechercher un membre dans la BD');
    }
    return $req; // retourne le membre correspondant a $idMembre
}

// ---------------------------------------------------------------------------------------------------A revoir commentaire
// fonction qui permet d'afficher les informations du membre de la session
function AfficherInformationsMembreSession($idMembre)
{
    // recherche les informations d'un membre selon son idMembre
    $req = rechercherMembre($idMembre); // retoune le membre avec ses informations selon $idMembre
    // permet de parcourir la ligne de la requetes 
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete 
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Nom') {
                echo '<label for="champNom">Nom :</label>
                <input type="text" name="champNom" placeholder="Entrez votre nom" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Prenom') {
                echo '<label for="champPrénom">Prénom :</label>
                <input type="text" name="champPrénom" placeholder="Entrez votre prénom" minlength="1" maxlength="50" value="' . $value . '"required>
                <span></span>';
            } elseif ($key == 'Adresse') {
                echo '<label for="champAdresse">Adresse :</label>
                <input type="text" name="champAdresse" placeholder="Entrez votre adresse" maxlength="50" value="' . $value . '"  required>
                <span></span>';
            } elseif ($key == 'Date_Naissance') {
                echo '<label for="champDateDeNaissance">Date de naissance :</label>
                <input type="date" name="champDateDeNaissance" id="champDateDeNaissance" min="1900-01-01" max="<?php echo date(\'Y-m-d\'); ?>" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Code_Postal') {
                echo '
                <label for="champCp">Code postal :</label>
                <input type="text" name="champCp" placeholder="Entrez votre code postal" value=' . $value . ' oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');" maxlength="5" required>
                <span></span>';
            } elseif ($key == 'Ville') {
                echo '<label for="champVille">Ville :</label>
                <input type="text" name="champVille" placeholder="Entrez votre ville" maxlength="50" value="' . $value . '"  required>
                <span></span>';
            } elseif ($key == 'Mdp') {
                //probleme ici si null il faut aussi 0
                echo '<label for="champMdp">Mot de passe :</label>
                <input type="text" name="champMdp" id="champMdpNonModifiable" value="********" readonly>
                <span></span>
                <a href="modifierMdp.php" class="texteAccueil"> Changer votre mot de passe ?</a>';
                echo '<span></span><p id="messageVerifMdp" style="color: red;"></p><span></span>';
            }
        }
    }
}

// fonction qui permet de modifier les informations du membre de la session
function modifierMembreSession($idMembre, $nom, $prenom, $adresse, $codePostal, $ville, $dateNaissance)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qModifierInformationsMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations du membre de la 
            session');
    }
    // execution de la requete sql
    $req->execute(array(
        ':nom' => clean($nom),
        ':prenom' => clean($prenom),
        ':adresse' => clean($adresse),
        ':codePostal' => clean($codePostal),
        ':ville' => clean($ville),
        ':idMembre' => clean($idMembre),
        ':dateNaissance' => clean($dateNaissance)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour permet de modifier les informations du membre de la 
            session');
    }
}

function supprimerIdMembreDansObjectif($idMembre)
{
    $linkpdo = connexionBd();
    // preparation de la requete sql
    //on supprime les liens avec Objectif
    $req = $linkpdo->prepare($GLOBALS['qSupprimerIdMembreObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour supprimer tous les idObj de la BD');
    }

    $req->execute(array(':idMembre' => clean($idMembre)));
    // $req->debugDumpParams();
}

// fonction qui permet de supprimer un membre a partir de son idMembre
function supprimerMembre($idMembre)
{
    supprimerIdMembreDansObjectif($idMembre);
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qSupprimerMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour supprimer un membre de la BD');
    }
    // execution de la requete sql
    $req->execute(array(':idMembre' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
    }
}

function modifierMdp($mdp, $idMembre)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qModifierMotDePasse']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour supprimer un membre de la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':mdp' => saltHash($mdp),
        ':idMembre' => $idMembre
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
    }
}

function recupererMdp($courriel)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    //on supprime le membre
    $req = $linkpdo->prepare($GLOBALS['qRecupererMotDePasse']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour supprimer un membre de la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':courriel' => $courriel
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete 
        foreach ($data as $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            return $value;
        }
    }
}

//! -----------------------------------------------OBJECTIF------------------------------------------------------------------

// fontion qui permet d'ajouter un objectif a la BD
function ajouterObjectif($intitule, $nbJetons, $duree, $lienObjectif, $travaille, $idMembre, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':nbJetons' => clean($nbJetons),
        ':duree' => clean($duree),
        ':lienObjectif' => clean($lienObjectif),
        ':travaille' => clean($travaille),
        ':idMembre' => clean($idMembre),
        ':idEnfant' => clean($idEnfant)
    ));

    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
}

// fonction qui retourne les lignes si un membre a le meme nom, prenom, date naissance et courriel qu'un membre de la BD
function objectifIdentique($intitule, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qObjectifIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour verifier si un membre existe deja');
    }
    // execution de la requete sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour verifier si un membre existe deja');
    }
    return $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
}

// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherGererObjectifs($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifs']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . dureeString($value) . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                if ($value == 1) {
                    echo '<td>En cours</td>';
                } else if ($value == 2) {
                    echo '<td>A venir</td>';
                } else {
                    echo '<td>Aucun</td>';
                }
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}



// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherObjectifs($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsEnCours']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    $res = 0;
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="objectif">';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Intitule') {
                echo '<h3 class="titreObjectif">' . $value . '</h3>';
            }
            if ($key == 'Duree') {
                echo '<div class="dureeObjectifs"><div class="centerIconeTemps"><img class="imageIcone" src="images/chrono.png" alt="chronometre"><p>' . dureeString($value) . '</p></div><span></span></div><br>';
                if ($res == 1) {
                    echo '<p class="jetonsRestant"">' . $res . ' jeton à valider:</p>';
                } else if ($res == 0) {
                    echo '<br>';
                } else {
                    echo '<p class="jetonsRestant">' . $res . ' jetons à valider:</p>';
                }
            }
            if ($key == 'Nb_Jetons_Places') {
                if (is_null($value) || $value == 0) {
                    $places = 0;
                } else {
                    $places = $value;
                }
            }
            if ($key == 'Nb_Jetons') {
                $res = $value - $places;
                if ($res != 0) {
                    echo '<button class="redirect" type="submit" formaction="consulterObjectif.php" name="redirect" value="' . $idObjectif . '">
                    <img class="imgRedirect" src="images/redirect.png"></button>';
                    $filtre = " ";
                } else {
                    echo '<button class="redirect" type="submit" formaction="consulterObjectif.php" name="redirect" value="' . $idObjectif . '">
                    <img class="imgRedirect" src="images/redirect.png"></button>';
                    echo '<p class="msgObjectifValidé" >Objectif validé</p>';
                    $filtre = "filter: grayscale(100%);";
                }
            }
            if ($key == 'Lien_Image') {
                echo '<img class="imageObjectif" style="border-radius: 10px;' . $filtre . '" src="' . $value . '" id="imageJeton" alt="' . $res . ' ">';
                $places = 0;
            }
        }
        echo '<div class="containerTampons">';
        for ($i = 1; $i <= NombreDeJetons($idObjectif); $i++) {
            if ($i <= NombreDeJetonsPlaces($idObjectif)) {
                echo '<button class="tampon" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '" onclick="return confirm(\'Êtes vous sûr de vouloir retirer un jeton ?\');">';
                if ($res == 0) {
                    echo '<img class="imageTamponValide" src="' . afficherImageTampon($idEnfant) . '"></button>';
                } else {
                    echo '<img class="imageTamponValide" src="' . afficherImageTampon($idEnfant) . '"></button>';
                }
            } else {
                echo '<button class="tampon" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '">?</button>';
            }
        }
        echo '</div></div>';
    }
}

// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherObjectifsZoom($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="objectif zoom">';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Lien_Image') {
                echo '<img class="imageObjectif zoom" style="border-radius: 10px;" src="' . $value . '" alt="image objectif">';
            }
            if ($key == 'Duree') {
                echo '<div class="dureeObjectifs zoom"><div class="centerIconeTemps"><img class="imageIcone" src="images/chrono.png" alt="chronometre"><p>' . dureeString($value) . '</p></div><span></span></div><br>';
            }
            if ($key == 'Nb_Jetons_Places') {
                if (is_null($value)) {
                    $places = 0;
                } else {
                    $places = $value;
                }
            }
            if ($key == 'Nb_Jetons') {
                $res = $value - $places;
                if ($res != 0) {
                    if ($res == 1) {
                        echo '<p class="jetonsRestant">' . $res . ' jeton à valider : </p>';
                    } else {
                        echo '<p class="jetonsRestant">' . $res . ' jetons à valider : </p>';
                    }
                }
                $places = 0;
            }
        }
        echo '<div class="containerTampons zoom">';
        for ($i = 1; $i <= NombreDeJetons($idObjectif); $i++) {
            if ($i <= NombreDeJetonsPlaces($idObjectif)) {
                echo '<button class="tampon zoom" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '" onclick="return confirm(\'Êtes vous sûr de vouloir retirer un jeton ?\');">';
                if ($res == 0) {
                    echo '<img class="imageTamponValide zoom" src="' . afficherImageTampon($_SESSION['enfant']) . '"></button>';
                } else {
                    echo '<img class="imageTamponValide zoom" src="' . afficherImageTampon($_SESSION['enfant']) . '"></button>';
                }
            } else {
                echo '<button class="tampon zoom" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '">?</button>';
            }
        }
        echo '</div></div>';
    }
}

// fontion qui permet d'ajouter un objectif a la BD
function NombreDeJetons($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNombreDeJetons']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete 
        foreach ($data as $value) {
            return $value;
        }
    }
}

// fontion qui permet d'ajouter un objectif a la BD
function NombreDeJetonsPlaces($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererNombreDeJetonsPlaces']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete 
        foreach ($data as $value) {
            return $value;
        }
    }
}

// fontion qui permet d'ajouter un objectif a la BD
function AjouterJetonsPlaces($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterJetonsPlaces']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
}
function supprimerPlacerJeton($idObjectif)
{
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerPlacerJetons']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
}
function SupprimerJetonsPlaces($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerJetonsPlaces']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
    supprimerPlacerJeton($idObjectif);
}

// fonction qui permet d'afficher les informations de l'objectif selon son Id_Objectif
function AfficherInformationUnObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un membre a la BD');
    }
    // execution de la requete sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour ajouter un membre a la BD');
    }
    // permet de parcourir la ligne de la requetes 
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete 
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Intitule') {
                echo '
                <label for="champIntitule">Intitulé :</label>
                <input type="text" name="champIntitule" placeholder="Entrez l\'intitulé de l\'objectif" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Duree') {
                $duree = $value;
                $s = intdiv($duree, 168);
                $duree -= 168 * $s;
                $j = intdiv($duree, 24);
                $duree -= 24 * $j;
                $h = intdiv($duree, 1);
                echo '
                <label>Durée de cagnottage :</label>
                <div id="selecteurDuree">
                    <div class="center"><label for="inline champDureeSemaines" class="labelSemJourH">Semaine(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeSemaines" min="0" max="99" value="' . $s . '" required></div>
                    <div class="center"><label for="inline champDureeJours">Jour(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeJours" min="0" max="99" value="' . $j . '" required></div>
                    <div class="center"><label for="inline champDureeHeures">Heure(s):&ensp; </label><input class="inline selecteurSemJourH" type="number" name="champDureeHeures" min="0" max="99" value="' . $h . '" required></div>
                </div>
                <span></span>
                ';
            } elseif ($key == 'Travaille') {
                echo '
                <label for="champTravaille">Statut de l\'objectif :</label>
                <div class="center" style="width: 100%;">

                    <span class="center1Item">
                        <input type="radio" name="champTravaille" id="Avenir" value="2" required';
                if ($value == 2) echo ' checked>';
                else echo '>';
                echo '
                        <label for="Avenir" class="radioLabel" tabindex="0">A venir</label>
                    </span>

                    <span class="center1Item">
                        <input type="radio" name="champTravaille" id="enCours" value="1" required';
                if ($value == 1) echo ' checked>';
                else echo '>';
                echo '
                        <label for="enCours" class="radioLabel" tabindex="0">En cours</label>
                    </span>

                </div>
                <span></span>';
            } elseif ($key == 'Lien_Image') {
                echo '
                <label for="champLienImage">Image du tampon :</label>
                <input type="file" name="champLienImage" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp" onchange="refreshImageSelector(\'champImageTampon\',\'imageTampon\')">
                <img src="' . AfficherImageObjectif($idObjectif) . '" alt=" " id="imageTampon">';
                echo '<input type="hidden" value="' . AfficherImageObjectif($idObjectif) . '" name="hiddenImageLink">';
            } elseif ($key == 'Nb_Jetons') {
                echo '
                <label for="champNbJetons">Jetons à placer :</label>
                <input type="number" name="champNbJetons" placeholder="Entrez le nombre de jetons à gagner" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');" min="1" max="99999999999"  value="' . $value . '"  required>
                <span></span>
                ';
            }
        }
    }
}

// fonction qui permet de modifier un objectif de la BD
function modifierObjectif($intitule, $nbJetons, $duree, $lienImage, $travaille, $idMembre, $idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qModifierInformationsObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':nbJetons' => clean($nbJetons),
        ':duree' => clean($duree),
        ':lienImage' => clean($lienImage),
        ':travaille' => clean($travaille),
        ':idMembre' => clean($idMembre),
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
}

// fonction qui permet de supprimer un objectif selon son Id_Objectif
function supprimerObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
}

// fonction qui permet d'afficher l'image d'un objectif selon son Id_Objectif
function AfficherImageObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererImageObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                $image = $value;
            }
        }
        return $image;
    }
}

// fonction qui ressort une durée en heure avec des semaines, jours
function dureeDeCagnottage($semaines, $jours, $heures)
{
    $semaines *= 24 * 7;
    $jours *= 24;
    return $semaines + $jours + $heures;
}

function afficherObjectifSelonId($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifSelonId']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Intitule') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Nb_jetons') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Duree') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Lien_Image') {
                echo '<div>' . $value . '</div>';
            }
            if ($key == 'Nb_Jetons_Places') {
                echo '<div>' . $value . '</div>';
            }
        }
    }
}

function afficherIntituleObjectif($objectifSelected, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererIntituleObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idObjectif">';
    echo '<option>Veuillez choisir un objectif</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Intitule') {
                $Intitule = $value;
            }
        }
        if ($idObjectif == $objectifSelected) {
            echo '<option value=' . $idObjectif . ' selected>' . $Intitule . '</option>';
        } else {
            echo '<option value=' . $idObjectif . '>' . $Intitule . '</option>';
        }
    }
    echo '</select>';
}
function afficherIntituleObjectifSubmit($objectifSelected, $idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererIntituleObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idObjectif"onchange="this.form.submit()">';
    echo '<option>Veuillez choisir un objectif</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Intitule') {
                $Intitule = $value;
            }
        }
        if ($idObjectif == $objectifSelected) {
            echo '<option value=' . $idObjectif . ' selected>' . $Intitule . '</option>';
        } else {
            echo '<option value=' . $idObjectif . '>' . $Intitule . '</option>';
        }
    }
    echo '</select>';
}

function afficherUnIntituleObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererUnIntituleObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            return $value;
        }
    }
}

function afficherGererObjectifsAZ($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsAZ']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . dureeString($value) . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                if ($value == 1) {
                    echo '<td>En cours</td>';
                } else if ($value == 2) {
                    echo '<td>A venir</td>';
                } else {
                    echo '<td>Aucun</td>';
                }
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}

function afficherGererObjectifsZA($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsZA']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . dureeString($value) . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                if ($value == 1) {
                    echo '<td>En cours</td>';
                } else if ($value == 2) {
                    echo '<td>A venir</td>';
                } else {
                    echo '<td>Aucun</td>';
                }
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}

function afficherGererObjectifsDureeCroissante($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsDureeCroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . dureeString($value) . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                if ($value == 1) {
                    echo '<td>En cours</td>';
                } else if ($value == 2) {
                    echo '<td>A venir</td>';
                } else {
                    echo '<td>Aucun</td>';
                }
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}

function afficherGererObjectifsDureeDecroissante($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsDureeDecroissante']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . dureeString($value) . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                if ($value == 1) {
                    echo '<td>En cours</td>';
                } else if ($value == 2) {
                    echo '<td>A venir</td>';
                } else {
                    echo '<td>Aucun</td>';
                }
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}

function afficherGererObjectifsStatutCroissant($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsStatutCroissant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . dureeString($value) . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                if ($value == 1) {
                    echo '<td>En cours</td>';
                } else if ($value == 2) {
                    echo '<td>A venir</td>';
                } else {
                    echo '<td>Aucun</td>';
                }
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}

function afficherGererObjectifsStatutDecroissant($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererInformationsObjectifsStatutDecroissant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . dureeString($value) . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                if ($value == 1) {
                    echo '<td>En cours</td>';
                } else if ($value == 2) {
                    echo '<td>A venir</td>';
                } else {
                    echo '<td>Aucun</td>';
                }
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" formaction="modifierObjectifs.php">
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cet objectif ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}
function supprimerImageObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerImageObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            // selectionne toutes les colonnes $key necessaires
            return $value;
        }
    }
}

function recupererDureeUnObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererDureeUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            return $value;
        }
    }
}

function ajouterTempsRestantObjectif($tempsRestant, $idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterTempsRestantUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':tempsRestant' => clean($tempsRestant),
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
}

function recupererTempsDebutObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRecupererTempsRestantUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            return $value;
        }
    }
}

$qMettreA0LeTempsDeDebutUnObjectif = 'UPDATE objectif SET Temps_Debut = 0 WHERE Id_Objectif = :idObjectif';
function mettreA0LeTempsDeDebutUnObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qMettreA0LeTempsDeDebutUnObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
}
function reinitialiserObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qReinitialiserObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
}

//! -----------------------------------------------RECOMPENSE--------------------------------------------------------------

// fonction qui permet d'ajouter un recompense a la BD
function ajouterRecompense($intitule, $lienImage, $descriptif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter une recompense a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':lienImage' => clean($lienImage),
        ':descriptif' => clean($descriptif)

    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un enfant a la BD');
    }
}

// fonction qui permet de modifier les informations d'une recompense selon son Id_Recompense
function modifierRecompense($idRecompense, $intitule, $lienImage, $descriptif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qModifierRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'une recompense ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idRecompense' => clean($idRecompense),
        ':intitule' => clean($intitule),
        ':lienImage' => clean($lienImage),
        ':descriptif' => clean($descriptif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour modifier une recompense');
    }
}

// fonction qui permet de rechercher une recompense selon son Id_Recompense
function rechercherRecompense($idRecompense)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour rechercher une recompense dans la BD');
    }
    //execution de la requete sql
    $req->execute(array(
        ':idRecompense' => clean($idRecompense)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour rechercher une recompense dans la BD');
    }
    return $req;
}
function afficherImageRecompense($idRecompense)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherImageRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idRecompense' => clean($idRecompense)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        //echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                $image = $value;
            }
        }
        return $image;
    }
}

// requete qui permet d'afficher un recompense selon son Id_Recompense
function afficherInfoRecompense($idRecompense)
{
    // recherche les informations d'une selon son id
    $req = rechercherRecompense($idRecompense); // retoune la recompense selon $idRecompense
    // permet de parcourir la ligne de la requete : rechercherRecompense($idRecompense);
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete : rechercherRecompense($idRecompense);
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Intitule') {
                echo '<label for="champIntitule">Titre :</label>
                <input type="text" name="champIntitule" placeholder="Entrez le titre de la récompense" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Descriptif') {
                echo '<label for="champDescriptif">Descriptif :</label>
                <input type="text" name="champDescriptif" placeholder="Entrez la description de la récompense" minlength="1" maxlength="50" value="' . $value . '"required>
                <span></span>';
            } elseif ($key == 'Lien_Image') {
                echo '
                <label for="champLienImage">Image du tampon :</label>
                <input type="file" name="champLienImage" id="champImageTampon" accept="image/png, image/jpeg, image/svg+xml, image/webp, image/bmp" onchange="refreshImageSelector(\'champImageTampon\',\'imageTampon\')">
                <img src="' . afficherImageRecompense($idRecompense) . '" alt=" " id="imageTampon">';
                echo '<input type="hidden" value="' . afficherImageRecompense($idRecompense) . '" name="hiddenImageLink">';
            }
        }
    }
}
// requete qui permet de supprimer une recompense selon son id
function supprimerRecompense($idRecompense)
{
    // connexion a la base de donnees
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour supprimer un membre de la BD');
    }
    // execution de la requete sql
    $req->execute(array(':idRecompense' => clean($idRecompense)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
    }
}
// fonction qui permet d'afficher toutes les recompenses de la BD pour un enfant donnee
function afficherRecompense($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher une récompense');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher une récompense');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<td><img src="' . $value . '" alt=" " style="max-width: 70px; border-radius: 100%; margin: 10px;"></td>';
            }
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Descriptif') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Id_Recompense') {
                $idRecompense = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idRecompense . '" 
             class="boutonModifier" formaction="modifierRecompense.php" >
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idRecompense . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cette recompense ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}

function ajouterLienRecompenseObj($idObjectif, $idRecompense)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterLienRecompenseObj']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher une récompense');
    }
    // execution de la requete sql
    $req->execute(array(':idObjectif' => clean($idObjectif), ':idRecompense' => clean($idRecompense)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher une récompense');
    }
}

function rechercherIdRecompenseSelonIntitule($intitule)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qRechercherIdRecompenseSelonIntitule']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher une récompense');
    }
    // execution de la requete sql
    $req->execute(array(':intitule' => clean($intitule)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher une récompense');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            return $value;
        }
    }
}
function supprimerImageRecompense($idRecompense)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerImageRecompense']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idRecompense)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour permet de modifier les informations d\'un objectif ');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            // selectionne toutes les colonnes $key necessaires
            return $value;
        }
    }
}

function afficherRecompenseSelonObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherRecompenseSelonObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher une récompense');
    }
    // execution de la requete sql
    $req->execute(array(':idObjectif' => clean($idObjectif)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher une récompense');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="recompense">';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Lien_Image') {
                echo '<img src="' . $value . '" alt="Image de la récompense" class="imgRecompense">';
                echo '
                <svg
                viewBox="0 0 500 500" xml:space="preserve" width="200" height="200"
                xmlns="http://www.w3.org/2000/svg" style="z-index: 0; position: absolute; justify-self: center; align-self: center; z-index: 0; filter: opacity(50%);">
                    <path stroke="#ffd500" fill="#f4dc62" stroke-width="12"
                        d="M 500,250 473.216,279.409 491.536,314.718 458.049,336.172 466.532,375.03 428.619,387.055     426.778,426.778 387.044,428.619 375.02,466.543 336.161,458.049 314.707,491.547 279.409,473.226 250,500 220.581,473.226     185.282,491.547 163.818,458.049 124.959,466.543 112.945,428.619 73.222,426.778 71.371,387.044 33.458,375.021 41.941,336.172     8.453,314.718 26.774,279.409 0,250 26.774,220.591 8.453,185.282 41.941,163.829 33.458,124.97 71.371,112.956 73.222,73.222     112.956,71.381 124.97,33.468 163.829,41.952 185.282,8.463 220.581,26.784 250,0 279.409,26.784 314.718,8.463 336.172,41.962     375.03,33.468 387.044,71.381 426.778,73.232 428.619,112.966 466.532,124.98 458.049,163.839 491.536,185.282 473.216,220.591 z"/>
                </svg>
                ';
                echo '<img src="images/noeud.png" class="noeud">';
            }
            if ($key == 'Intitule') {
                echo '<div class="fondRecompense" ><h2 class="intituleRecompense">' . $value . '</h2>';
            }
            if ($key == 'Descriptif') {
                echo '<p>' . $value . '</p>';
            }
            if ($key == 'Id_Recompense') {
                // if(objectifvalide) {
                echo '
                    <button type="submit" name="boutonAcheter" value="' . $value . '" 
                    class="boutonRecuperer">
                        <img src="images/panier.png" class="imageIcone" alt="icone modifier">
                        <span>Récupérer</span>
                    </button></div>
                    ';
                // } else {
                //     echo '
                //     <button type="submit" name="boutonAcheter" value="' . $value . '" 
                //     class="boutonModifier" disabled>
                //         <img src="images/panier.png" class="imageIcone" alt="icone modifier">
                //         <span>Récupérer</span>
                //     </button></div>
                //     ';
                // }

            }
        }
        echo '</div>';
    }
}

//! -------------------------------------------------EQUIPE------------------------------------------------------------
function afficherNomPrenomMembre()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherNomPrenomMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idMembre" required>';
    echo '<option value="">Veuillez choisir un Membre</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                echo '<option value=' . $idMembre . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}

function ajouterUneEquipe($idEnfant, $idMembre, $dateDemandeEquipe, $role)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterUneEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter une recompense a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant),
        ':idMembre' => clean($idMembre),
        ':dateDemandeEquipe' => $dateDemandeEquipe, //Il faut mettre le timestamp, on le demande pas a l'utilisateur
        ':role' => clean($role)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un enfant a la BD');
    }
}
// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherGererEquipe($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Role') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Nom') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Prenom') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Id_Enfant') {
                $idEnfant = $value;
            }
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
        }
        // creation du bouton supprimer dans le tableau
        echo '
            <td>
                <button type="submit" name="boutonSupprimer" value="' . $idMembre . ',' . $idEnfant . '
                " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir retirer ce membre de cette équipe ?\');" >
                    <img src="images/annuler.png" class="imageIcone" alt="icone supprimer">
                    <span>Retirer</span>
                </button>
            </td>
        </tr>';
    }
}
function supprimerMembreEquipe($chaineConcatene)
{
    $chaineDeconcatene = explode(",", $chaineConcatene);
    $idMembre = $chaineDeconcatene[0];
    $idEnfant = $chaineDeconcatene[1];
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qSupprimerUnMembreEquipe']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    $req->execute(array(
        ':idMembre' => clean($idMembre),
        ':idEnfant' => clean($idEnfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
    }
}
//!---------------------------------------------MESSAGE-------------------------------------------------------------------------

function ajouterMessage($sujet, $corps, $dateHeure, $idObjectif, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterMessage']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter une recompense a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':sujet' => clean($sujet),
        ':corps' => clean($corps),
        ':dateHeure' => clean($dateHeure), //Il faut mettre le timestamp, on le demande pas a l'utilisateur
        ':idObjectif' => clean($idObjectif),
        ':idMembre'   => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un enfant a la BD');
    }
}
function afficherMessage($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherMessage']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(':idEnfant' => clean($idEnfant)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    $i = 1;
    $count = $req->rowCount();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgPrenomSortant">Vous</p>';
                } else {
                    echo '<p class="msgPrenomEntrant">' . $nom . ' ' . $prenom . '</p>';
                }
            }
            if ($key == 'Intitule') {
                $intitule = $value;
            }
            if ($key == 'Sujet') {
                $sujet = $value;
            }
            if ($key == 'Corps') {
                $corps = $value;
                if ($i == $count) {
                    $lastMsg = "id='lastMsg'";
                } else {
                    $lastMsg = " ";
                }
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgSortant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                } else {
                    echo '<p class="msgEntrant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                }
            }
            if ($key == 'Date_Heure') {
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgHeureSortant">' . strtolower($value) . '</p>';
                } else {
                    echo '<p class="msgHeureEntrant">' . strtolower($value) . '</p>';
                }
            }
        }
        $i++;
    }
}

function faireChatTb()
{
    echo '
    <form id="form" method="POST" onsubmit="erasePopup(\'erreurPopup\'),erasePopup(\'validationPopup\')," enctype="multipart/form-data">      
    <div id="chat">
        <div class="chatBox">
        <p id="txtChatType">Chat par équipe</p>  
          <button id="closeChatbox" type="button" onclick="chatClose(\'chatBox\',\'openChatButton\')"><img src="images/annuler2.png" alt="annuler" class="imageIcone"></button>
          
          <div id="scrollChat">';
    afficherMessage($_SESSION['enfant']);

    echo '
    
            <div id="selecteursMsg">
            <label>Objectifs : </label>';
    if (isset($_POST['idObjectif'])) {
        afficherIntituleObjectif($_POST['idObjectif'], $_SESSION['enfant']);
    } else {
        afficherIntituleObjectif(null, $_SESSION['enfant']);
    }
    if ($_SESSION['enfant'] == 0) {
        echo '
        <p class=\'msgSelection\'>Choisissez un enfant pour pouvoir sélectionner un objectif et envoyer un message !</p>';
    }



    echo '
            </div>
            <button type="button" id="boutonSelecteurs" onclick="selectMsgToggle(\'selecteursMsg\'),scrollToButton(\'boutonSelecteurs\')"><img src="images/objectifs.png" id="boutonsImgMsg" alt="icone selecteurs"></button>
          </div>

          <div id="containerBoutonsChat">
            <textarea name="champSujet" id="msgObjet" maxlength="50" placeholder="Objet"></textarea>
            <textarea name="champCorps" id="msgTextArea" placeholder="Message"></textarea>
            <button type="submit" name="boutonEnvoiMessage" id="boutonEnvoiMessage"><img src="images/envoi.png" id="boutonsImgMsg" alt="icone envoi"></button>
          </div>
        </div>
        
        <button type="button" id="openChatButton" onclick="chatOpen(\'chatBox\',\'openChatButton\'),scrollToLastMsg(\'lastMsg\')"><img src="images/message.png" class="imageIcone" alt=""></button>
    </form>
    ';
}

function faireChatObjectif()
{
    echo '
    <form id="form" method="POST" onsubmit="erasePopup(\'erreurPopup\'),erasePopup(\'validationPopup\')" enctype="multipart/form-data">      
    <div id="chat">
        <div class="chatBox">
        <p id="txtChatType">Chat par objectif</p>  
          <button id="closeChatbox" type="button" onclick="chatClose(\'chatBox\',\'openChatButton\')"><img src="images/annuler2.png" alt="annuler" class="imageIcone"></button>
          <div id="scrollChat">';
    afficherMessageParObjectif($_SESSION['enfant'], $_SESSION['objectif']);

    echo '
            <div id="selecteursMsg">
            <label>Objectifs : </label>';

    echo '
            </div>
          </div>

          <div id="containerBoutonsChat">
            <textarea name="champSujet" id="msgObjet" maxlength="50" placeholder="Objet"></textarea>
            <textarea name="champCorps" id="msgTextArea" placeholder="Message"></textarea>
            <button type="submit" name="boutonEnvoiMessage" id="boutonEnvoiMessage"><img src="images/envoi.png" id="boutonsImgMsg" alt="icone envoi"></button>
          </div>
        </div>
        
        <button type="button" id="openChatButton" onclick="chatOpen(\'chatBox\',\'openChatButton\'),scrollToLastMsg(\'lastMsg\')"><img src="images/message.png" class="imageIcone" alt=""></button>
    </form>
    ';
}

function afficherMessageParObjectif($idEnfant, $idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherMessageParObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher un objectif');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idEnfant' => clean($idEnfant),
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher un objectif');
    }
    // permet de parcourir toutes les lignes de la requete
    $i = 1;
    $count = $req->rowCount();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Membre') {
                $idMembre = $value;
            }
            if ($key == 'Nom') {
                $nom = $value;
            }
            if ($key == 'Prenom') {
                $prenom = $value;
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgPrenomSortant">Vous</p>';
                } else {
                    echo '<p class="msgPrenomEntrant">' . $nom . ' ' . $prenom . '</p>';
                }
            }
            if ($key == 'Intitule') {
                $intitule = $value;
            }
            if ($key == 'Sujet') {
                $sujet = $value;
            }
            if ($key == 'Corps') {
                $corps = $value;
                if ($i == $count) {
                    $lastMsg = "id='lastMsg'";
                } else {
                    $lastMsg = " ";
                }
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgSortant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                } else {
                    echo '<p class="msgEntrant"' . $lastMsg . '><i class="objetMsg">' . $intitule . ' : ' . $sujet . '</i><br>' . $corps . '</p>';
                }
            }
            if ($key == 'Date_Heure') {
                if ($idMembre == $_SESSION['idConnexion']) {
                    echo '<p class="msgHeureSortant">' . strtolower($value) . '</p>';
                } else {
                    echo '<p class="msgHeureEntrant">' . strtolower($value) . '</p>';
                }
            }
        }
        $i++;
    }
}

// fonction qui retourne les lignes si un enfant a le meme nom, prenom, date naissance qu'un enfant de la BD
function messageIdentique($sujet, $corps, $idObjectif, $idMembre)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qMessageIdentique']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour verifier si un enfant existe deja');
    }
    // execution de la requete sql
    $req->execute(array(
        ':sujet' => clean($sujet),
        ':corps' => clean($corps),
        ':idObjectif' => clean($idObjectif),
        ':idMembre' => clean($idMembre)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour verifier si un enfant existe deja');
    }
    $cout = $req->rowCount(); // si ligne > 0 alors enfant deja dans la BD
    $i = 0;
    // permet de parcourir toutes les lignes de la requete
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            if ($i == $cout) {
            }
        }
    }
    $i++;
}

//!------------------------------------------------PLACER JETON----------------------------------------------------------------------

function ajouterJeton($idObjectif, $dateHeure, $idMembre, $jetons)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterJeton']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un jeton a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':idObjectif' => clean($idObjectif),
        ':dateHeure' => clean($dateHeure), //Il faut mettre le timestamp, on le demande pas a l'utilisateur
        ':idMembre' => clean($idMembre),
        ':jetons' => clean($jetons)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un enfant a la BD');
    }
}

//!------------------------------------------------PARTIE ADMIN----------------------------------------------------------------------

//function ajouterAdmin($idAdmin,$nom, $prenom, $adresse, $codePostal, $ville, $courriel, $dateNaissance, $mdp, $role)
// {
//     // connexion a la BD
//     $linkpdo = connexionBd();
//     // preparation de la requete sql
//     $req = $linkpdo->prepare($GLOBALS['qAjouterCompteAdmin']);
//     if ($req == false) {
//         die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un membre a la BD');
//     }
//     // execution de la requete sql
//     $req->execute(array(
//         ':idAdmin' => clean($idAdmin),
//         ':nom' => clean($nom),
//         ':prenom' => clean($prenom),
//         ':adresse' => clean($adresse),
//         ':codePostal' => clean($codePostal),
//         ':ville' => clean($ville),
//         ':courriel' => clean($courriel),
//         ':dateNaissance' => clean($dateNaissance),
//         ':mdp' => clean($mdp),
//         ':role' => clean($role)
//     ));

//     if ($req == false) {
//         die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un membre a la BD');
//     }
// }
// function verifierValidationAdmin($courriel)
// {
//     // connexion a la BD
//     $linkpdo = connexionBd();
//     // preparation de la requete sql
//     $req = $linkpdo->prepare($GLOBALS['qVerifierValidationAdmin']);
//     if ($req == false) {
//         die('Erreur ! Il y a un probleme lors de la preparation de la requete pour vérifier la validité du admin');
//     }
//     // execution de la requete sql
//     $req->execute(array(':courriel' => clean($courriel)));
//     if ($req == false) {
//         die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour vérifier la validité du admin');
//     }
//     if ($req->rowCount() > 0) {
//         return true;
//     } else {
//         return false;
//     }
// }

function recupererIdMembre($courriel)
{
    $linkpdo = connexionBd();
    $req = $linkpdo->prepare($GLOBALS['qRecupererIdMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour vérifier la validité du admin');
    }
    $req->execute(array(':courriel' => clean($courriel)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour vérifier la validité du admin');
    }
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $value) {
            return $value;
        }
    }

    //!------------------------------------------------STATISTIQUES----------------------------------------------------------------------

    function afficherStatistiques($idObjectif)
    {
    }

    $qRecupererNbJetonsPlacesUnObjectif = 'SELECT Date_Heure FROM placer_jeton WHERE Id_Objectif = :idObjectif AND Date_Heure <= :limiteSeance';
    function afficherBarresProgression($idObjectif)
    {
        $restant = recupererTempsDebutObjectif($idObjectif);
        echo '$restant : ' . $restant . '<br>';
        $duree = recupererDureeUnObjectif($idObjectif) / 3600;
        echo '$duree : ' . $duree . '<br>';
        $limiteSeance = $restant + $duree;
        echo '$limiteSeance : ' . $limiteSeance . '<br>';
        // connexion a la BD
        $linkpdo = connexionBd();
        // preparation de la requete sql
        $req = $linkpdo->prepare($GLOBALS['qRecupererNbJetonsPlacesUnObjectif']);
        if ($req == false) {
            die('Erreur ! Il y a un probleme lors de la preparation de la requete pour vérifier la validité du admin');
        }
        // execution de la requete sql
        $req->execute(array(
            ':idObjectif' => clean($idObjectif),
            ':limiteSeance' => $limiteSeance
        ));
        if ($req == false) {
            die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour vérifier la validité du admin');
        }
        $count = $req->rowCount();
        echo '$count : ' . $count . '<br>';
        $pourcentage = ($count / NombreDeJetons($idObjectif)) * 100;
        echo '$pourcentage : ' . $pourcentage . '<br>';
    }
}









/*                                                                
/                                                                                   .                                                
/                                                                                  / V\                                               
/                                                                               / `  /                                                
/                                                                             <<    |                                                 
/         ,_)/                                                                 /    |                                                 
/           (-'                    ":"                                       /      |               ', ,'                                
/        .-'\                    ___:____     |"\/"|                       /        |            ,----'--------------------------.    
/          "'\'"""""'),        ,'        `.    \  /                      /    \  \ /            ("""|```|```|```|```|```|```|``|` |   
/            )/- -,(          |  O        \___/  |                      (      ) | |            |---'---'---'---'---'---'---'--'--|   
/           / \  / |        ~^~^~^~^~^~^~^~^~^~^~^~^~          ________|   _/_  | |          __,_    ______           ______     |_o 
/                                                            <__________\______)\__)            '---'(O)(O)'---------'(O)(O)'---'   
*/