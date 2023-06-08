//////////// VARIABLES //////////

// menu responsive //
let body = document.querySelector("body");
let icone = document.querySelector(".icone");


//////// CREATION DE CLASSES AU CLICK /////////

// menu responsive //
icone.addEventListener("click", function () {
    body.classList.toggle("actif");
});
