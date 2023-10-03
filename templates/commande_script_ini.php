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

    /*j'initialise une session*/
    session_start();

    //je récupère les données saisies
    $nom = $_POST["nom_client"];
    $email = $_POST["email_client"];
    $tel = $_POST["tel_client"];
    $adresse = $_POST["adresse_client"];

        //vérifier si les champs sont bien rempli
        // if (
        //     isset($nom, $email, $tel, $adresse)
        //     && !empty($nom) && !empty($email) && !empty($tel) && !empty($adresse)
        // ) {
        if (!empty($_POST)) {
            //Je nettoie les données entrées par l'utilisateur, je supprime toutes les balises html
            // $nom = strip_tags($nom);
            // $adresse = strip_tags($adresse);

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
                var_dump($requete);
                // affichage d'une popup dans la page commande_form
                // $_SESSION['success_message'] = "L'insertion des données a réussi.";
                //je redirige vers une autre page 
                // header("Location:accueil.php");
                // exit();
            } else {
                // Formulaire incomplet
                $_SESSION['error_message'] = "Mot de passe incorrect !";
                header("Location: commande_form.php");
                exit();
            }
        }
        ?>
        </body>
        
        </html>