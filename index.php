<?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Accueil";
include('./partials/header.php');
//inclusion de la page de connexion à la base de donnée
require_once('./templates/db_connect.php');
//objet Dao et requete
require_once('./templates/Dao.php');

    // Je crée une instance de DAO en passant la connexion PDO
    $dao = new Dao($db);


    // J'utilise la fonction getCategoriesWithActivePlatsCount
    $tableau = $dao->getTopSellingPlatsByCategorie();

    $count = 0;

?>

<div class="row video-container">
    <div class="fst-italic" id="titre-accueil">
        <h1>The District</h1>
    </div>

    <form class="search-form d-flex justify-content-center" id="search-bar">
        <input type="text" placeholder="Rechercher...">
        <button class="btn text-light bg-dark" type="submit"><i class="bi bi-search"></i></button>
    </form>
    <video controls="controls" class="" loop="loop" autoplay="autoplay" muted>
        <!-- <video controls="controls" class="controls video-fluid" loop="loop" autoplay="autoplay" muted> -->
        <source src="public/VIDEO/video2.mp4">
    </video>
</div>

<main class="container mt-4">
            <div class="row">
                <?php
                foreach ($tableau as $categorie) : ?>
                    <div class="col-md-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="../public/IMG/category/<?= $categorie->image ?>" alt="<?= $categorie->nom_categorie ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $categorie->nom_categorie ?></h5>
                                <?php
                                ?>
                                <!-- <div class="card-body">
                                    <a href="category_plats_script.php?id=<?= $categorie->id ?>" class="btn btn-primary">plats</a>
                                </div> -->
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

<!-- <div class="container d-grid mt-lg-4" id="images">
    <div class="row gap-5 justify-content-sm-center m-3">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/asian_food_cat.jpg" alt="asian food">
        <img class="col-6 col-md-4 col-lg-3  p-2 img-thumbnail" src="public/IMG/category/burger_cat.jpg" alt="burger">
        <img class="col-6 col-md-4 col-lg-3  p-2 img-thumbnail" src="public/IMG/category/salade_cat.jpg" alt="salad">
    </div>
    <div class="row gap-5 justify-content-sm-center d-md-flex m-3">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/pasta_cat.jpg" alt="pates">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/sandwich_cat.jpg" alt="sandwich">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/veggie_cat.jpg" alt="végé">
    </div>
</div> -->

<?php
include('partials/footer.php');
?>


<script type="module" src="dist/assets/index.js"></script>

</body>

</html>