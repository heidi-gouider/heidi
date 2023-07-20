import 'bootstrap/dist/css/bootstrap.css';
// import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.js';
// import { Carousel } from 'bootstrap';

import './style.css';
import 'bootstrap-icons/font/bootstrap-icons.css';


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

//********  CAROUSEL ***********//

//  1- Le carousel doit afficher 3img actives
//  2- lors du slide, la 1ere img fait place à une 4eme qui prend la 3eme position
//  3- l'img active centrale aura un effet zoom

// let carousel = document.querySelector(".carousel");
// bouttons = document.querySelectorAll("button i");

// let isSlideStart = false;
// const slideStart = () => {
//     isSlideStart = true;
// };

// let sliding = (e) => {
//     if (!isSlideStart) return;
//     e.preventDefault();
//     carousel.scrollLeft = e.pageX;
// };
// let slideStop = () => {
//     slideStart = false;
// };

// carousel.addEventListener("mousedown", slideStart);
// carousel.addEventListener("mousemove", sliding);
// carousel.addEventListener("mouseup", slideStop);
// pour ne pas attendre que les feuilles de style etle reste soi chargé
// window.addEventListener('DOMContentLoaded', () => {
// ------------------------------------------------------------------------------------------

//     let carouselInstance = new Carousel(carousel, {
//         interval: 3000,
//         perPage: 3,  // Nombre d'images visibles à la fois
//         slide: true,  // Activer le défilement
//         pause: 'hover',  // Pause au survol
//         wrap: true  // Boucler à la fin du carousel
//     });
// });
// je récuprère les éléments sur lesquelles je vais créer un event
// const carousel = document.querySelector('#carousel');
// let slides = Array.from(document.querySelectorAll('.carousel-item img'));
// let boutton = document.querySelector('.boutton');


// PARCOURIR LES IMG DU CAROUSEL (élément du tableau)//

// for (let i = 0; i < slides.length; i++) {
//     console.log(slides[i]);
//   };

// ou

//   slides.forEach((slide) => {
//     console.log(slide);

//   });

//   ou

// slides.forEach(index => console.log(index));

// console.log(slides[1]);

// EVENEMENT//

// je vais utiliser des evenement avec des propriétés de la classe carousel de bootstrap
// La fonction de rappel sera exécutée à chaque fois que l'événement slide.bs.carousel est déclenché sur l'élément myCarousel.
// carousel.addEventListener('slide.bs.carousel', event => {
// boutton.addEventListener('slide.bs.carousel', event => {

// Code exécuté lorsque l'événement slide.bs.carousel est déclenché
// let activeSlide = event.relatedTarget;
// let activeIndex = slides.indexOf(activeSlide);

//   slides.forEach((slide) => {
// let firstSlide = slides.shift();
// firstSlide.push;


//   });


// activeSlide.classList.add('zoomed-item');
// Ajoutez la classe de zoom uniquement à l'image active
// slides.forEach((slide, index) => {
//     if (index === 1) {
//         slide.classList.add('zoomed-item');
//     } else {
//         slide.classList.remove('zoomed-item');
//     }
// });

// slide.classList.remove('zoomed-item');

// Je déplace la première img à la fin du carousel
// puis je la remplace avec la deusième
// la troisème position une nouvelle item apparaitra
// slides = slides.map((slide, index) => {
//     let newIndex = (index - 1 + slides.length) % slides.length;
//     return slides[newIndex];
//   });

// slides.forEach((slide, index) => {
//     // let newIndex = (index - 1 + slides.length) % slides.length;
//     let newIndex = (index - 1 + slides) % slides.length;
//     slides[0].push();
//     slides.splice(newIndex, 0, slide);
//     slides.pop();
//   });
//     slides.forEach((slide, index) => {
//     slides.push(slides[0]);
//     slides[0].replaceWith(slides[1]);
//     carousel.insertBefore(newSlide, carousel.children[2]);
//     let newSlide = slides[3];
//     slides.splice(2, 0, newSlide);
// });
// let newSlide = slides[3];

// Ajoutez la classe de zoom uniquement à l'image active
// slides.forEach((slide, index) => {
//     if (index < 3) {
//         slide.classList.remove('active');
//     slides.push(slides[0]);
//     slides[0].replaceWith(slides[1]);
//     slides.splice(0, 2, newSlide);

//     }

// });

// let activeSlide = event.relatedTarget;
// let activeIndex = slides.indexOf(activeSlide);

// la première diapositive (index 0) de la liste slides aura sa classe "active" supprimée,
// puis elle sera remplacée par la deusième(index 1).
// slides[activeIndex].classList.remove('active');

// Je sélectionne la première image active
// let firstSlide = carousel.querySelector('.carousel-item:first-child');

// Je supprime la classe 'active' de la première image
// firstSlide.classList.remove('active');
// slides[0].classList.remove('active');


// Je déplace la première img à la fin du carousel
// let firstSlide = slides.shift();
// slides.push(firstSlide);
// slides[0].push(firstSlide);
// carousel.insertBefore(newSlide, carousel.children[2]);

// carousel.appendChild(firstSlide);

// Je clone la quatrième img et la place à la troisieme position
// let newSlide = slides[2].cloneNode(true);
// slides.splice(2, 0, newSlide);

// Je supprime la classe de zoom de toutes les img
// Array.from(slides).forEach(function (slide) {
//     slide.classList.remove('zoomed-item');
// });

// J'ajoute la classe de zoom à l'img centrale et aux img voisines
// activeSlide.classList.add('zoomed-item');

// let newSlide = createNewSlide();
// newSlide.classList.add('carousel-item');
// slides.splice(2, 0, newSlide);
// carousel.insertBefore(newSlide, carousel.children[2]);

// carousel.appendChild(slides[0]);


// Array.from(slides).forEach(function (slide) {
//     slide.classList.remove('zoomed-item');
// mise à jour des classes pour les slide
// slides.forEach((slide, index) => {
//     if (index < 3) {
//         slide.classList.add('active');
//     } else {
//         slide.classList.remove('active');
//     }
//     slide; classList.remove('zoomed-item');
// });
// activeSlide.classList.add('zoomed-item');
// Ajoutez la classe de zoom uniquement à l'image active
// slides.forEach((slide, index) => {
//     slide.classList.remove('zoomed-item');
//     if (index === activeIndex) {
//         slide.classList.add('zoomed-item');
//     }
// });
// });

// form.addEventListener("submit", (valider));

// $(function () {
//     $('#carousel').carousel();
// });
// ------------------------------------------------------------------------------------------
// FORMULAIRE

//********* PAGE contact ***********//

// la fonction "valider (e)" est appelée quand la soumission du formulaire est déclenchée
// j'utilise la méthode "checkValidity()" pour vérifier la validité du formulaire
// et la méthode "preventDefault()" pour empêcher l'envoi du formulaire si la validatin échoue
// j'ajoute la class bootstrap "was-validated" pour activer les styles de validation propre à la bibliothèque bs

//  variables je récupère mon formulaire //
let form = document.querySelector("#valid");
// let validForm = document.querySelector("#envoyer");
let validName = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
let validMail = /[^\s@]+@[^\s@]+\.[^\s@]+/;
let validTel = 	/^(\d{2}\/){4}\d{2}$/;
// tel = document.querySelector('#tel.value');
// form.tel.value.match(/\d{2}/g).join('-');
let messErreur= document.querySelector('.erreur');
let messErreurMail= document.querySelector('.erreurMail');
let messErreurTel= document.querySelectorAll('.erreurTel');
let messErreurMess= document.querySelectorAll('.erreurMess');

// const inputNom = document.querySelector('#nom');

// j'ajoute un écouteur sur le formulaire pour l'évennement "submit"ou "click" ma fonction valider est appelé
form.addEventListener('submit', valider);
// validForm.addEventListener('click', valider);


function valider() {
    // si champ vide
    if (!form.checkValidity()) {
        preventDefault();
        stopPropagation()
        // console.log('formulaire invalide');
    }
    if (!validName.test(form.nom.value)){
        e.preventDefault();
        // inputNom.value="";
        messErreur.innerHTML='Format invalide !'
        // messErreur.textContent= "Texte modifié";
        // alert("erreur : Format nom invalide !");
    }
    if (! validMail.test(form.email.value)){
        e.preventDefault();
        // messErreurMail.innerHTML='Email invalide !'
        // alert("Format Email invalide !")
    }
    if (! validTel.test(form.tel.value)){
        e.preventDefault();
        // messErreurTel.innerHTML='Format téléphone invalide !'
        // alert("Format Email invalide !")
    }

    form.classList.add("was-validated");

};

//********* PAGE commande ***********//

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

// const myModal = document.querySelector('#Modal')
// const myInput = document.getElementById('myInput')

// let forms = document.forms;
// for (var i = 0; i < forms.length; i++) {
//   let form = forms[i];
//   if (form.method === 'post' || form.method === 'POST') {
//     myModal.addEventListener('shown.bs.modal', () => {
//         myInput.focus()
//     })
//       }
// };

//il faut faire en sorte que l'event se declanche au click button et pas sur le onclick de la zone "votre message"