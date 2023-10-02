<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "data panier";
require_once('db_connect.php');
// objet Dao et requete
require_once('Dao.php');

session_start();

if (isset($_POST['platId']) && isset($_POST['quantite'])) {
    $platId = $_POST['platId'];
    $quantite = $_POST['quantite'];

    // Je vérif si le panier existe déjà dans la session
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // J'ajoute la quantité au panier
    if (isset($_SESSION['panier'][$platId])) {
        $_SESSION['panier'][$platId] += $quantite;
    } else {
        $_SESSION['panier'][$platId] = $quantite;
    }

    // Redirestion vers la page précédente après avoir ajouté un plat au panier avec succès
    // header('Location: category_script.php');
header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    // Gérer les erreurs si des données sont manquantes
    echo 'Erreur : Données manquantes.';
    exit();
}
?>
