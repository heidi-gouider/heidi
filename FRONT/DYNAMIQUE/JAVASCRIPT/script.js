//////// MENU MOBIL FIRST /////////



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


//////// CREATION DE CLASSES AU CLICK /////////

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


