<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="">
  <title>Chat général youpi</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <div class="svgWaveContains">
    <div class="svgWave"></div>
  </div>

  <?php
  session_start();
  require('QUERY.php');
  testConnexion();
  faireMenu();

  if (champRempli(array('champSujet','champCorps'))){
          ajouterMessage(
          $_POST['champSujet'],
          $_POST['champCorps'],
          time(),
          $_POST['idObjectif'],
          $_SESSION['idConnexion']
          );
  }
  if (isset($_POST['idEnfant']) && isset($_POST['idObjectif'])){
    afficherMessage($_POST['idEnfant']);
  }

  ?>

  <h1>Test chat par équipe</h1>
  
  <form id="form" method="POST" onsubmit="erasePopup('erreurPopup'),erasePopup('validationPopup')" enctype="multipart/form-data">

    <div class="miseEnForme" id="miseEnFormeFormulaire">
      <?php 
      if (isset($_POST['idEnfant'])) {
        afficherNomPrenomEnfantSubmitEquipe($_POST['idEnfant'],$_SESSION['idConnexion']);
        afficherIntituleObjectif(null, $_POST['idEnfant']);    
      } else {
        afficherNomPrenomEnfantSubmitEquipe(null,$_SESSION['idConnexion']);
        echo '
        <p class=\'msgSelection\'>Veuillez choisir un enfant pour pouvoir sélectionner un objectif 
        afin de lui ajouter une récompense !</p>';
      }
      ?>
      <input type="text" name="champSujet" placeholder="Entrez votre sujet" minlength="1" maxlength="50" required>
      <input type="text" name="champCorps" placeholder="Ecrivez votre corps !" minlength="1" maxlength="500" required>
      <span></span>
      
      <!-- Mathieu -->
      <div id="chat">
        <div class="chatBox">
          <button id="closeChatbox" type="button" onclick="chatClose('chatBox','openChatButton')"><img src="images/annuler.png" alt="annuler" class="imageIcone"></button>
          
          <div id="scrollChat">     
            <p class="msgEntrant"><strong class="objetMsg">Objet</strong><br>Ce message est vraiment super long. En effet je veux tester le système de message et voir si c'est bien.</p>
            <p class="msgEntrant"><strong class="objetMsg">Objet</strong><br>Ce message est plus court que l'autre.</p>
            <p class="msgEntrant"><strong class="objetMsg">Objet</strong><br>Ratio + tu es cringe.</p>
            <p class="msgSortant"><strong class="objetMsg">Objet</strong><br>Je suis en train de te répondre grand fou.</p>
            <p id="lastMsg" class="msgEntrant"><strong class="objetMsg">Objet</strong><br>Ce message est vraiment super long. En effet je veux tester le système de message et voir si c'est bien.</p>
          </div>

          <div id="containerBoutonsChat">
            <button type="button" name="boutonSelecteurs" id="boutonSelecteurs"><img src="images/enfant.png" class="imageIcone" alt="icone selecteurs"></button>
            <button type="submit" name="boutonEnvoiMessage" onclick="return confirm('Êtes vous sûr de vouloir envoyer ce message ? Avez vous sélectionné un destinataire et un objectif ?')" id="boutonEnvoiMessage"><img src="images/envoi.png" class="imageIcone" alt="icone envoi"></button>
          </div>
        </div>
        
        <button type="button" id="openChatButton" onclick="chatOpen('chatBox','openChatButton'),scrollToLastMsg('lastMsg')"><img src="images/message.png" class="imageIcone" alt=""></button>
      </div>
      
    </form>
    <script src="js/javascript.js"></script>
</body>
</html>
    