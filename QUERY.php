<?php

/*
/ --------------------------------------------------------------------------------------------------------------------------
/ -----------------------------------------------Liste des requetes---------------------------------------------------------
/ --------------------------------------------------------------------------------------------------------------------------
*/

// ----------------------------------------------Enfant---------------------------------------------------------------------

// requete pour ajouter un enfant a la BD
$qAjouterEnfant = 'INSERT INTO enfant (Nom,Prenom,Date_Naissance,Lien_Jeton) 
                    VALUES (:nom , :prenom, :dateNaissance, :lienJeton)';

// requete pour verifier qu'un enfant avec les données en parametre n'existe pas deja dans la BD
$qEnfantIdentique = 'SELECT Nom, Prenom, Date_Naissance FROM enfant 
                    WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance';

// requete pour afficher le nom prenom de tous les enfants dont un membre s'occupe (pour le moment ca affiche tout le monde)
$qAfficherNomPrenomEnfant = 'SELECT Id_Enfant, Nom,Prenom FROM Enfant ORDER BY Nom';

// ----------------------------------------------Membre---------------------------------------------------------------------

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
                                Ville = :ville, Mdp = :mdp, Pro = :pro WHERE Id_Membre = :idMembre';

// requete pour vérifier qu'un membre avec les données en parametre n'existe pas deja dans la BD
$qMembreIdentique = 'SELECT Nom, Prenom, Date_Naissance, Courriel FROM membre 
                    WHERE Nom = :nom AND Prenom = :prenom AND Date_Naissance = :dateNaissance AND Courriel = :courriel';

// requete pour rechercher le prenom du membre connecté
$qAfficherPrenomMembre = 'SELECT Prenom FROM Membre WHERE Id_Membre = :idMembre';

// ----------------------------------------------Objectif-------------------------------------------------------------------

// requete pour ajouter un objectif a la BD
$qAjouterObjectif = 'INSERT INTO objectif (Intitule,Duree,Lien_Image,Priorite,Travaille,Nb_Jetons,Id_Membre,Id_Enfant,
                    Nb_Tampons,Nb_Tampons_Places) VALUES (:intitule, :duree, :lienObjectif, :priorite, :travaille, :nbJetons, 
                    :idMembre, :idEnfant, :nbTampons, :nbTamponsPlaces)';

// requete pour afficher les objectifs de la BD
$qAfficherObjectifs = 'SELECT Id_Objectif, Intitule, Duree, Priorite, Nb_Jetons, Travaille FROM objectif WHERE Id_Enfant = :idEnfant';

//requete de modification d'Objectif
$qModifierInformationsObjectif = 'UPDATE objectif SET Intitule = :intitule, Duree = :duree, Lien_Image = :lienImage, Priorite = :priorite, 
                                Travaille = :travaille,Nb_Jetons = :nbJetons,  Nb_Tampons = :nbTampons WHERE id_Membre = :idMembre 
                                AND id_Enfant = idEnfant';

// requete pour supprimer un objectif selon son Id_Objectif
$qSupprimerObjectif = 'DELETE FROM objectif WHERE Id_Objectif = :idObjectif';

// requete pour afficher les objectifs de la BD
$qAfficherInformationUnObjectif = 'SELECT Id_Objectif, Intitule, Duree, Priorite, Nb_Jetons, Travaille FROM objectif WHERE Id_Objectif = :idObjectif';

// ----------------------------------------------Recompense-----------------------------------------------------------------

// requete pour ajuter une recompense a la BD
$qAjouterRecompense = 'INSERT INTO recompense (Intitule,Descriptif,Lien_Image,id_Enfant,Cout_Jetons) 
                        VALUES (:intitule ,:descriptif,:lienImage,:idEnfant,:coutJetons)';

// requete pour rechercher une recompense selon son Id_Recompense
$qRechercherRecompense = 'SELECT * FROM Recompense WHERE id_Recompense = :idRecompense';

// requete pour modifier les informations d'une recompense selon son Id_Recompense
$qModifierRecompense = 'UPDATE recompense SET Intitule = :intitule, Descriptif = :descriptif, Lien_Image = :lienImage , Cout_Jetons = :coutJetons
                        WHERE id_Recompense = :idRecompense';

// requete pour supprimer une recompense selon son id
$qSupprimerRecompense = 'DELETE FROM Recompense WHERE Id_Recompense = :idRecompense';

// requete pour afficher toutes les recompenses d'un enfant donne
$qAfficherRecompense = 'SELECT * FROM recompense WHERE Id_Enfant = :idEnfant';
/*
/ --------------------------------------------------------------------------------------------------------------------------
/ -----------------------------------------------Liste des fonctions--------------------------------------------------------
/ --------------------------------------------------------------------------------------------------------------------------
*/

// -----------------------------------------------Générales-----------------------------------------------------------------

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
        <a href="#"><img src="images/logo.png" alt="logo" class="logo"></a>
        
        <div class="nav-links">
          <ul class="nav-ul">
            <li><a href="tableauDeBord.php" id="tableauDeBord">Tableau de bord</a></li>
    
            <div class="separateur"></div>
            
            <li><a id="Enfants">Enfants</a>
                <ul class="sousMenu">
                    <li><a href="ajouterEnfant.php" >Ajouter un enfant</a></li>
                    <li><a href="#">Mon équipe d\'enfants</a></li>
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
                    <li><a href="gererObjectifs.php">Gérer les objectifs</a></li>
                </ul>
            </li>

            <div class="separateur"></div>

            <li><a id="Recompenses">Récompenses</a>
                <ul class="sousMenu">
                    <li><a href="ajouterRecompense.php">Ajouter une récompense</a></li>
                    <li><a href="#">Gérer les récompenses</a></li>
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

// -----------------------------------------------Enfant--------------------------------------------------------------------

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

// fonction qui permet d'afficher le nom et le prenom de chaque enfant dans un select(html)
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
function afficherNomPrenomEnfantSubmit()
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
            if ($key == 'Prenom') {
                echo '<option value=' . $idEnfant . '>' . $nom . " " . $value . '</option>';
            }
        }
    }
    echo '</select>';
}

// -----------------------------------------------Membre--------------------------------------------------------------------

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
function modifierMembreSession($idMembre, $nom, $prenom, $adresse, $codePostal, $ville, $mdp, $pro)
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
    // execution de la requete sql
    $req->execute(array(':id' => clean($idMembre)));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour supprimer un membre de la BD');
    }
}

// -----------------------------------------------Objectif------------------------------------------------------------------

// fontion qui permet d'ajouter un objectif a la BD
function ajouterObjectif($intitule, $duree, $lienObjectif, $priorite, $travaille, $nbJetons, $idMembre, $idEnfant, $nbTampons, $nbTamponsPlaces)
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
        ':duree' => clean($duree),
        ':lienObjectif' => clean($lienObjectif),
        ':priorite' => clean($priorite),
        ':travaille' => clean($travaille),
        ':nbJetons' => clean($nbJetons),
        ':idMembre' => clean($idMembre),
        ':idEnfant' => clean($idEnfant),
        ':nbTampons' => clean($nbTampons),
        ':nbTamponsPlaces' => clean($nbTamponsPlaces)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un objectif a la BD');
    }
}

// fonction qui permet d'afficher tous les objectif de la BD pour un enfant donnee
function afficherObjectifs($idEnfant)
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
            if ($key == 'Intitule') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Priorite') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Duree') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Nb_Jetons') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Travaille') {
                echo '<td>' . $value . '</td>';
            }
            if ($key == 'Id_Objectif') {
                $idObjectif = $value;
            }
        }
        echo '
            <td>
            <button type="submit" name="boutonModifier" value="' . $idObjectif . '" 
             class="boutonModifier" onclick="window.location=\'modifierObjectifs.php\'" >
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idObjectif . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer ce membre ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
    }
}

// fonction qui permet de modifier un objectif de la BD
function modifierObjectif($intitule, $duree, $lienImage, $priorite, $travaille, $nbJetons, $nbTampons, $idMembre, $idEnfant)
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
        ':duree' => clean($duree),
        ':lienImage' => clean($lienImage),
        ':priorite' => clean($priorite),
        ':travaille' => clean($travaille),
        ':nbJetons' => clean($nbJetons),
        ':nbTampons' => clean($nbTampons),
        ':idMembre' => clean($idMembre),
        ':idEnfant' => clean($idEnfant)
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

// -----------------------------------------------Recompense--------------------------------------------------------------

// fonction qui permet d'ajouter un recompense a la BD
function ajouterRecompense($intitule, $descriptif, $lienImage, $idEnfant, $coutJetons)
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
        ':descriptif' => clean($descriptif),
        ':lienImage' => clean($lienImage),
        ':idEnfant' => clean($idEnfant),
        ':coutJetons' => clean($coutJetons)
    ));
    if ($req == false) {
        die('Erreur ! Il y a un probleme lors l\'execution de la requete pour ajouter un enfant a la BD');
    }
}

// fonction qui permet de modifier les informations d'une recompense selon son Id_Recompense
function modifierRecompense($intitule, $descriptif, $lienImage, $idRecompense,$coutJetons)
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
        ':idRecompense' => clean($idRecompense),
        ':coutJetons' => clean($coutJetons)

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
            }elseif ($key == 'Cout_Jetons') {
                echo '<label for="champCoutJetons">Prix de la recompense :</label>
                <input type="text" name="champCoutJetons"  maxlength="50" value="' . $value . '"  required>
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
            if ($key == 'Cout_Jetons') {
                echo '<td>' . $value . '</td>';
            }
        }
        echo '
            <td>
            <button name="boutonModifier" value="' . $idEnfant . '" 
             class="boutonModifier" onclick="window.location=\'modifierRecompense.php\'" >
                <img src="images/edit.png" class="imageIcone" alt="icone modifier">
                <span>Modifier</span>
            </button>
            </td>
            <td>
            <button type="submit" name="boutonSupprimer" value="' . $idEnfant . '
            " class="boutonSupprimer" onclick="return confirm(\'Êtes vous sûr de vouloir supprimer cette recompense ?\');" >
                <img src="images/bin.png" class="imageIcone" alt="icone supprimer">
                <span>Supprimer</span>
            </button>
            </td>
        </tr>';
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