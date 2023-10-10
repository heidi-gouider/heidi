<?php
//je démare la session php = "identifiant donné au navigateur pour l'identifie du coté serveur et rendre sur chaque page les diff variables stocké"
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Catégories";
include('../partials/header.php');
include('modalAuth.php');
//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');
//objet Dao et requete
require_once('Dao.php');

// Je crée une instance de DAO en passant la connexion PDO
$dao = new Dao($db);


// J'utilise la fonction getCategoriesWithActivePlatsCount
$tableau = $dao->getCategoriesWithActivePlatsCount();

$count_active = 0;
$count = 0;
//Je récupere le plat ajouté pour le passer dans l'url pour rendre le boutton de validation de la commande actif ou non
// $plat_added = isset($_GET['plat-added']) ? $_GET['plat-added'] : false;
// Validation et désinfection de la variable $plat_added provenant de l'URL
$plat_added = isset($_GET['plat-added']) ? filter_var($_GET['plat-added'], FILTER_VALIDATE_BOOLEAN) : false;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- <title>Categories</title> -->
</head>

<body>
    <!-- <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a> -->
    <div class="contenu">
        <h1 class="fst-italic">Notre carte</h1>
        <!-- <div class="container d-flex justify-content-center" id="section"> -->
        <!--bouton pour ouvrir le modalAuth-->
        <?php
        if ($plat_added) {
            // Affichez le bouton pour ouvrir la modalAuth seulement si des plats sont enregistrer
            // echo '<button id="openModalButton" class="btn btn-primary mt-5 position-fixed mx-auto" data-bs-toggle="modal" data-bs-target="#modalAuth">Valider ma commande</button>';
        ?>
            <div class="col-md-6 offset-md-3 text-center" style="margin-left: 10vh">
                <button id="openModalButton" class="btn btn-primary mt-5 position-fixed mx-auto" data-bs-toggle="modal" data-bs-target="#modalAuth">Valider ma commande</button>
            </div>
        <?php
        }
        ?>

        <main class="container">
            <div class="row">
                <?php
                foreach ($tableau as $categorie) : ?>
                    <div class="col-md-6 mb-4 mt-4">
                        <div class="card" style="width: 18rem; background: rgba(255, 255, 255, 0.8);">

                            <a href="category_plats.php?id=<?= $categorie->id ?>">
                                <img class="card-img-top mx-auto" src="/public/IMG/category/<?= $categorie->image ?>" alt="<?= $categorie->libelle ?>">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?= $categorie->libelle ?></h5>
                                <?php
                                // $count_active = 0;
                                // Trouvez le nombre de plats actifs pour cette catégorie
                                // foreach ($resultat as $resultat) {
                                //     if ($resultat['id_categorie'] == $categorie->id) {
                                //         $count_active = $resultat['count_active'];
                                //         break;
                                //     }
                                // }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                    $count++; // Incrémentez le compteur
                    // Si vous avez affiché 2 disques, fermez la rangée actuelle et commencez une nouvelle rangée
                    if ($count % 2 == 0) {
                        echo '</div><div class="row">';
                    }

                endforeach; ?>
            </div>
        </main>
    </div>
    <?php
    include('../partials/footer.php');
    ?>

    <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>