
/******** VALIDATION FORMULAIRE DE CONTACT ***********/

//  variables je récupère mon formulaire //
let form = document.querySelector(".validation");
// let testPrenom = identityRegExp.test(form.prenom);

// let nomRegExp = new RegExp(
//     "^[a-zA-Z-]$"
// {2,10}
// );

//  évennement / fonction / classe //
form.addEventListener("submit", valider);

function valider(e) {
    if (form.checkValidity() == false) {
        e.preventDefault();
    }
    form.classList.add("was-validated");
}
// form.valider.addEventListener("submit", function (event) {
//     event.preventDefault();


//     if (form.nom.validity.valueMissing) {
//         form.nom.style.border = " 1px solid red";
//         nomMiss.textContent = "Ce champ est obligatoire";
//     }
//     else if (form.nom !== nomRegExp) {
//         form.nom.style.border = " 1px solid red";
//         nomMiss.textContent = "erreur de saisie";
//     };


//     if (form.tel.validity.valueMissing) {
//         form.naissance.style.border = " 1px solid red";
//         naissanceMiss.textContent = "Ce champ est obligatoire";
//     };

    // let cpRegExp = new RegExp(
    //     "^[0-9]{5}$"
    // );

    //     if (form.cp.validity.valueMissing) {
    //         // e.preventDefault();
    //         form.naissance.style.border = " 1px solid red";
    //         naissanceMiss.textContent = "Ce champ est obligatoire";
    //     }
    //     else if (form.cp!=cpRegExp) {
    //         form.cp.style.border = " 1px solid red";
    //         cpMiss.textContent = "erreur de saisie";
    //     };
// });
