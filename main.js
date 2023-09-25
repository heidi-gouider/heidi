import 'bootstrap/dist/css/bootstrap.css';
// import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.js';
// import { Carousel } from 'bootstrap';
import 'JAVASCRIPT/Carousel.js';
import './style.css';
// import 'bootstrap-icons/font/bootstrap-icons.css';


// menu responsive //
// let installButton = document.querySelector('#installButton');

// installButton.addEventListener('click', () => {
//     installButton.classList.remove('btn-danger');
//     installButton.classList.add('btn-success');
// });


// let body = document.querySelector("body");
// let icone = document.querySelector(".icone");

// section recherche //
// let section = document.querySelector("section");
// let video = document.querySelector("video");

// footer //
// let network = document.querySelector(".network");
// let footer = document.querySelector("footer");

// menu langue //

//////// LES CLASSES /////////

// menu responsive //
// icone.addEventListener("click", function () {
//     body.classList.toggle("actif");
// });

// évennement change au click/////

// section.img.addEventListener("click", function () {
//     section.classList.toggle("actif");
// });

// network.addEventListener("click", function () {
//     footer.classList.toggle("actif");
// });


// section.style.backgroundImage.classList.toggle("change");
// ------------------------------------------------------------------------------------------

//********* PAGE accueil ***********//
// - faire appraitre un texte de présentation savoureuse au survol de l'image => create element


// ------------------------------------------------------------------------------------------

//********* PAGE PLATS ***********//

// pour la vidéo, voir l'évennement pause dans la doc
// vidéo cursor pointer
// click pour mettre en pause
// click pour refaire jouer la boucle

//////// MODAL COMMANDE PAGE PLATS /////////
// const myModal = document.querySelector('#Modal')
// const myInput = document.getElementById('myInput')

// let forms = document.forms;
// for (var i = 0; i < forms.length; i++) {
//   var form = forms[i];
//   if (form.method === 'post' || form.method === 'POST') {
//     myModal.addEventListener('shown.bs.modal', () => {
//         myInput.focus()
//     })
//       }
// };

// ------------------------------------------------------------------------------------------

// ------------------------------------------------------------------------------------------
// FORMULAIRE

//********* PAGE contact ***********//

// la fonction "valider (e)" est appelée quand la soumission du formulaire est déclenchée
// j'utilise la méthode "checkValidity()" pour vérifier la validité du formulaire
// et la méthode "preventDefault()" pour empêcher l'envoi du formulaire si la validatin échoue
// j'ajoute la class bootstrap "was-validated" pour activer les styles de validation propre à la bibliothèque bs

//  VARIABLES //
let form = document.querySelector("#valid");
// let validForm = document.querySelector("#envoyer");
let validName = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
let validMail = /[^\s@]+@[^\s@]+\.[^\s@]+/;
let validTel = /^(\d{2}\/){4}\d{2}$/;
// tel = document.querySelector('#tel.value');
// form.tel.value.match(/\d{2}/g).join('-');
let messErreur = document.querySelector('.erreur');
// let messErreurMail= document.querySelector('.erreurMail');
// let messErreurTel= document.querySelectorAll('.erreurTel');
// let messErreurMess= document.querySelectorAll('.erreurMess');
// const inputNom = document.querySelector('#nom');
let formInputs = form.querySelectorAll('input');

// J'ajoute un écouteur "input" pour les champs du formulaire
formInputs.forEach(input => {
    input.addEventListener('input', () => {
        // input.addEventListener('blur', () => {

        // Je supprime la classe "was-validated" lorsqu'un champ est modifié
        form.classList.remove("was-validated");

        // Je masque le message d'erreur associé au champ modifié
        const errorElement = input.parentElement.querySelector('.erreur');
        if (errorElement) {
            errorElement.innerHTML = '';
        }
    });
});
// j'ajoute un écouteur sur le formulaire pour l'évennement "submit"ou "click" ma fonction valider est appelé
form.addEventListener('submit', valider);
// validForm.addEventListener('click', valider);

function valider(e) {
    // e.preventDefault();

    // si champ vide
    if (!form.checkValidity()) {
        e.preventDefault();
        // e.stopPropagation()
        // console.log('formulaire invalide');
        form.classList.add("was-validated");
        // return;
    }
    if (!validName.test(form.nom.value)) {
        // inputNom.value="";
        messErreur.innerHTML = 'Format Nom invalide !';
        e.preventDefault();
        // return;

        // messErreur.textContent= "Texte modifié";
        // alert("erreur : Format nom invalide !");
    }
    if (!validMail.test(form.email.value)) {
        messErreurMail.innerHTML = 'Email invalide !';
        e.preventDefault();
        // return;

        // alert("Format Email invalide !")
    }
    if (!validTel.test(form.tel.value)) {
        messErreurTel.innerHTML = 'Format téléphone invalide !';
        e.preventDefault();
        // return;

        // alert("Format Email invalide !")
    }

    // alert("Le formulaire a été soumis avec succès !");
    form.classList.add("was-validated");
    return;

    // if (form.checkValidity() && validName.test(form.nom.value) && validMail.test(form.email.value) && validTel.test(form.tel.value)) {
    // Le formulaire est valide et prêt à être soumis

    // Afficher un message de succès
    //     alert("Le formulaire a été soumis avec succès !");
    // } else {
    // Le formulaire n'est pas valide, empêche la soumission
    //     e.preventDefault();
    // }

};

//********* MODAL ***********//
// FORMULAIRE

//********* PAGE contact ***********//
  // Fonction pour afficher la modal
  function afficherModal() {
    // Afficher la modal (vous pouvez utiliser ici votre propre code pour afficher la modal)
    alert("C'est OK ! Vos données ont été enregistrées avec succès.");
}

// Vérifier si le formulaire a été soumis avec succès
let urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('success') === '1') {
    // Appeler la fonction pour afficher la modal
    afficherModal();
}
// AFFICHAGE MODAL //
// $('#valid').on('submit', valider);
// $('.validation').on('submit', valider);

// const myModal = document.querySelector('#Modal');
// const myInput = document.getElementById('myInput');

// myModal.addEventListener('shown.bs.modal', () => {
//     myInput.focus();
// });

// myModal.addEventListener('hidden.bs.modal', () => {
//     // Remplacez "votre_page_redirection.php" par le nom du fichier PHP vers lequel vous souhaitez rediriger l'utilisateur.
//     window.location.href = 'votre_page_redirection.php';
// });


// ********* PAGE commande ***********//

// let validFormAnim= document.querySelector(".btn-joke");

// validFormAnim.addEventListener('click', valider);

// function valider() {
//     if (form.checkValidity() == false) {
//         e.preventDefault();
//     } else {
//         $("#modal").modal("show");
//     }
//     form.classList.add("was-validated");
// };

//////// MODAL  /////////

// $('#valid').on('click',valider);
// $('.validation').on('click',valider);

// const myModal = document.querySelector('.Modal')
// const myInput = document.getElementById('myInput')

// let forms = document.forms;
// for (var i = 0; i < forms.length; i++) {
//   let form = forms[i];
//   if (form.method === 'post' || form.method === 'POST') {
//     myModal.addEventListener('shown.bs.modal', () => {
//         myInput.focus()
//     });
// const closeButton = document.querySelector('.modal .close');
// closeButton.addEventListener('click', () => {
//   window.location.href = 'category.php';
// });

//       }
// };

//il faut faire en sorte que l'event se declanche au click button et pas sur le onclick de la zone "votre message"


// fermeture de la modal et redirection
  // Lorsque l'utilisateur ferme la modal, redirigez-le vers une page spécifique
//   const closeButton = document.querySelector('.modal .close');
//   closeButton.addEventListener('click', () => {
//     window.location.href = 'category.php';
//   });

