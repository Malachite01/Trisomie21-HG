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
    aCacher1.style.display = "block";
    aCacher1.classList.toggle('fenButtonOn');
    aCacher1.classList.remove('fenButtonOff');
    var elements = document.querySelectorAll( "body > *:not(.validationPopup):not(.erreurPopup):not(.supprPopup):not(.editPopup):not(.aCacher):not(.containerStats):not(#boutonStats)" );
    Array.from( elements ).forEach( s => s.style.filter = "grayscale(100%) blur(3px)");
}

function fenClose(aCacher) {
    aCacher1 = document.querySelector("." + aCacher);
    aCacher1.classList.toggle('fenButtonOn');
    aCacher1.classList.add('fenButtonOff');
    var elements = document.querySelectorAll( "body > *:not(.validationPopup):not(.erreurPopup):not(.supprPopup):not(.editPopup):not(.aCacher):not(.containerStats)" );
    Array.from( elements ).forEach( s => s.style.filter = "");
    setTimeout(function(){
        aCacher1.style.display = "none";
    }, 600);
}

function fenOpenStats(aCacher) {
    aCacher1 = document.querySelector("." + aCacher);
    aCacher1.style.display = "block";
    if(aCacher1.classList.contains('statsButtonOn')) {
        fenCloseStats(aCacher);
    } else {
        aCacher1.classList.toggle('statsButtonOn');
        aCacher1.classList.remove('statsButtonOff');
        setTimeout(function(){
            scrollToButton('pie-chart');
        }, 300);
    }
}

function fenCloseStats(aCacher) {
    aCacher1 = document.querySelector("." + aCacher);
    aCacher1.classList.toggle('statsButtonOn');
    aCacher1.classList.add('statsButtonOff');
    setTimeout(function(){
        aCacher1.style.display = "none";
    }, 600);
}

function deCache(div) {
    aCacher = document.querySelector("." + div);
    if(aCacher.classList.contains('transparent')) {
        aCacher.classList.remove('transparent');
    } 
}


function holdSubmit(event) {
    let form = document.getElementById("formConsulter");
    //permettre de recuperer en $_POST['boutonRecuperer']
    let hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "boutonRecuperer");
    hiddenInput.setAttribute("value", "true");
    form.appendChild(hiddenInput);
    let formData = new FormData(form);
    event.preventDefault();
    let gifDuration = 2.5; // duration of the gif
    let target = event.target;
    let image = new Image();
    rand = Math.round(Math.random() * 10);
    if(rand <= 5) {
        image.src = 'images/ouvertureKdo.gif';
    } else if(rand > 5 && rand <= 10) {
        image.src = 'images/ouvertureKdo2.gif';
    }
    image.classList.add('ouvertureKdo');
    form.appendChild(image);
    setTimeout(function(){
        form.submit();
    }, gifDuration * 1000);
}

function createPieChart(value1, value2) {
    value1 = document.getElementById(value1).value;
    value2 = document.getElementById(value2).value;

    // Définir les données pour les sections du graphique
    var data = {
        labels: ['Pourcentage de séances réussies', 'Pourcentage de séances incomplètes'],
        datasets: [{
            data: [value1, value2], // les valeurs en pourcentage
            backgroundColor: ['#8bc196', '#ff7474'],
            hoverBackgroundColor: ['#6aaf78', '#ff3333']
        }]
    };

    // Récupérer le conteneur pour le graphique
    var ctx = document.getElementById('pie-chart').getContext('2d');

    // Créer le graphique en forme de camembert
    setTimeout(function(){
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: false
            }
        });
    }, 600);
    
}

function verifIdPasVide() {
    var bouton = document.getElementById('boutonEnvoiMessage');
    if(document.getElementById('idObjectif').value == "") {
        bouton.disabled = true;
        bouton.style.backgroundColor = "grey";
        bouton.style.cursor = "not-allowed";
        if(document.getElementById('doitSelectionnerObj') == null) {
            var html = "<p id='doitSelectionnerObj' class='msgSelectionErreurFonctions'>Veuillez choisir un objectif avant d'envoyer un message</p>";
            document.getElementById('scrollChat').insertAdjacentHTML("beforeend", html); 
        }
        document.getElementById('idObjectif').setAttribute('onchange','verifIdPasVide()');
    } else {
        bouton.disabled = false;
        bouton.style.backgroundColor = "#5aabcb";
        bouton.style.cursor = "pointer";
        if(document.getElementById('doitSelectionnerObj') != null) {
            document.getElementById('doitSelectionnerObj').remove();
        }
    }
}

  
