<?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// je démare la session
session_start();

$title = "panier";
//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');
//objet Dao et requete
require_once('Dao.php');

// $_SESSION["commande"] = "commande";

// Je crée une instance de DAO en passant la connexion PDO
$dao = new Dao($db);
// J'utilise la fonction getPlatsByCategorie
// $plats = $dao->getPlats();
// $nom_categorie = !empty($plats) ? $plats[0]->nom_categorie : '';
// $libelle = !empty($plats) ? $plats[0]->libelle : '';
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <!-- affichage d'une popup si commande récupérer dans la bdd -->
    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<pre>';
        echo 'alert("' . $_SESSION['error_message'] . '");'; // Affichez un message d'alerte
        echo '</pre>';

        // Vérifiez si la variable de session success_message est définie
    } elseif (isset($_SESSION['success_message'])) {
        echo '<script>';
        echo 'alert("' . $_SESSION['success_message'] . '");'; // Affichez un message d'alerte
        echo '</script>';

        // Supprimez la variable de session après l'affichage de la pop-up
        unset($_SESSION['success_message']);
    }

    ?>
    <!-- PENSER A AJOUTER UNE CONNEXION... -->
    <div class="contenu">
        <h1 class="fst-italic">Ma commande</h1>
        <div class="text-center mt-4">
            <!-- <a href=" <?php //header("Location: " . $_SERVER['HTTP_REFERER']); 
                            ?>"> continuer mes achats </a> -->
            <a href="category.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Continuer mes achats</a>
        </div>

        <!-- Pour désactiver les info-bulles ajouter l'attribut novalidate à la class du form -->

        <!-- /// LES PLATS COMMANDÉS EN SCROLL HIDDEN/// -->
        <!-- récupération des plats enregistrer dans la modal d'ajout de plat -->
        <div class="container overflow-y-auto" style="height: 50vh;cursor: pointer;">
            <?php
            // Vérifier si le panier existe dans la session
            if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                // Afficher les éléments du panier
                foreach ($_SESSION['panier'] as $id_plat => $quantite) {
                    // Récupérez les informations du plat à partir de la base de données en utilisant $platId
                    $plat = $dao->getPlatById($id_plat);
                    $prix = $plat->prix;
                    $total = $prix * $quantite;
                    // Vérifiez si le plat existe (il peut avoir été supprimé de la base de données)
                    if ($plat) {    ?>
                        <!-- j'affiche les plats du panier -->
                        <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                            <div class="row  m-3 justify-content-around">
                                <div class="card p-3 w-50 h-50 flex-row justify-content-between">
                                    <img src="/public/IMG/food/<?= $plat->image ?>" alt="<?= $plat->libelle ?>">
                                    <div class="col-7">
                                        <div class="card-title row justify-content-around">
                                            <h5 class="col-6"><?= $plat->libelle ?></h5>
                                            <i class="bi bi-basket col-1"></i>
                                        </div>
                                        <div class="card-body row justify-content-around">
                                            <div>
                                                <span class="col-4">quantité</span>
                                                <span class="content col-2 border"><?= $quantite ?></span>
                                            </div>
                                            <div>
                                                <span class="col-4">Total</span>
                                                <span class="content col-2 border"><?= $total ?></span>
                                                <!-- <p class="content bg-body"><?= $total ?></p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
            <?php
                    }
                }
            } else {
                // Le panier est vide
                // J'affiche un message
                if (isset($_SESSION['panier_vide_message'])) {
                    $message = $_SESSION['panier_vide_message'];
                    echo '<pre>';
                    echo 'alert("' . $_SESSION['panier_vide_message'] . '");';
                    echo '</pre>';
                    // echo "Votre panier est vide.";
                    exit();
                }
            }
            ?>
        </div>
    </div>
    <script type="module" src="../dist/assets/index.js"></script>
</body>

</html>