<?php
//je démare la session
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Plats";
include('../partials/header.php');
//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');
require_once('Dao.php');

//création de l'instance
// $Dao = new Dao($db);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <title>Plats</title> -->
</head>

<body>
    <!-- <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a> -->
    <div class="contenu">
        <h1 class="fst-italic">Mon Compte</h1>
    </div>

    <?php
    echo "Formulaire de connexion";
    echo "<br/><br/>";

    // echo "Development Server (http://localhost:8000) started";
    // echo "<br/><br/>";


    // Configuration de l'attribut SameSite pour les cookies de session
    // session_set_cookie_params([
    // Ou 'Lax' ou 'Strict' selon vos besoins
    // 'samesite' => 'None', 
    // Utilisez 'secure' uniquement si vous utilisez HTTPS
    //   'secure' => true,     
    //   'httponly' => true,
    // ]);

    // Active l'affichage des erreurs dans le navigateur
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //connexion à la base de donnée
    require_once('db_connect.php');

    //j'active la session
    session_start();

    ?>
    <div class="error-message">
        <?php
        // Vérifier s'il y a un message d'erreur
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
            // Effacer le message d'erreur
            unset($_SESSION['error_message']);
        }
        ?>

    </div>
    <div class="container mx-auto" id="formulaire">
        <!-- <form action="<?php //echo $_SERVER["PHP_SELF"]; 
                            ?>" method="post" onsubmit="return valider(event)" id="valid"  novalidate> -->
        <form action="login_script.php" method="post" id="valid" novalidate>
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
    <?php
    include('../partials/footer.php');
    ?>

    <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>