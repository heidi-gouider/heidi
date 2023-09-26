<?php
//je démare la session php = "identifiant donné au navigateur pour l'identifie du coté serveur et rendre sur chaque page les diff variables stocké"
// session_start();

// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $title = "Catégories";
// include('../partials/header.php');
//inclusion de la page de connexion à la base de donnée
require_once('db_connect.php');

//je prépare la requête
// attention à prendre en compte les commandes annulées
$requete = $db->query("SELECT plat.id, plat.libelle AS nom_plat, SUM(quantite) AS nombre_vendu FROM commande LEFT JOIN plat ON commande.id_plat = plat.id
WHERE commande.etat != 'Annulée' GROUP BY plat.id, plat.libelle ORDER BY nombre_vendu DESC
LIMIT 6");
// J'exécutez la requête
// $requete->execute();
// récupération les données
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);

// Fermez le curseur
$requete->closeCursor();

//requette pour le plat qui rapporte le plus
$requete = $db->query("SELECT plat.id, plat.libelle AS nom_plat, SUM(total) recette FROM commande LEFT JOIN plat ON commande.id_plat = plat.id
WHERE commande.etat != 'Annulée' GROUP BY plat.id, plat.libelle ORDER BY recette DESC LIMIT 1");

$tableaux=$requete->fetchAll(PDO::FETCH_OBJ);

$requete->closeCursor();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Liste des plats les plus vendus</title>
</head>

<body>
    <!-- <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a> -->
    <!-- <div class="contenu"> -->
        <h1 class="fst-italic">Liste des plats les plus vendus</h1>
        <!-- <div class="container d-flex justify-content-center" id="section"> -->

        <main class="container">
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nom plat</th>
                                    <th>quantité vendus</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tableau as $commande) : ?>
                                    <tr>
                                        <td><?= $commande->id; ?></td>
                                        <td><?= $commande->nom_plat; ?></td>
                                        <td><?php echo $commande->nombre_vendu; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

        </main>
        <h2 class="fst-italic">Le plat le plus rémunérateur</h1>
        <?php foreach ($tableaux as $commande) {
    echo $commande->id . $commande->nom_plat . $commande->recette;
}
?>
        <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>