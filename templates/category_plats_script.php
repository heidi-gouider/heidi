<?php
//je démare la session
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Nos Plats";
include('../partials/header.php');
//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');

// if (isset($_GET["added"]) && $_GET["added"] === "true") {
// echo "Les données ajoutées devraient être affichées ici.";
// }
if (isset($_GET['id'])) {
    $id_categorie = $_GET['id'];
// $requete = $db->prepare("SELECT * FROM plat WHERE id_categorie = ?");
// $requete = $db->prepare("select plat.*,categorie.libelle AS nom_categorie FROM plat INNER JOIN categorie ON plat.id_categorie = categorie.id WHERE id_categorie=?");
$requete = $db->prepare("SELECT plat.*, categorie.libelle AS nom_categorie FROM plat INNER JOIN categorie ON plat.id_categorie = categorie.id WHERE plat.id_categorie = ?");
    
// récupération les données
$requete->execute([$id_categorie]);
// $requete->execute(array($_GET["id_categorie"]));

$plats = $requete->fetchAll(PDO::FETCH_OBJ);

// $nom_categorie = !empty($plats) ? $plats[0]->nom_categorie : '';
$nom_categorie = $plats[0]->nom_categorie;

//Cette ligne ferme le curseur de la requête. Cela libère les ressources associées à la requête et permet de faire d'autres requêtes avec la même connexion PDO.
$requete->closeCursor();

$count = 0;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
<div class="contenu">
<h1 class="row col-12 fst-italic">Nos <?= $nom_categorie?></h1>

<!-- <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a> -->

    <!-- <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a> -->
    <main class="container">
        <div class="row">
            <?php
            foreach ($plats as $plat) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="/public/IMG/food/<?= $plat->image ?>" alt="<?= $plat->libelle?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $plat->libelle ?></h5>
                            <p class="card-text"> <?= $plat->description ?></p>
                            <p class="content bg-body"><?= $plat->prix ?></p>
                        </div>
                        <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal" data-bs-target="#modal">Ajouter au panier
                            <i class="bi bi-basket"></i>
                        </button>

                    </div>
                </div>
            <?php
                $count++; // Incrémentez le compteur
                // Si vous avez affiché 2 disques, fermez la rangée actuelle et commencez une nouvelle rangée
                if ($count % 2 == 0) {
                    echo '</div><div class="row">';
                }
            endforeach;
        }
        ?>
            
        </div>
    </main>
        
    <?php
include('../partials/footer.php');
?>

  <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>
