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
//objet Dao et requete
require_once('Dao.php');

if (isset($_GET['id'])) {
    $id_categorie = $_GET['id'];

    // Je crée une instance de DAO en passant la connexion PDO
    $dao = new Dao($db);

    // J'utilise la fonction getPlatsByCategorie
    $plats = $dao->getPlatsByCategorie($id_categorie);
    $nom_categorie = !empty($plats) ? $plats[0]->nom_categorie : '';
    // $libelle = !empty($plats) ? $plats[0]->libelle : '';


    $count = 0;

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
    </head>

    <body>
        <div class="contenu">
            <h1 class="row col-12 fst-italic">Nos <?= $nom_categorie ?></h1>
            <!-- <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a> -->
            <main class="container">
                <div class="row">
                    <?php
                    foreach ($plats as $plat) : ?>
                        <div class="col-md-6 mb-4">
                            <div class="card" style="width: 18rem;">
                                <img src="/public/IMG/food/<?= $plat->image ?>" alt="<?= $plat->libelle ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $plat->libelle ?></h5>
                                    <p class="card-text"> <?= $plat->description ?></p>
                                    <p class="content bg-body"><?= $plat->prix ?></p>
                                </div>
                                <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal" data-bs-target="#modal<?= $plat->id?>">Ajouter au panier
                                    <i class="bi bi-basket"></i>
                                </button>

                            </div>
                        </div>

                        <!-- /// LA MODAL D'AJOUT AU PANIER/// -->
                        <div class="modal fade" id="modal<?= $plat->id?>" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title rounded p-3">Ma commande</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-secondary" aria-describedby="quantité">
                                        <form action="ajouter_au_panier.php" method="post" id="valid" novalidate>
                                            <div class="dropdown">
                                                <label for="quantité" class="lead text-white">Combien de <?= $plat->libelle ?> désirez-vous</label>
                                                <input type="number" id="quantité" name="quantite" value="1" min="1" max="10">
                                                <input type="hidden" name="platId" value="<?= $plat->id ?>">
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

                    endforeach;
                }
                ?>
                </div>
            </main>
        </div>
        <?php
        include('../partials/footer.php');
        ?>

        <script type="module" src="../dist/assets/index.js"></script>
    </body>

    </html>