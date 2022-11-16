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
                                Ville = :ville, Date_Naissance = :dateNaissance, Mdp = :mdp, 
                                Pro = :pro WHERE Id_Membre = :idMembre';

// requete pour recuperer le nom, prenom, date naissance d'un enfant de la BD
$qMembreIdentique = 'SELECT Nom, Prenom, Date_Naissance, Courriel FROM membre WHERE Nom = :nom AND Prenom = :prenom AND 
                    Date_Naissance = :dateNaissance AND Courriel = :courriel';

// requete pour ajouter un objectif a la BD
$qAjouterObjectif = 'INSERT INTO objectif (Intitule,Duree,Lien_Image,Priorite,Travaille,Nb_Jetons,Id_Membre,Id_Enfant) 
                    VALUES (:intitule, :duree, :lienObjectif, :priorite, 0, :nbJetons, :idmembre, :idenfant)';

// requete pour afficher les objectifs de la BD
$qAfficherObjectifs = 'SELECT * FROM objectif';

//--------------------------------------------------------------------------------------------------A faire
// requete pour valider le compte d'un membre de la BD
$qValiderCompteMembre;
// requete pour afficher le nom prenom de tous les enfants dont un membre s'occupe (pour le moment ca affiche tout le monde)
$qAfficherNomPrenomEnfant = 'SELECT Nom,Prenom FROM Enfant';

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
    echo '<select name="idEnfant">';
    echo '<option>Veuillez choisir un enfant</option>';
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        // permet de parcourir toutes les colonnes de la requete : prepare($GLOBALS['qAfficherNomPrenom'])
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

// fonction qui retourne les lignes si un membre a le meme nom, prenom, date naissance et courriel qu'un membre de la BD
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

//-----------------------------------------------------------------------------------------------------A revoir car query -> prepare
// fonction qui permet d'afficher le nom, le prenom, la date de naissance, le courriel, un bouton qui appele supprimerMembre($id)
// et un checkbox affiche l'etat de validation du membre
function AfficherNomPrenomDateNaissanceCourrielBoutonSupprimerMembrePlusValidation()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // execution de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherMembres']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour afficher les information des membres');
    }
    // permet de parcourir toutes les lignes de la requete : query($GLOBALS['qAfficherMembres'])
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete : query($GLOBALS['qAfficherMembres'])
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
                <input type="text" name="champCp" placeholder="Entrez votre code postal" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');" maxlength="50" value="' . $value . '" required>
                <span></span>';
            } elseif ($key == 'Ville') {
                echo '<label for="champVille">Ville :</label>
                <input type="text" name="champVille" placeholder="Entrez votre ville" maxlength="50" value="' . $value . '"  required>
                <span></span>';
            } elseif ($key == 'Pro') {
                echo '<label for="champPro">Professionnel :</label>
                <div class="center" style="width: 100%;">
                  <span class="center1Item">
                    <input type="radio" name="champPro" id="proNon" value="null" required';
                if ($value == null || $value == 0) echo ' checked>';
                else echo '>';
                echo '<label for="proNon" class="radioLabel" tabindex="0">Non</label>
                  </span>
                  <span class="center1Item">
                    <input type="radio" name="champPro" id="proOui" value="1" required';
                if ($value == 1) echo ' checked>';
                else echo '>';
                echo '<label for="proOui" class="radioLabel" tabindex="0">Oui</label>
                  </span>
                </div>
                <span></span>';
            } elseif ($key == 'Mdp') {
                //probleme ici si null il faut aussi 0
                echo '<label for="champMdp">Mot de passe :</label>
                <input type="text" name="champMdp" id="champMdp" placeholder="Mot de passe (8 charactères minimum)" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp(\'champMdp\',\'champConfirmerMdp\',\'messageVerifMdp\',\'boutonValider\')" value="' . $value . '"  required>
                <span></span>';
                echo '<label for="champConfirmerMdp">Confirmer mot de passe :</label>
                <input type="text" name="champConfirmerMdp" id="champConfirmerMdp" placeholder="Confirmez votre mot de passe" minlength="8" maxlength="50" onkeyup="validerConfirmationMdp(\'champMdp\',\'champConfirmerMdp\',\'messageVerifMdp\',\'boutonValider\')" value="' . $value . '" required>
                <span></span>';
                echo '<span></span><p id="messageVerifMdp" style="color: red;"></p><span></span>';
            }
        }
    }
}

// fonction qui permet de modifier les informations du membre de la session
function modifierMembreSession($idMembre, $nom, $prenom, $adresse, $codePostal, $ville, $dateNaissance, $mdp, $pro)
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

// fontion qui permet d'ajouter un objectif a la BD
function ajouterObjectif($intitule, $duree, $lienObjectif, $priorite, $nbJetons, $idmembre, $idenfant)
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // preparation de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAjouterObjectif']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un objectif a la BD');
    }
    //execution de la requete sql
    $req->execute(array(
        ':intitule' => clean($intitule),
        ':duree' => clean($duree),
        ':lienObjectif' => clean($lienObjectif),
        ':priorite' => clean($priorite),
        ':nbJetons' => clean($nbJetons),
        ':idmembre' => clean($idmembre),
        ':idenfant' => clean($idenfant)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
    $req->debugDumpParams();
}

// fonction qui permet d'afficher tous les objectif de la BD
function afficherObjectifs()
{
    // connexion a la BD
    $linkpdo = connexionBd();
    // execution de la requete sql
    $req = $linkpdo->prepare($GLOBALS['qAfficherObjectifs']);
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de la preparation de la requete pour ajouter un membre a la BD');
    }
    //execution de la requete sql
    $req->execute();
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors de l\'execution de la requete pour ajouter un membre a la BD');
    }
    // permet de parcourir toutes les lignes de la requete : query($GLOBALS['qAfficherMembres'])
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        // permet de parcourir toutes les colonnes de la requete : query($GLOBALS['qAfficherMembres'])
        foreach ($data as $key => $value) {
            // selectionne toutes les colonnes $key necessaires
            if ($key == 'Intitule' || $key == 'Duree' || $key == 'Lien_Image' || $key == 'Priorite' || $key == 'Travaille' || $key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
    }
}

function faireMenu()
{
    // $effacer = ["/leSite/", ".php", "?params=suppr"];
    // $get_url = str_replace($effacer, "", $_SERVER['REQUEST_URI']);
    $get_url = $_SERVER['REQUEST_URI'];
    $idAChercher = "";
    if(stripos($get_url,"tableau")) {
        $idAChercher = "tableauDeBord";
    }else if(stripos($get_url,"enfant")) {
        $idAChercher = "Enfants";
    } else if (stripos($get_url,"membre")) {
        $idAChercher = "Membres";
    } else if (stripos($get_url,"objectif")) {
        $idAChercher = "Objectifs";
    } else if (stripos($get_url,"recompense")) {
        $idAChercher = "Recompenses";
    }
    echo
    '
    <nav class="navbar">
        <div class="fondMobile"></div>
        <a href="#"><img src="images/logo.png" alt="logo" class="logo"></a>
        
        <div class="nav-links">
          <ul class="nav-ul">
            <li><a href="#" id="tableauDeBord">Tableau de bord</a></li>
    
            <div class="separateur"></div>
            
            <li><a id="Enfants">Enfants</a>
                <ul class="sousMenu">
                    <li><a href="ajouterEnfant.php" >Ajouter un enfant</a></li>
                    <li><a href="#">Gérer les enfants</a></li>
                </ul>
            </li>        
            
            <div class="separateur"></div>
            
            <li><a id="Membres">Membres</a>
                <ul class="sousMenu">
                    <li><a href="gererMembre.php">Gérer les membres</a></li>
                </ul>
            </li>
            
            <div class="separateur"></div>
            
            <li><a id="Objectifs">Objectifs</a>
                <ul class="sousMenu">
                    <li><a href="creationObjectif.php">Créer un objectif</a></li>
                    <li><a href="#">Gérer les objectifs</a></li>
                </ul>
            </li>

            <div class="separateur"></div>

            <li><a id="Recompenses">Récompenses</a>
                <ul class="sousMenu">
                    <li><a href="#">Ajouter une récompense</a></li>
                    <li><a href="#">Gérer les récompenses</a></li>
                </ul>
            </li>
            
            <div class="separateur"></div>

            <li>
                <div id="centerDeconnexion">
                    <a href="modifierProfil.php" id="modifierProfil"><p class="txtBoutonDeconnexion">Placeholder profil</p></a>
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