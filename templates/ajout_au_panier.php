<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "data panier";
require_once('db_connect.php');
// objet Dao et requete
require_once('Dao.php');

// $dao = new Dao($db);

// $plat = $dao->getPlatById($id);

session_start();
    // récupération des plats enregistrés
    if (isset($_POST['id_plat']) && isset($_POST['quantite'])) {
        $id_plat = $_POST['id_plat'];
        $quantite = $_POST['quantite'];

           // Stocker la quantité dans une session PHP
    // $_SESSION["quantite_plat_$id_plat"] = $quantite;

        // Je vérif si le panier existe déjà dans la session
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        // J'ajoute la quantité au panier
        if (isset($_SESSION['panier'][$id_plat])) {
            $_SESSION['panier'][$id_plat] += $quantite;
        } else {
            $_SESSION['panier'][$id_plat] = $quantite;
        }

        // Redirestion vers la page précédente après avoir ajouté un plat au panier avec succès
        // header("Location: " . $_SERVER['HTTP_REFERER']);
        // header("Location: commande.php");
                header("Location: category.php");
        exit();
    } else {
        // Je stocke le message d'erreur dans une variable de session
        $_SESSION['panier_vide_message'] = "Votre panier est vide";

        // Gérer les erreurs si des données sont manquantes
        // echo 'Erreur : Données manquantes.';
        header("Location: " . $_SERVER['HTTP_REFERER']);
        // header("Location: commande.php");
        exit();
    }
