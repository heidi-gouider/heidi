import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap/dist/js/bootstrap.js'
import $ from 'jquery';

import '../../../FRONT/STATIQUE/CSS/contact.css'


////// VALIDATION FORMULAIRE DE CONTACT //////

//***  variables ***//

// je récupère mon formulaire



let form = document.querySelector(".validation");




//***  évennement / fonction / classe ***//

// j'ajoute un écouteur sur le formulaire pour l'évennement "submit"


form.addEventListener("submit", (valider));



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