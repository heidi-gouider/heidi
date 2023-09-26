<?php
//je démare la session php = "identifiant donné au navigateur pour l'identifie du coté serveur et rendre sur chaque page les diff variables stocké"
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Catégories";
include('../partials/header.php');
//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');

// if (isset($_GET["added"]) && $_GET["added"] === "true") {
// echo "Les données ajoutées devraient être affichées ici.";
// }


// $requete = $db->query("SELECT categorie.*, COUNT (plat.id) FROM categorie INNER JOIN plat ON categorie.id = plat.id 
//     GROUP BY categorie.id HAVING COUNT(plat.id)= plat.active");
// $requete = $db->query("SELECT categorie.*, COUNT (plat.active) FROM categorie INNER JOIN plat ON categorie.id = plat.id_categorie
//     GROUP BY categorie.id HAVING COUNT(plat.active)= yes");

$requete = $db->query("SELECT categorie.*FROM categorie ");
// Requête pour récupérer les catégories avec le nombre de plats actifs
$requete = $db->query("SELECT categorie.*, 
                            (SELECT COUNT(*) 
                             FROM plat 
                             WHERE plat.id_categorie = categorie.id AND plat.active = 'yes') AS count_active 
                        FROM categorie");

// récupération les données
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);

//Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
$requete->closeCursor();

//requete pour afficher le nombre de plats actifs par catégorie
// $requete = $db->prepare("SELECT id_categorie, COUNT(*) AS count_active FROM plat WHERE active = 'yes' GROUP BY id_categorie HAVING count_active > 0;");
// $requete->execute();

// Récupérez les résultats sous forme de tableau associatif
// $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

// Fermez le curseur de la requête
// $requete->closeCursor();

$count_active = 0;
$count = 0;
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

        <main class="container">
            <div class="row">
                <?php
                foreach ($tableau as $categorie) : ?>
                    <div class="col-md-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="/public/IMG/category/<?= $categorie->image ?>" alt="<?= $categorie->libelle ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $categorie->libelle ?></h5>
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
                                <p class="card-text">Nombre de plats actifs : <?= $categorie->count_active ?></p>
                                <div class="card-body">
                                    <a href="category_plats_script.php?id=<?= $categorie->id ?>" class="btn btn-primary">plats</a>
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
        <!-- </div> -->
        <?php
        include('../partials/footer.php');
        ?>

        <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>