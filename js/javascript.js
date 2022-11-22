
// //*Tous les formulaires sauf connexion
// const myForm = document.getElementById('form');
// myForm.addEventListener('submit', handleSubmit);
// var submitTimer;

// function handleSubmit(event) {
//   event.preventDefault();
//   submitTimer = setTimeout(() => {
//     this.submit();
//   }, 1500)
// }

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

function timedPopup(popupFen,time) {
    popup(popupFen);
    submitTimer = setTimeout(() => {
        eraseGray(popupFen);
    }, time);
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

//? PAGE GESTION MEMBRES
function Disable(ctrl){
    ctrl.setAttribute('disabled',true);
}