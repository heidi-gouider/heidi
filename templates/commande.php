<?php
// Active l'affichage des erreurs dans le navigateur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// je démare la session
session_start();

$title = "Ma commande";
include('../partials/header.php');
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
  // if (isset($_SESSION['error_message'])) {
  //   echo '<pre>';
  //   echo 'alert("' . $_SESSION['error_message'] . '");'; // Affichez un message d'alerte
  //   echo '</pre>';

  // Vérifiez si la variable de session success_message est définie
  // } elseif (isset($_SESSION['success_message'])) {
  //   echo '<script>';
  //   echo 'alert("' . $_SESSION['success_message'] . '");'; // Affichez un message d'alerte
  //   echo '</script>';

  // Supprimez la variable de session après l'affichage de la pop-up
  //   unset($_SESSION['success_message']);
  // }

  ?>
  <!-- PENSER A AJOUTER UNE CONNEXION... -->

  <!-- Pour désactiver les info-bulles ajouter l'attribut novalidate à la class du form -->
  <div class="contenu">
    <h1 class="fst-italic">Ma commande</h1>
    <div class="text-center mt-4">
      <a href="<?php header("Location: " . $_SERVER['HTTP_REFERER']); ?>" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Continuer mes achats</a>
    </div>

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
                      <span class="col-4">quantité</span>
                      <span class="content col-2 border"><?= $quantite ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- </div> -->
      <?php
          }

        }

      }

      ?>
    </div>

    <div class="text-center">
      <!-- <a class="btn btn-commande rounded-0 mt-3 align-items-center text-nowrap" id="openModalButton" href="/templates/mon_compte.php">
        <span class="d-md-none">Ma commande</span>
        <span class="d-md-flex d-none"><i class="bi bi-basket btn-icon"></i> Valider ma commande</span> -->
      </a>

      <!-- Ajoutez un bouton pour ouvrir le modal -->
      <button id="openModalButton" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#modalAuth">Valider ma commande</button>

    </div>

    <!-- /// LA MODAL authentification/// -->
    <div class="error-message">
      <?php
      // Vérifier s'il y a un message d'erreur
      if (isset($_SESSION['error_message'])) {
        echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
        // Effacer le message d'erreur
        unset($_SESSION['error_message']);
      }
      ?>
    </div>

    <div id="modalAuth" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Je valide ma commande</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Contenu de la modal -->
            <h3 class="text-center custom-title">J'ai déjà un compte</h3>

            <div class="container mx-auto" id="formulaire">
              <!-- <form action="<?php //echo $_SERVER["PHP_SELF"]; 
                                  ?>" method="post" onsubmit="return valider(event)" id="valid"  novalidate> -->
              <form action="mon_compte_script.php" method="post" id="valid" novalidate>
                <!-- onsubmit="return valider(event)"  -->

                <!-- class="validation row col-8 m-5 " -->
                <div class="col-md-6 mb-4">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="col-md-6 mb-4">
                  <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary">Me connecter</button>
                </div>
            </div>
            </form>
          </div>
          <div class="text-center">
            <h3 class="text-center custom-title">Je n'ai pas de compte </h3>
            <a class="btn btn-primary rounded-0 mt-3 align-items-center text-nowrap" href="/templates/inscription.php">
              Je minscrit</a>
          </div>
          <div class="text-center">
            <h3 class="text-center custom-title">Je continue sans compte </h3>
            <a class="btn btn-primary rounded-0 mt-3 align-items-center text-nowrap" href="/templates/commande_form.php">
              valider</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include('../partials/footer.php');
  ?>
  </div>
  <script type="module" src="../dist/assets/index.js"></script>
</body>

</html>