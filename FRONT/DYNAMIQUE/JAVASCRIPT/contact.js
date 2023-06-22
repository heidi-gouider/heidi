
/******** VALIDATION ENVOIE FORMULAIRE DE CONTACT ***********/

//  variables //
let form = document.querySelector("#contact");
    // let testPrenom = identityRegExp.test(form.prenom);

let prenomRegExp = new RegExp (
    "^[a-zA-Z-]$"
    // {2,10}
    );
let nomRegExp = new RegExp (
    "^[a-zA-Z-]$"
    // {2,10}
    );

//  évennements //
    // form.addEventListener("submit", function (event) {
form.valider.addEventListener("click", function (event) {
// document.forms["contact"].addEventListener("submit", function (event) {
    event.preventDefault();
  
    


        // if ((form.prenom.validity.valueMissing) || (form.prenom!=identityRegExp)) {
        if (form.prenom.validity.valueMissing) {
            // e.preventDefault();
            form.prenom.style.border = " 1px solid red";
            prenomMiss.textContent = "Ce champ est obligatoire";
        }
        else if (form.prenom!==prenomRegExp) {
            form.prenom.style.border = " 1px solid red";
            prenomMiss.textContent = "erreur de saisie";
        };

        if (form.nom.validity.valueMissing) {
            // e.preventDefault();
            form.nom.style.border = " 1px solid red";
            nomMiss.textContent = "Ce champ est obligatoire";
        }
        else if (form.nom!==nomRegExp) {
            form.nom.style.border = " 1px solid red";
            nomMiss.textContent = "erreur de saisie";
        };

        if ((!form.feminin.checked ) && (!form.masculin.checked )) {
            // e.preventDefault();
            // form.feminin.style.border, form.masculin.style.border = " 1px solid red";
            sexeMiss.textContent = "Ce champ est obligatoire";
        };

        if (form.naissance.validity.valueMissing) {
            // e.preventDefault();
            form.naissance.style.border = " 1px solid red";
            naissanceMiss.textContent = "Ce champ est obligatoire";
        };

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
    });
