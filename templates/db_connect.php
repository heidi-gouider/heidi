<?php

//le bloc try-catch permet de gérer les erreurs
// je definie les constantes pour ma connexion à la base de donnée
$servername = "localhost";
$dbname = "the_district_creation";
$username = "heidi";
$password = "ra#tro"; // serait il préférable de cacher le mot de passe ici ?
try {
    // Établir une connexion à la base de données MySQL en utilisant une instance d'une classe PDO
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // Configurer le mode de gestion des erreurs de PDO pour générer des exceptions en cas d'erreurs
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // la ligne ci-dessus permet d'indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré.
    //Très pratique en mode développement, mais déconseillé en mode production.

    //pour enregistrer les données en utf8 et s'assurer de la prise des accents et autres caratères ...
    //$db->exec("SET NAMES UTF8");

} catch (Exception $e) {
    // En cas d'erreur, afficher un message d'erreur et le numéro d'erreur, puis arrêter le script
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
}

