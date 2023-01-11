//*CHARGEMENT
//Donne la valeur 0 a opacité si la page a fini de charger
window.addEventListener('load', function(){
    var loadingWrapper = document.querySelector('.loading-wrapper');
    loadingWrapper.style.opacity = 0;
    if(loadingWrapper.style.opacity == 0){
        setTimeout(assigner0,600);
        function assigner0() {
          loadingWrapper.style.display ='none';
        }
    }
});

//*MENU 
function menuMobile(nav) {
    navLinks = document.querySelector("." + nav);
    navLinks.classList.toggle('mobile-menu');
}

function popup(popup) {
    var popupFen = document.querySelector('.' + popup);
    var elements = document.querySelectorAll( "body > *:not(.validationPopup):not(.erreurPopup):not(.supprPopup)" );
    Array.from( elements ).forEach( s => s.style.filter = "grayscale(60%)");
    popupFen.style.display = 'block';
}

function erasePopup(popup) {
    var popupFen = document.querySelector('.' + popup);
    popupFen.style.display = 'none';
}

function eraseGray(popup) {
    var popupFen = document.querySelector('.' + popup);
    var elements = document.querySelectorAll( "body > *:not(.validationPopup):not(.erreurPopup):not(.supprPopup)" );
    Array.from( elements ).forEach( s => s.style.filter = "grayscale(0%)");
    popupFen.style.display = 'none';
}

//? PAGE DE CONNEXION
function afficherMDP(nomIdChamp, nomIdOeil) {
    var champ = document.getElementById(nomIdChamp);
    var icone = document.getElementById(nomIdOeil);
    if (champ.type === "password") {
        champ.type = "text";
        icone.src = "images/oeil.png";
    } else {
        champ.type = "password";
        icone.src = "images/oeilFermé.png";
    }
}

function refreshImageSelector(nomIdChamp,idImage) {
    const [file] = document.getElementById(nomIdChamp).files
    if (file) {
        document.getElementById(idImage).src = URL.createObjectURL(file);
    } 
}

//? PAGE AJOUT DE MEMBRE
function validerConfirmationMdp(champ1,champ2,message,bouton) {
    var mdp1 = document.getElementById(champ1).value;
    var mdp2 = document.getElementById(champ2).value;
    var mess = document.getElementById(message);
    var btn = document.getElementById(bouton);
    if(mdp1 == mdp2) {
        mess.innerText = " ";
        btn.style.backgroundColor = "rgb(139, 193, 150)";
        document.getElementById(champ1).style.border = "none";
        document.getElementById(champ2).style.border = "none";
        btn.disabled = false;
    }
    else {
        mess.innerText = "Les mots de passe ne correspondent pas !";  
        btn.style.backgroundColor = "grey";
        document.getElementById(champ1).style.border = "2px solid rgb(255, 77, 77)";
        document.getElementById(champ2).style.border = "2px solid rgb(255, 77, 77)";
        btn.disabled = true;
    }
}

function validerConfirmationMdpProfil(champ1,champ2,message,bouton) {
    var mdp1 = document.getElementById(champ1).value;
    var mdp2 = document.getElementById(champ2).value;
    var mess = document.getElementById(message);
    var btn = document.getElementById(bouton);
    if(mdp1 == mdp2) {
        mess.innerText = " ";
        btn.style.backgroundColor = "rgb(103, 193, 228)";
        document.getElementById(champ1).style.border = "none";
        document.getElementById(champ2).style.border = "none";
        btn.disabled = false;
    }
    else {
        mess.innerText = "Les mots de passe ne correspondent pas !";  
        btn.style.backgroundColor = "grey";
        document.getElementById(champ1).style.border = "2px solid rgb(255, 77, 77)";
        document.getElementById(champ2).style.border = "2px solid rgb(255, 77, 77)";
        btn.disabled = true;
    }
}

//? PAGE GESTION MEMBRES
function Disable(ctrl){
    ctrl.setAttribute('disabled',true);
}

function chatOpen(chat,chatButton) {
    chatMsg = document.querySelector("." + chat);
    chatMsg.classList.toggle('chatBoxOn');
    chatMsg.classList.remove('chatBoxOff');
    
    oChatButton = document.querySelector("#" + chatButton);
    oChatButton.classList.toggle('chatButtonOff');
    oChatButton.classList.remove('chatButtonOn');
}


function chatClose(chat,chatButton) {
    chatMsg = document.querySelector("." + chat);
    chatMsg.classList.toggle('chatBoxOn');
    chatMsg.classList.add('chatBoxOff');

    oChatButton = document.querySelector("#" + chatButton);
    oChatButton.classList.toggle('chatButtonOff');
    oChatButton.classList.add('chatButtonOn');
}

function scrollToLastMsg(id) {
    document.getElementById(id).scrollIntoView();
}

function selectMsgToggle(select) {
    selectMsg = document.querySelector("#" + select);
    if(selectMsg.classList.contains('selecteursMsgOn')) {
        selectMsg.classList.remove('selecteursMsgOn');
        selectMsg.classList.add('selecteursMsgOff');
    } else {
        selectMsg.classList.add('selecteursMsgOn');
        selectMsg.classList.remove('selecteursMsgOff');
    }
}

function scrollToButton(id) {
    setTimeout(function () {
        document.getElementById(id).scrollIntoView();
    }, 300);
}

function fenOpen(aCacher) {
    aCacher1 = document.querySelector("." + aCacher);
    aCacher1.classList.toggle('equipeButtonOn');
    aCacher1.classList.remove('equipeButtonOff');
    var elements = document.querySelectorAll( "body > *:not(.validationPopup):not(.erreurPopup):not(.supprPopup):not(.aCacher)" );
    Array.from( elements ).forEach( s => s.style.filter = "grayscale(100%) blur(3px)");
}

function fenClose(aCacher) {
    aCacher1 = document.querySelector("." + aCacher);
    aCacher1.classList.toggle('equipeButtonOn');
    aCacher1.classList.add('equipeButtonOff');
    var elements = document.querySelectorAll( "body > *:not(.validationPopup):not(.erreurPopup):not(.supprPopup):not(.aCacher)" );
    Array.from( elements ).forEach( s => s.style.filter = "grayscale(0%)  blur(0px)");
}

function deCache(div) {
    aCacher = document.querySelector("." + div);
    if(aCacher.classList.contains('transparent')) {
        aCacher.classList.remove('transparent');
    } 
}

function holdSubmit() {
    let form = document.getElementById("formConsulter");
    let gifDuration = 2.5; // duration of the gif
    let target = event.target;
    if (target.tagName === 'BUTTON' && target.name === 'boutonRecuperer') {
        event.preventDefault();
        let image = new Image();
        image.src = 'images/ouvertureKdo.gif';
        image.classList.add('ouvertureKdo');
        form.appendChild(image);
        setTimeout(function(){
            form.submit();
        }, gifDuration * 1000);
    } 
}

function submitForm(formId, divId, url) {
    // Récupère l'élément formulaire
    var form = document.getElementById(formId);
  
    // Ajoute un gestionnaire d'événement pour le formulaire
    form.addEventListener("submit", function(event) {
      // Empêche le rechargement de la page
      event.preventDefault();
  
      // Crée un objet XMLHttpRequest
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Met à jour le contenu de l'élément div
          document.getElementById(divId).innerHTML = this.responseText;
        }
      };
  
      // Ouvre une requête HTTP en utilisant le formulaire et l'envoie
      xhttp.open("POST", url, true);
      xhttp.send(new FormData(form));
    });
  }
  