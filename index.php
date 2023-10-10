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
$plats = $dao->getallPlats();

$count = 0;

//essaie barre de recherche avec js//
// $q = $_GET["q"];
// $suggestions = [];

// if (!empty($q)) {
//     $q = "%" . $q . "%";
//     $query = "SELECT id, libelle FROM plats WHERE libelle LIKE :q";

//     $stmt = $pdo->prepare($query);
//     $stmt->bindParam(":q", $q, PDO::PARAM_STR);
//     $stmt->execute();
    
//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $suggestions[] = $row;
//     }
// }

// Renvoyer les suggestions au format JSON
// header("Content-Type: application/json");
// echo json_encode($suggestions);
?>

<div class="row video-container">
    <div class="fst-italic" id="titre-accueil">
        <h1>The District</h1>
    </div>
    <!-- barre de recherche -->
    <!-- <form class="search-form d-flex justify-content-center" id="search-bar">

        <input type="text" id="search-input" placeholder="Rechercher...">
        <button class="btn text-light bg-dark" type="submit"><i class="bi bi-search"></i></button>

        <label for="Plats" class="form-label"><button class="btn text-light bg-dark" type="submit"><i class="bi bi-search"></i></button></label>

        <select id="plats-dropdown" name="id" class="form-select" style="display: none;"> -->
            <?php
            // Parcourez le tableau des plats pour générer les options

            // foreach ($plats as $plat) {
            //     echo '<option value="' . $plat->id . '">' . $plat->libelle . '</option>';
            // }
            // "endforeach";
            ?>
        </select>
    
    </form>

    <form class="search-form d-flex justify-content-center" id="search-bar">
    <input type="text" id="search-input" placeholder="Rechercher...">
    <button class="btn text-light bg-dark" type="submit"><i class="bi bi-search"></i></button>
    <!-- <div id="suggestions"></div> -->
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
                <div class="card" id="images" style="width: 18rem;">
                    <img src="../public/IMG/category/<?= $categorie->image ?>" alt="<?= $categorie->nom_categorie ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $categorie->nom_categorie ?></h5>
                        <?php
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


<?php
include('partials/footer.php');
?>


<script type="module" src="dist/assets/index.js"></script>

</body>

</html>