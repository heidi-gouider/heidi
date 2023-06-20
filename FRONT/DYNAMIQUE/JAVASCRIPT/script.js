//////////// VARIABLES //////////


// menu responsive //
let body = document.querySelector("body");
let icone = document.querySelector(".icone");

// section recherche //
let section = document.querySelector("section");
let video = document.querySelector("video");

// footer //
let network = document.querySelector(".network");
let footer = document.querySelector("footer");

// menu langue //

//////// LES CLASSES /////////

// menu responsive //
icone.addEventListener("click", function () {
    body.classList.toggle("actif");
});

// évennement change au click/////

// section.img.addEventListener("click", function () {
//     section.classList.toggle("actif");
// });

network.addEventListener("click", function () {
    footer.classList.toggle("actif");
});


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

