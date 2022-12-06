<?php

/*
/ --------------------------------------------------------------------------------------------------------------------------
/ -----------------------------------------------Liste des requetes---------------------------------------------------------
/ --------------------------------------------------------------------------------------------------------------------------
*/

//? ----------------------------------------------Enfant---------------------------------------------------------------------

// requete pour ajouter un enfant a la BD
$qAjouterEnfant = 'INSERT INTO enfant (Nom,Prenom,Date_Naissance,Lien_Jeton) 
                    VALUES (:nom , :prenom, :dateNaissance, :lienJeton)';

// requete pour verifier qu'un enfant avec les données en parametre n'existe pas deja dans la BD
$qEnfantIdentique = 'SELECT Nom, Prenom, Date_Naissance FROM enfant 
                    WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance';

// requete pour afficher le nom prenom de tous les enfants dont un membre s'occupe (pour le moment ca affiche tout le monde)
$qAfficherNomPrenomEnfant = 'SELECT Id_Enfant, Nom,Prenom FROM Enfant ORDER BY Nom';


//? ----------------------------------------------Membre---------------------------------------------------------------------

// requete pour ajouter un membre a la BD
$qAjouterMembre = 'INSERT INTO membre (Nom,Prenom,Adresse,Code_Postal,Ville,Courriel,Date_Naissance,Mdp,Pro) 
                    VALUES (:nom,:prenom,:adresse,:codePostal,:ville,:courriel,:dateNaissance,:mdp,:pro)';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD
$qAfficherMembres = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD le tout trie par Nom croissant puis prenom croissant
$qAfficherMembresAZ = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Nom, Prenom';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD le tout trie par Nom decroissant puis prenom croissant
$qAfficherMembresZA = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM Membre ORDER BY Nom DESC, Prenom';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD le tout trie par date naissance croissante puis nom puis prenom
$qAfficherMembresDateNaissanceCroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM 
                                            Membre ORDER BY Date_Naissance, Nom, Prenom';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD le tout trie par date naissance decroissante puis nom puis prenom
$qAfficherMembresDateNaissanceDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM 
                                            Membre ORDER BY Date_Naissance DESC , Nom, Prenom';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD le tout trie par validation croissant puis nom puis prenom
$qAfficherMembresCompteValideCroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM 
                                            Membre ORDER BY Compte_Valide, Nom, Prenom';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD le tout trie par validation decroissant puis nom puis prenom
$qAfficherMembresCompteValideDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM 
                                            Membre ORDER BY Compte_Valide DESC, Nom, Prenom';

// requete pour afficher l'id, le nom, le prenom, le email, la date de naissance et la validite de des compte des 
// membres de la BD le tout trie par Id_Membre decroissant
$qAfficherMembresIdMembreDecroissante = 'SELECT Id_Membre, Nom, Prenom, Courriel, Date_Naissance, Compte_Valide FROM 
                                            Membre ORDER BY Id_Membre DESC';

// requete pour valider un membre de la BD
$qValiderMembre = 'UPDATE membre SET Compte_Valide = 1 WHERE Id_Membre = :idMembre';

// requete pour vérifier la validite du compte d'un membre selon son courriel et son mdp dans la BD
$qVerifierValidationMembre = 'SELECT Id_Membre FROM Membre WHERE Courriel = :courriel AND Mdp = :mdp AND Compte_Valide = 1';

// requete pour rechercher un membre dans la BD
$qRechercherUnMembre = 'SELECT Nom, Prenom, Adresse, Date_naissance, Code_Postal, Ville, Pro, Mdp FROM membre WHERE Id_Membre = :id';

// requete pour supprimer un membre de la BD
$qSupprimerMembre = 'DELETE FROM membre WHERE Id_Membre = :id';

// requete pour modifier les données d'un membre de la BD
$qModifierInformationsMembre = 'UPDATE membre SET Nom = :nom, Prenom = :prenom, Adresse = :adresse, Code_Postal = :codePostal, 
                                Ville = :ville, Mdp = :mdp WHERE Id_Membre = :idMembre';

// requete pour vérifier qu'un membre avec les données en parametre n'existe pas deja dans la BD
$qMembreIdentique = 'SELECT Nom, Prenom, Date_Naissance, Courriel FROM membre 
                    WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance AND Courriel = :courriel';

// requete pour rechercher le prenom du membre connecté
$qAfficherPrenomMembre = 'SELECT Prenom FROM Membre WHERE Id_Membre = :idMembre';

//? ----------------------------------------------Objectif-------------------------------------------------------------------

// requete pour ajouter un objectif a la BD
$qAjouterObjectif = 'INSERT INTO objectif (Intitule, Nb_Jetons, Duree,Lien_Image,Travaille,Id_Membre,Id_Enfant) 
                    VALUES (:intitule, :nbJetons, :duree, :lienObjectif, :travaille, :idMembre, :idEnfant)';

// requete qui permet de vérifier qu'un objectif n'est pas deja present dans la BD pour un enfant donne
$qObjectifIdentique = 'SELECT Intitule FROM objectif WHERE Intitule = :intitule AND Id_Enfant = :idEnfant';

// requete pour afficher les objectifs de la BD
$qAfficherObjectifs = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Travaille, Nb_Jetons_Places, Nb_Jetons  FROM objectif WHERE Id_Enfant = :idEnfant';

$qAfficherObjectifsTb = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons_Places, Nb_Jetons  FROM objectif WHERE Id_Enfant = :idEnfant AND Travaille = 1';

$qAfficherValidationTb = 'SELECT Nb_Jetons_Places, Nb_Jetons FROM objectif WHERE Id_Objectif = :idObjectif AND Travaille = 1';

$qAfficherObjectifsAZ = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule';

$qAfficherObjectifsZA = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule DESC';

$qAfficherObjectifsDureeCroissante = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Duree';

$qAfficherObjectifsDureeDecroissante = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Duree DESC';

$qAfficherObjectifsStatutCroissant = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Travaille';

$qAfficherObjectifsStatutDecroissant = 'SELECT Id_Objectif, Lien_Image, Intitule, Duree, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Travaille DESC';

//requete de modification d'Objectif
$qModifierInformationsObjectif = 'UPDATE objectif SET Intitule = :intitule, Nb_Jetons = :nbJetons, Duree = :duree, 
                                Lien_Image = :lienImage, Travaille = :travaille, Id_Membre = :idMembre WHERE id_Objectif = :idObjectif';

// requete pour supprimer un objectif selon son Id_Objectif
$qSupprimerObjectif = 'DELETE FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour afficher les objectifs de la BD
$qAfficherInformationUnObjectif = 'SELECT Id_Objectif, Intitule, Duree, Travaille, Lien_Image, Nb_Jetons
                                    FROM objectif WHERE Id_Objectif = :idObjectif';

// requete qui permet de récupérer l'image d'un objectif 
$qAfficherImageObjectif = 'SELECT Lien_Image FROM objectif WHERE Id_Objectif = :idObjectif';

// raquete qui permet de récupérer le nombre de tampon pour un objectif donné
$qNombreDeJetons = 'SELECT Nb_Jetons FROM objectif WHERE Id_Objectif = :idObjectif';

// raquete qui permet de récupérer le nombre de tampon pour un objectif donné
$qNombreDeJetonsPlaces = 'SELECT Nb_Jetons_Places FROM objectif WHERE Id_Objectif = :idObjectif';

$qUpdateJetonsPlaces = 'UPDATE objectif set Nb_Jetons_Places = :nbJetonsPlaces WHERE Id_Objectif = :idObjectif';

$qSupprimerInfosIdMembre = 'UPDATE objectif SET Id_Membre = NULL WHERE Id_Membre = :idMembre';

$qAfficherIntituleObjectif = 'SELECT Id_Objectif, Intitule FROM objectif WHERE Id_Enfant = :idEnfant ORDER BY Intitule';

//? ----------------------------------------------Recompense-----------------------------------------------------------------

// requete pour ajuter une recompense a la BD
$qAjouterRecompense = 'INSERT INTO recompense (Intitule,Lien_Image,Descriptif) 
                        VALUES (:intitule,:lienImage,:descriptif)';
$qAjouterLienRecompenseObj = 'INSERT INTO lier (lier.Id_Objectif,lier.Id_Recompense) VALUES (:idObjectif,:idRecompense)';


// requete pour rechercher une recompense selon son Id_Recompense
$qRechercherRecompense = 'SELECT * FROM Recompense WHERE id_Recompense = :idRecompense';

// requete pour modifier les informations d'une recompense selon son Id_Recompense
$qModifierRecompense = 'UPDATE recompense SET Intitule = :intitule, Descriptif = :descriptif, Lien_Image = :lienImage , 
                         WHERE id_Recompense = :idRecompense';

// requete pour supprimer une recompense selon son id
$qSupprimerRecompense = 'DELETE FROM Recompense WHERE Id_Recompense = :idRecompense';

// requete pour afficher toutes les recompenses d'un enfant donne
$qAfficherRecompense = 'SELECT recompense.Id_Recompense, recompense.Intitule, recompense.Lien_Image, recompense.Descriptif FROM recompense, lier, enfant, objectif WHERE recompense.Id_Recompense = lier.Id_Recompense AND lier.Id_Objectif = objectif.Id_Objectif AND enfant.Id_Enfant = objectif.Id_Enfant AND enfant.Id_Enfant = :idEnfant';

// requete pour afficher toutes les informations d'un objectif selon son idObjectif
$qAfficherObjectifSelonId = 'SELECT Intitule, Nb_Jetons, Duree, Lien_Image, Nb_Jetons_Places FROM objectif WHERE Id_Objectif = :idObjectif';

$qRechercherIdRecompenseSelonIntitule = 'SELECT Id_Recompense FROM recompense WHERE Intitule = :intitule';

//? ----------------------------------------------Tableau de Bord-----------------------------------------------------------------
$qAfficherImageTampon = 'SELECT Lien_Jeton from Enfant WHERE Id_Enfant = :idEnfant';

//?--------------------------------Equipe---------------------------------------------------------------------------
$qAjouterUneEquipe = 'INSERT INTO suivre (Id_Enfant,Id_Membre,Date_Demande_Equipe,Role) 
VALUES (:idEnfant,:idMembre,FROM_UNIXTIME(:dateDemandeEquipe),:role)';

$qAfficherNomPrenomMembre = 'SELECT Id_Membre, Nom,Prenom FROM Membre ORDER BY Nom';

$qAfficherEquipe = 'SELECT membre.Nom,membre.Prenom,suivre.Id_Membre,suivre.Id_Enfant from membre,suivre,enfant WHERE membre.Id_Membre = suivre.Id_Membre AND
suivre.Id_Enfant = enfant.Id_Enfant AND enfant.Id_Enfant = :idEnfant';

$qSupprimerUnMembreEquipe = 'DELETE FROM suivre WHERE suivre.Id_Enfant = :idEnfant AND suivre.Id_Membre =:idMembre';
//?----------------------------------------------------MESSAGE-----------------------------------------------------------------
$qAjouterMessage = 'INSERT INTO message (Sujet,Corps,Date_Heure,Id_Objectif,Id_Membre) VALUES (:sujet,:corps,FROM_UNIXTIME(:dateHeure),:idObjectif,:idMembre)';

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
    }
    echo
    '
    <nav class="navbar">
        <div class="fondMobile"></div>
        <a href="tableauDeBord.php"><img src="images/logo.png" alt="logo" class="logo"></a>
        
        <div class="nav-links">
          <ul class="nav-ul">
            <li><a href="tableauDeBord.php" id="tableauDeBord">Tableau de bord</a></li>
    
            <div class="separateur"></div>
            
            <li><a href="#" id="Enfants">Enfants</a>
                <ul class="sousMenu">
                    <li><a href="ajouterEnfant.php" >Ajouter un enfant</a></li>
                </ul>
            </li>        
            
            <div class="separateur"></div>
            
            <li><a href="#" id="Membres">Membres</a>
                <ul class="sousMenu">
                    <li><a href="gererMembre.php">Gérer les membres</a></li>
                </ul>
            </li>

            <div class="separateur"></div>

            <li><a href="#" href="#" id="Equipe">Equipe</a>
                <ul class="sousMenu">
                    <li><a href="ajouterEquipe.php">Mes équipes</a></li>
                    <li><a href="gererEquipe.php">Gérer une équipe</a></li>
                </ul>
            </li>    
            
            <div class="separateur"></div>
            
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
    if($s != 0) {
        $s = $s . ' semaines ';
    } else {
        $s = null;
    }
    if($j != 0) {
        $j = $j . ' jours ';
    } else {
        $j = null;
    }
    if($h != 0) {
        $h = $h . ' heures';
    } else {
        $h = null;
    }
    return  $s . $j . $h;
}
function testConnexion()
{
    if ($_SESSION['idConnexion'] == null) {
        header('Location: index.php');
    }
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
function afficherNomPrenomEnfant()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherNomPrenomEnfant']);
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
            if ($key == 'Prenom') {
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherNomPrenomEnfant']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour afficher les information des membres');
    }
    // execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    echo '<select name="idEnfant" onchange="this.form.submit()">';
    echo '<option>Veuillez choisir un enfant</option>';
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

//! -----------------------------------------------MEMBRE--------------------------------------------------------------------

// fonction qui permet d'ajouter un membre a la BD
function ajouterMembre($nom, $prenom, $adresse, $codePostal, $ville, $courriel, $dateNaissance, $mdp, $pro)
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
        ':pro' => clean($pro)
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembres']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembresAZ']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembresZA']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembresDateNaissanceCroissante']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembresDateNaissanceDecroissante']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembresCompteValideCroissante']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembresCompteValideDecroissante']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembresIdMembreDecroissante']);
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
function verifierValidationMembre($courriel, $mdp)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qVerifierValidationMembre']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour vérifier la validité du membre');
    }
    // execution de la requete sql
    $req->execute(array(':courriel' => clean($courriel), ':mdp' => clean($mdp)));
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherPrenomMembre']);
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
    $req->execute(array(':id' => clean($idMembre)));
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
    $req = RechercherMembre($idMembre); // retoune le membre avec ses informations selon $idMembre
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
                <input type="password" name="champMdp" id="champMdp" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" onkeyup="validerConfirmationMdpProfil(\'champMdp\',\'champConfirmerMdp\',\'messageVerifMdp\',\'boutonValider\')" value="' . $value . '"  required>
                <span><img src="images/oeilFermé.png" id="oeilMdp" alt="oeil" onclick="afficherMDP(\'champMdp\',\'oeilMdp\')"></span>';
                echo '<label for="champConfirmerMdp">Confirmer mot de passe :</label>
                <input type="password" name="champConfirmerMdp" id="champConfirmerMdp" placeholder="Confirmez votre mot de passe" minlength="8" maxlength="50" onkeyup="validerConfirmationMdpProfil(\'champMdp\',\'champConfirmerMdp\',\'messageVerifMdp\',\'boutonValider\')" value="' . $value . '" required>
                <span><img src="images/oeilFermé.png" id="oeilMdp2" alt="oeil" onclick="afficherMDP(\'champConfirmerMdp\',\'oeilMdp2\')"></span>';
                echo '<span></span><p id="messageVerifMdp" style="color: red;"></p><span></span>';
            }
        }
    }
}

// fonction qui permet de modifier les informations du membre de la session
function modifierMembreSession($idMembre, $nom, $prenom, $adresse, $codePostal, $ville, $mdp)
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
        ':mdp' => clean($mdp),
        ':idMembre' => clean($idMembre)
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
    $req = $linkpdo->prepare($GLOBALS['qSupprimerInfosIdMembre']);
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
    $req->execute(array(':id' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifs']);
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

// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherObjectifs($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifsTb']);
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
        echo '<div class="objectif">';
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
            if ($key == 'Lien_Image') {
                AfficherValidationObjectif($idObjectif);
                echo '<img class="imageObjectif" style="border-radius: 10px;" src="' . $value . '" id="imageJeton" alt=" ">';
                
            }
            if ($key == 'Intitule') {
                echo '<h3>' . $value . '</h3>';
            }
            if ($key == 'Duree') {
                echo '<p>'.dureeString($value).'</p><br>';
            }
            if ($key == 'Nb_Jetons_Places') {
                if(is_null($value)) {
                    $places = 0;
                }else $places = $value;
            }
            if ($key == 'Nb_Jetons') {
                $res = $value - $places;
                if($res != 0) {
                    echo '<p style="color: grey;">'.$res.' jeton(s) à valider:</p>';
                } else {
                    echo'<br>';
                }
                $places = 0;
            }
        }
        echo '<div class="containerTampons">';
        for ($i = 1; $i <= NombreDeJetons($idObjectif); $i++) {
            if ($i <= NombreDeJetonsPlaces($idObjectif)) {
                echo '<button class="tampon" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '" disabled>';
                if($res == 0){
                    echo'<img class="imageTamponValide" src="' . afficherImageTampon($idEnfant) . '"></button>';
                } else {
                    echo'<img class="imageTamponValide" src="' . afficherImageTampon($idEnfant) . '"></button>';
                }
                
            } else {
                echo '<button class="tampon" type="submit" name="valeurJetonsIdObjectif" value="' . $i . '.' . $idObjectif . '">?</button>';
            }
        }
        echo '</div></div>';
    }
}

function AfficherValidationObjectif($idObjectif) {
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherValidationTb']);
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
        // permet de parcourir toutes les colonnes de la requete
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Nb_Jetons_Places') {
                if(is_null($value)) {
                    $places = 0;
                }else $places = $value;
            }
            if ($key == 'Nb_Jetons') {
                $res = $value - $places;
                $places = 0;
            }
        }
        if($res == 0){
            echo'<p class="msgObjectifValidé">Objectif validé! </p><div class="tick-mark-valide"></div>';
        }            
    }
}



// fontion qui permet d'ajouter un objectif a la BD
function NombreDeJetons($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qNombreDeJetons']);
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
    $req = $linkpdo->prepare($GLOBALS['qNombreDeJetonsPlaces']);
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
function UpdateJetonsPlaces($nbJetonsPlaces, $idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qUpdateJetonsPlaces']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    // execution de la requete sql
    $req->execute(array(
        ':nbJetonsPlaces' => clean($nbJetonsPlaces),
        ':idObjectif' => clean($idObjectif)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
}

// fonction qui permet d'afficher les informations de l'objectif selon son Id_Objectif
function AfficherInformationUnObjectif($idObjectif)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherInformationUnObjectif']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherImageObjectif']);
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
        echo '<tr>';
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherIntituleObjectif']);
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

function afficherGererObjectifsAZ($idEnfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifsAZ']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifsZA']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifsDureeCroissante']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifsDureeDecroissante']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifsStatutCroissant']);
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
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifsStatutDecroissant']);
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
function modifierRecompense($intitule, $descriptif, $lienImage, $idRecompense)
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

        ':intitule' => clean($intitule),
        ':descriptif' => clean($descriptif),
        ':lienImage' => clean($lienImage),
        ':idRecompense' => clean($idRecompense)

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

// requete qui permet d'afficher un recompense selon son Id_Recompense
function afficherInfoRecompense($idRecompense)
{
    // recherche les informations d'une selon son id
    $req = rechercherRecompense($idRecompense); // retoune la recompense selon $idRecompense
    // permet de parcourir la ligne de la requetes : rechercherRecompense($idRecompense);
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete : rechercherRecompense($idRecompense);
        foreach ($data as $key => $value) {
            // recuperation de toutes les informations du membre de la session dans des inputs 
            if ($key == 'Intitule') {
                echo '<label for="champIntitule">Intitule :</label>
                <input type="text" name="champIntitule" placeholder="Choisissez un intitule" minlength="1" maxlength="50" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Descriptif') {
                echo '<label for="champDescriptif">Descriptif :</label>
                <input type="text" name="champDescriptif" placeholder="Choisissez un descriptif" minlength="1" maxlength="50" value="' . $value . '"required>
                <span></span>';
            } elseif ($key == 'Lien_Image') {
                echo '<label for="champImage">Image :</label>
                <input type="file" name="champImage"  maxlength="50" value="' . $value . '"  required>
                <span></span>';
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
            <button name="boutonModifier" value="' . $idRecompense . '" 
             class="boutonModifier" onclick="window.location=\'modifierRecompense.php\'" >
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
    echo '<select name="idMembre"required>';
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
                " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre de cette équipe ?\');" >
                    <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                    <span>Supprimer</span>
                </button>
            </td>
        </tr>';
        echo $idMembre . "," . $idEnfant;
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

function ajouterMessage($sujet,$corps,$dateHeure,$idObjectif,$idMembre){
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