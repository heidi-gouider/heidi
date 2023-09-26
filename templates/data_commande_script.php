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
//faire un lien entre id_plat dans la table commande et le libelle dans la table plat(jointure)
// $requete = $db->query("SELECT commande.*FROM commande ");
$requete = $db->query("SELECT commande.*, plat.libelle AS nom_plat FROM commande INNER JOIN plat ON commande.id_plat = plat.id");

//je lie les valeurs aux paramètres
// $date = "date_commande";
// $nom = "nom_client";
// $telephone = "telephone_client";
// $email = "email_client";
// $adresse = "adresse_client";
// $plat = "nom_plat";
// $prix = "total"; 

// $requete->bindParam(":date_commande", $date, PDO::PARAM_INT);
// $requete->bindParam(":nom_client", $nom, PDO::PARAM_STR);
// $requete->bindParam(":telephone_client", $telephone, PDO::PARAM_INT);
// $requete->bindParam(":email_client", $email, PDO::PARAM_STR);
// $requete->bindParam(":adresse_client", $adresse, PDO::PARAM_STR);
// $requete->bindParam(":nom_plat", $plat, PDO::PARAM_STR);
// $requete->bindParam(":total", $prix, PDO::PARAM_STR);

// $requete->bindParam(":disc_id", $_POST["disc_id"], PDO::PARAM_INT);


// J'exécutez la requête
// $requete->execute();

// récupération les données
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);

// Fermez le curseur
$requete->closeCursor();


// $requete = $db->query("SELECT commande.*, plat.libelle AS nom_plat FROM commande INNER JOIN plat ON commande.id_plat = plat.id");
// $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
// $requete->closeCursor();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Liste des commandes</title>
</head>

<body>
    <!-- <a href="add_form.php" class="btn btn-primary float-end">Ajouter</a> -->
    <!-- <div class="contenu"> -->
        <h1 class="fst-italic">Liste des commandes</h1>
        <!-- <div class="container d-flex justify-content-center" id="section"> -->

        <main class="container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date de la commande</th>
                                    <th>Nom du client</th>
                                    <th>telephone client</th>
                                    <th>email client</th>
                                    <th>adresse client</th>
                                    <th>nom du plat</th>
                                    <th>prix</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tableau as $commande) : ?>
                                    <tr>
                                        <td><?php echo $commande->date_commande; ?></td>
                                        <td><?php echo $commande->nom_client; ?></td>
                                        <td><?php echo $commande->telephone_client; ?></td>
                                        <td><?php echo $commande->email_client; ?></td>
                                        <td><?php echo $commande->adresse_client; ?></td>
                                        <td><?php echo $commande->nom_plat; ?></td>
                                        <td><?php echo $commande->total; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

        </main>

        <script type="module" src="../dist/assets/index.js"></script>

</body>

</html>