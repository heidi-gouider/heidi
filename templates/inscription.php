<?php

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Inscription";

//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');
//objet Dao et requete
require_once('Dao.php');

// Je crée une instance de DAO en passant la connexion PDO
$dao = new Dao($db);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>


    <h1>Formulaire d'inscription </h1>

    <div class="container mx-auto" id="formulaire">
        <!-- <form action="<?php //echo $_SERVER["PHP_SELF"]; 
                            ?>" method="post" onsubmit="return valider(event)" id="valid"  novalidate> -->
        <form action="inscription_script.php" method="post" id="valid" novalidate>
            <!-- onsubmit="return valider(event)"  -->

            <!-- class="validation row col-8 m-5 " -->
            <div class="col-md-6 mb-4">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="prenomHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6 mb-4">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-md-6 mb-4">
                <label for="password" class="form-label">Confirmer votre mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">M'inscrire</button>
        </form>
    </div>
    <h3 class="text-center custom-title">CONNEXION</h3>

    <div class="container mx-auto" id="formulaire">
        <!-- <form action="<?php //echo $_SERVER["PHP_SELF"]; 
                            ?>" method="post" onsubmit="return valider(event)" id="valid"  novalidate> -->
        <form action="mon_compte_script.php" method="post" id="valid" novalidate>
            <!-- onsubmit="return valider(event)"  -->

            <!-- class="validation row col-8 m-5 " -->
            <div class="col-md-6 mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="col-md-6 mb-4">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
  </div> -->
            <button type="submit" class="btn btn-primary">Me connecter</button>
        </form>
    </div>


    <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>