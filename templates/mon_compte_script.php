<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Moncompte script</title>
</head>

<body>
    <?php
    //j'ajoute un code de débogage pour afficher les erreurs à l'écran.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');
//objet Dao et requete
require_once('Dao.php');

// Je crée une instance de DAO en passant la connexion PDO
$dao = new Dao($db);

    ////LA SESSION DÉMARRE QUAND ON VEUT STOCKÉ DES INFORMATIONS ICI APRÈS IDENTIFICATION DE L'UTILISATEUR
    /*j'initialise une session*/
    // session_start();


    // je vérifie si le form a été soumis
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //vérifier si le form a été envoyé
    if (!empty($_POST)) {
        // var_dump($_POST);

        //vérifier si les champs sont bien rempli
        if (
            isset($_POST["email"], $_POST["password"])
            && !empty($_POST["email"]) && !empty($_POST["password"])
        ) {
            //je récupère les données saisies
            $email = $_POST["email"];
            $password = $_POST["password"];

            // Je vérifie que le format email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Je stocke le message d'erreur dans une variable de session
                $_SESSION['error_message'] = "Le format de l'email est incorrect";

                // Je redirige vers le formulaire de connexion
                header("Location: login_form.php");
                exit();
            }
            //connexion à la base de donnée
            require_once('db_connect.php');

            // Je prépare la requête pour récupérer l'utilisateur par l'email
            $sql = "SELECT * FROM user WHERE email = :email";
            $query = $db->prepare($sql);

            // liaison des valeurs
            $query->bindValue(':email', $email, PDO::PARAM_STR);

            // Exécution de la requête SQL
            $query->execute();
            // $id = $db->lastInsertId();
            // Récupération du résultat de la requête
            $user = $query->fetch();


            // Vérification si l'email existe dans la base de données
            if (!$user) {
                // die("Aucun utilisateur ");
                $_SESSION['error_message'] = "Aucun utilisateur trouvé";
                header("Location: login_form.php");
                exit();
            }
            //utilisateur reconnu par l'email
            // Je vérifie le password
            // Récupération du mot de passe haché de la base de données
            $password_hash = $user["mot_de_passe"];

            // Vérification si le mot de passe saisi correspond au mot de passe haché de la base de données
            if (password_verify($password, $password_hash)) {
                // die("Aucun utilisateur: erreur mot de passe ");
                // Mot de passe incorrect
            // }
            // Authentification réussie
            //connexion

            /*j'initialise une session*/
            session_start();

            // je stocke les informations de l'utilisateur dans la session

            $_SESSION["auth"] = "ok";
            $_SESSION["user"] = [
                "id" => $user["id"],
                "nom" => $user["nom"],
                "prenom" => $user["prenom"],
                "email" => $email,

            ];

            // $_SESSION["password"] = $password_hash;

            //je redirige vers une autre page 
            header("Location:connexion.php");
            exit();
                       // die("Aucun utilisateur: erreur mot de passe ");
        // Mot de passe incorrect

        } else {
            // Formulaire incomplet
            $_SESSION['error_message'] = "Mot de passe incorrect !";
            header("Location: login_form.php");
            exit();
        }
    } else {
        // Formulaire incomplet
        $_SESSION['error_message'] = "Formulaire incomplet";
        header("Location: login_form.php");
        exit();
    }
}

?>
    <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>