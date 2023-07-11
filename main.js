import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-icons/font/bootstrap-icons.css';
// import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.js';
import { Carousel } from 'bootstrap';

import './style.css';

//////////// VARIABLES //////////


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

//////// EVENNEMENT /////////


// pour la vidéo, voir l'évennement pause dans la doc
// vidéo cursor pointer
// click pour mettre en pause
// click pour refaire jouer la boucle

//////// MODAL COMMANDE PAGE PLATS /////////

// const myModal = document.getElementById('myModal')
// const myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', () => {
//     myInput.focus()
// })

//********  CAROUSEL ***********//

//  1- Le carousel doit afficher 3img actives
//  2- lors du slide, la 1ere img fait place à une 4eme qui prend la 3eme position
//  3- l'img active centrale aura un effet zoom

// pour ne pas attendre que les feuilles de style etle reste soi chargé
// window.addEventListener('DOMContentLoaded', () => {


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
