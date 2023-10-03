<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>enregistrement modal commande</title>
</head>

<body>
    <?php
    //j'ajoute un code de débogage pour afficher les erreurs à l'écran.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //connexion à la base de donnée
    require_once('db_connect.php');

    //objet Dao et requete
    require_once('Dao.php');

    ////LA SESSION DÉMARRE QUAND ON VEUT STOCKÉ DES INFORMATIONS ICI APRÈS IDENTIFICATION DE L'UTILISATEUR
    /*j'initialise une session*/
    session_start();


        //vérifier si les champs sont bien rempli
        // if (
        //     isset($nom, $email, $tel, $adresse)
        //     && !empty($nom) && !empty($email) && !empty($tel) && !empty($adresse)
        // ) {
        if (!empty($_POST)) {
            //Je nettoie les données entrées par l'utilisateur, je supprime toutes les balises html
            // $nom = strip_tags($nom);
            // $adresse = strip_tags($adresse);
            //je récupère les données saisies
            $nom = $_POST["nom_client"];
            $email = $_POST["email_client"];
            $tel = $_POST["tel_client"];
            $adresse = $_POST["adresse_client"];

            // Je vérifie que le format email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Je stocke le message d'erreur dans une variable de session
                $_SESSION['error_message'] = "Le format de l'email est incorrect";

                // Je redirige vers le formulaire de commande
                header("Location: commande_form.php");
                exit();
            }
               // je stocke les informations de l'utilisateur dans la session

               $_SESSION["panier"] = "true";
               $_SESSION["commande"] = [
                   "id" => $commande["id"],
                   "id_plat" => $commande["id_plat"],
                   "nom_client" => $commande["nom_client"],
                   "email_client" => $commande["email_client"],
                   "tel_client" => $commande["tel_client"],
                   "tel_client" => $commande["tel_client"],
   
               ];
            // Je crée une instance de DAO en passant la connexion PDO
            $dao = new Dao($db);

            //!!!!!!!!!!ATTENTION À RECUPERER LES INFOS CLIENT ET LES INFOS PLATS COMMANDÉS!!!!!!!!!!!

            $requete = $dao->insertDataCommande($id_plat, $quantite, $total, $nom_client, $telephone_client, $email_client, $adresse_client);

            if ($requete) {
                // affichage d'une popup dans la page commande_form
                $_SESSION['success_message'] = "L'insertion des données a réussi.";
                //je redirige vers une autre page 
                header("Location:accueil.php");
                exit();
            } else {
                // Formulaire incomplet
                $_SESSION['error_message'] = "Mot de passe incorrect !";
                header("Location: commande_form.php");
                exit();
            }
        }
    
    // Avec ces modifications, le code devrait fonctionner correctement et gérer les erreurs de manière appropriée. N'oubliez pas de vous assurer que la structure de la base de données correspond à ce que vous attendez, notamment en ce qui concerne les noms de colonnes et les mots de passe hachés.
    // si les données fournies ne sont pas correctes, je détruit les variables de session
    // unset($_SESSION["email"]);
    // session_destroy();

    // unset($_SESSION["email"]);
    // unset($_SESSION["password"]);
    // Mot de passe incorrect
    //     unset($_SESSION["email"]);
    //     session_destroy();
    //     $_SESSION['error_message'] = 'Mot de passe incorrect !';
    //     header("Location: login_form.php");
    //     exit();
    // }
    // Si les cookies de session sont utilisés, les invalider
    // if (ini_get("session.use_cookies")) {
    //     setcookie(session_name(), '', time() - 42000);
    // }
    //je détruit la session
    // session_destroy();

    // Je défini un message d'erreur dans une variable de session
    // $_SESSION['error_message'] = 'Données incorrectes !';

    // Je redirige vers le formulaire de connexion
    // header("Location: login_form.php");
    // exit();
    // echo "Données incorrectes !";

    ///la suppression de la session se fera soir avec le bouton déconnexion soit quand le user quitera le site
    // Si les cookies de session sont utilisés, les invalider
    // if (ini_get("session.use_cookies")) {
    //     setcookie(session_name(), '', time() - 42000);
    //     $_SESSION['error_message'] = "Mot de passe incorrect";
    //     header("Location: login_form.php");
    //     exit();
    // }

    // } else {
    //     die("formulaire imcomplet!");
    // header("Location: login_form.php");
    // exit();

    // }

    ?>
</body>

</html>