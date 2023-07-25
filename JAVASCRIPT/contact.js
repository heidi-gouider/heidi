import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import $ from 'jquery';

import '/FRONT/STATIQUE/CSS/contact.css'


////// VALIDATION FORMULAIRE DE CONTACT //////

//***  variables ***//

// je récupère mon formulaire

// ------------------------------------------------------------------------------------------
// FORMULAIRE

//********* PAGE contact ***********//
// AFFICHAGE MODAL //
$('#valid').on('submit', valider);
$('.validation').on('submit', valider);

const myModal = document.querySelector('#Modal');
const myInput = document.getElementById('myInput');

myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus();
});

myModal.addEventListener('hidden.bs.modal', () => {
    // Remplacez "votre_page_redirection.php" par le nom du fichier PHP vers lequel vous souhaitez rediriger l'utilisateur.
    window.location.href = 'votre_page_redirection.php';
});


// la fonction "valider (e)" est appelée quand la soumission du formulaire est déclenchée
// j'utilise la méthode "checkValidity()" pour vérifier la validité du formulaire
// et la méthode "preventDefault()" pour empêcher l'envoi du formulaire si la validatin échoue
// j'ajoute la class bootstrap "was-validated" pour activer les styles de validation propre à la bibliothèque bs
// J'utilise la fonction "modal()" de jQuery pour afficher une modal

//  variables je récupère mon formulaire //
// let form = document.querySelector(".validation");
// let validForm = document.querySelector("#envoyer");
// let validName = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
// let invalidName = document.querySelectorAll('.invalidName');
// let invalidName= document.querySelector('#nom placeholder');

// j'ajoute un écouteur sur le formulaire pour l'évennement "submit"ou "click" ma fonction valider est appelé
// form.addEventListener('submit', valider);
// validForm.addEventListener('click', valider);


// function valider(e) {
//     if (form.checkValidity() == false) {
//         e.preventDefault();
//         console.log('formulaire invalide');
//     }
//     if (validName.test(form.nom.value) == false || validName.test(form.prenom.value) == false) {
//         alert("erreur : Format invalide !");
//     }
//     form.classList.add("was-validated");

// };

// let form = document.querySelector(".validation");




//***  évennement / fonction / classe ***//

// j'ajoute un écouteur sur le formulaire pour l'évennement "submit"


// form.addEventListener("submit", (valider));



// la fonction "valider (e)" est appelée quand la soumission du formulaire est déclenchée
// j'utilise la méthode "checkValidity()" pour vérifier la validité du formulaire
// et la méthode "preventDefault()" pour empêcher l'envoi du formulaire si la validatin échoue
// j'ajoute la class bootstrap "was-validated" pour activer les styles de validation propre à la bibliothèque bs
// J'utilise la fonction "modal()" de jQuery pour afficher une modal

// $('#valid').on('click',valider);
// $('.validation').on('click',valider);


// function valider() {
//     if (form.checkValidity() == false) {
//         e.preventDefault();
//     } else {
//         $("#modal").modal("show");
//     }
//     form.classList.add("was-validated");
// }

//il faut faire en sorte que l'event se declanche au click button et pas sur le onclick de la zone "votre message"