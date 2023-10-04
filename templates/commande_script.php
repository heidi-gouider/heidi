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

    //inclusion de la classe  Dao et création de l'object
    require_once('Dao.php');
    // $dao = new Dao($db);

    /*j'initialise une session*/
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        //je récupère les données saisies
        $nom = $_POST["nom_client"];
        $email = $_POST["email_client"];
        $tel = $_POST["tel_client"];
        $adresse = $_POST["adresse_client"];

        //je récupère les informations liées auxplats enregistré
        $platId = $_POST['id_plat'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];
        $total = $quantite * $prix;

        // $panier = $_SESSION['panier'];
        // $time = time();
        // $format = "Y-m-d H-i-s";
        // $date = date($format, $time);
        //Je nettoie les données entrées par l'utilisateur, je supprime toutes les balises html
        // $nom = strip_tags($nom);
        // $adresse = strip_tags($adresse);
        // if (!empty($_POST)) {

        //vérifier si les champs sont bien rempli
        if (
            isset($nom, $email, $tel, $adresse)
            && !empty($nom) && !empty($email) && !empty($tel) && !empty($adresse)
        ) {

            // Je vérifie que le format email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Je stocke le message d'erreur dans une variable de session
                $_SESSION['error_message'] = "Le format de l'email est incorrect";

                // Je redirige vers le formulaire de commande
                header("Location: commande_form.php");
                exit();
            }

            // récupération des plats enregistrés
            // Je vérif si le panier existe déjà dans la session
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];

                // if (isset($_POST['id_plat']) && isset($_POST['quantite'])) {
                //     $platId = $_POST['id_plat'];
                //     $quantite = $_POST['quantite'];
                // }
            }
            // J'ajoute la quantité au panier
            if (isset($_SESSION['panier'][$platId])) {
                $_SESSION['panier'][$platId] += $quantite;
            } else {
                $_SESSION['panier'][$platId] = $quantite;
            }

            // Redirestion vers la page précédente après avoir ajouté un plat au panier avec succès
            // header("Location: " . $_SERVER['HTTP_REFERER']);
            // exit();
            // } else {
            // Si le panier n'existe pas dans la session, créez-le
            // $_SESSION['panier'] = [];
            // $_SESSION['panier'][$platId] = $quantite;
            // Je stocke le message d'erreur dans une variable de session
            // $_SESSION['panier_vide_message'] = "Votre panier est vide";

            // Gérer les erreurs si des données sont manquantes
            // echo 'Erreur : Données manquantes.';
            // header("Location: " . $_SERVER['HTTP_REFERER']);
            // exit();
            // }


            // je stocke les informations de l'utilisateur dans la session
            $_SESSION["panier"] = "true";
            $_SESSION["commande"] = [
                "id" => $id["id"],
                "id_plat" => $id_plat["id_plat"],
                "nom_client" => $nom["nom_client"],
                "email_client" => $email["email_client"],
                "tel_client" => $tel["tel_client"],
                "adresse_client" => $adresse["adresse_client"],
            ];
            // $_SESSION["commande"] = [
            //     "id_plat" => $platId,
            //     "nom_client" => $nom,
            //     "email_client" => $email,
            //     "tel_client" => $tel,
            //     "adresse_client" => $adresse,
            //     "total" => $total,
            // ];

            // J'insère les données de commande dans la base de données
            $stm = $dao->insertDataCommande($id_plat, $quantite, $total, $nom_client, $telephone_client, $email_client, $adresse_client);

            if ($stm) {
                // affichage d'une popup dans la page commande_form
                $_SESSION['success_message'] = "L'insertion des données a réussi.";
                unset($_SESSION["commande"]);
                if (ini_get("session.use_cookies")) {
                    setcookie(session_name(), '', time() - 42000);
                }

                session_destroy();
                //je redirige vers une autre page 
                header("Location:accueil.php");
                exit();
            } else {
                // Formulaire incomplet
                $_SESSION['error_message'] = "erreur de saisie !";
                header("Location: commande_form.php");
                exit();
            }
        } else {
            // Formulaire incomplet
            $_SESSION['error_message'] = "Formulaire incomplet !";
            header("Location: commande_form.php");
            exit();
        }
    }
    // Envoi de l'e-mail de confirmation
    // $to = $emailClient;
    // $subject = 'Confirmation de commande';
    // $message = 'Merci pour votre commande. Voici les détails de votre commande :' . "\r\n";
    // Ajoutez les détails de la commande ici (articles, quantités, etc.)
    // ...

    // En-têtes de l'e-mail
    // $headers = 'From: votre@email.com' . "\r\n" .
    //     'Reply-To: votre@email.com' . "\r\n" .
    //     'X-Mailer: PHP/' . phpversion();

    // Envoi de l'e-mail
    // mail($to, $subject, $message, $headers);

    // Redirigez l'utilisateur vers une page de confirmation
    // header('Location: confirmation.php');
    // exit();


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