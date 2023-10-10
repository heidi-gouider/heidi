<?php
//je démare la session
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Plats";
include('../partials/header.php');
include('modalAuth.php');
//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');
require_once('Dao.php');

//création de l'instance
$Dao = new Dao($db);
// if (isset($_GET["added"]) && $_GET["added"] === "true") {
// echo "Les données ajoutées devraient être affichées ici.";
// }
// $requete = $db->query("SELECT categorie.*, COUNT (plat.id) FROM categorie INNER JOIN plat ON categorie.id = plat.id 
//     GROUP BY categorie.id HAVING COUNT(plat.id)= plat.active");
// $requete = $db->query("SELECT categorie.*, COUNT (plat.active) FROM categorie INNER JOIN plat ON categorie.id = plat.id_categorie
//     GROUP BY categorie.id HAVING COUNT(plat.active)= yes");

// Je crée une instance de DAO en passant la connexion PDO
$dao = new Dao($db);

// J'utilise la fonction getPlatsByCategorie

$requete = $db->query("SELECT plat.*FROM plat");

// récupération les données
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);

//Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
$requete->closeCursor();

// $libelle = !empty($plats) ? $plats[0]->libelle : '';

$count = 0;
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
        <h1 class="fst-italic">Nos plats</h1>
        <div class="col-md-6 offset-md-3 text-center" style="margin-left: 10vh">
            <button id="openModalButton" class="btn btn-primary mt-5 position-fixed mx-auto" data-bs-toggle="modal" data-bs-target="#modalAuth">Valider ma commande</button>
        </div>
        <!-- <div class="container d-flex justify-content-center" id="section"> -->
        <main class="container" id="cards">
            <!-- <div class="row">  -->
            <!-- <div class="container m-5 pt-3" id="cards"> -->
            <div class="row  m-3 justify-content-around">

                <?php
                foreach ($tableau as $plat) : ?>
                    <div class="col-md-6 mb-4 mt-4">
                        <div class="card" style="width: 25rem;">
                            <img src="/public/IMG/food/<?= $plat->image ?>" alt="<?= $plat->libelle ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $plat->libelle ?></h5>
                                <p class="card-text"> <?= $plat->description ?></p>
                                <p class="content bg-body"><?= $plat->prix ?></p>
                                <!-- <div class="card-body">
                                <a href="plats_script.php?id=<?= $plat->id ?>" class="btn btn-primary">plats</a>
                            </div> -->
                                <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal" data-bs-target="#modal">Ajouter au panier
                                    <i class="bi bi-basket"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /// LA MODAL D'AJOUT AU PANIER/// -->
                    <div class="modal fade" id="modal<?= $plat->id ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title rounded p-3">Ma commande</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-secondary" aria-describedby="quantité">
                                    <form action="ajout_au_panier.php" method="post" id="valid" novalidate>
                                        <div class="dropdown">
                                            <label for="quantité" class="lead text-white">Combien de <?= $plat->libelle ?> désirez-vous</label>
                                            <input type="number" id="quantité" name="quantite" value="1" min="1" max="10">
                                            <input type="hidden" name="id_plat" value="<?= $plat->id ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
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