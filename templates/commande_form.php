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
  if (isset($_SESSION['error_message'])) {
    echo '<pre>';
    // Affichez un message d'alerte
    echo 'alert("' . $_SESSION['error_message'] . '")';
    echo '</pre>';

    // Vérifiez si la variable de session success_message est définie
  } elseif (isset($_SESSION['success_message'])) {
    echo '<script>';
    echo 'alert("' . $_SESSION['success_message'] . '");'; // Affichez un message d'alerte
    echo '</script>';

    // Supprimez la variable de session après l'affichage de la pop-up
  //   unset($_SESSION['success_message']);
  }

  ?>

  <!-- Pour désactiver les info-bulles ajouter l'attribut novalidate à la class du form -->
  <div class="contenu">
    <h1 class="fst-italic">Ma commande</h1>
    <div class="text-center mt-4">
      <!-- <a href=" <?php //header("Location: " . $_SERVER['HTTP_REFERER']); 
                      ?>"> continuer mes achats </a> -->
      <a href="category.php" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Continuer mes achats</a>
    </div>
    <?php
    // echo "Plat ID: $platId, Quantité: $quantite<br>";
    // } else {
    // Le panier est vide
    // J'affiche un message
    // if (isset($_SESSION['error_message'])) {
    // echo '<pre>';
    // echo 'alert("' . $_SESSION['panier_vide_message'] . '");';
    // echo '</pre>';
    // echo "Votre panier est vide.";
    // exit();
    $totalCommande = 0;

    ?>

    <!-- /// LES PLATS COMMANDÉS EN SCROLL HIDDEN/// -->
    <!-- récupération des plats enregistrer dans la modal d'ajout de plat -->
    <div class="container overflow-y-auto mt-5" style="height: 30vh;cursor: pointer;">
      <?php
      // Vérifier si le panier existe dans la session
       if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
        // Afficher les éléments du panier
         foreach ($_SESSION['panier'] as $id_plat => $quantite) {
          // Récupérez les informations du plat à partir de la base de données en utilisant $platId
           $plat = $dao->getPlatById($id_plat);
           $prix = $plat->prix;
           $total = $prix * $quantite;
           $totalCommande += $total;
          // Vérifiez si le plat existe (il peut avoir été supprimé de la base de données)
           if ($plat) {    ?>
            <!-- j'affiche les plats du panier -->
            <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
              <div class="row  m-3 justify-content-around">
                <div class="card p-3 w-50 h-25 flex-row justify-content-between">
                  <img src="/public/IMG/food/<?= $plat->image ?>" alt="<?= $plat->libelle ?>">
                  <div class="col-7">
                    <div class="card-title row justify-content-around">
                      <h5 class="col-6"><?= $plat->libelle ?></h5>
                      <i class="bi bi-basket col-1"></i>
                    </div>
                    <div class="card-body row justify-content-around">
                      <div>
                        <span class="col-4">quantité</span>
                        <span class="content col-2 border"><?= $quantite ?></span>
                      </div>
                      <div>
                        <span class="col-4">Total</span>
                        <span class="content col-2 border"><?= $total ?> Euros</span>
                        <!-- <p class="content bg-body"><?= $total ?></p> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?php
          }
        }
      }

?>
    </div>
    <div class="bg-white d-inline-block p-3">
    <p>Total de ma commande : <?= $totalCommande ?> €</p>
    </div>
<!-- ajouter un boutton pour modifier la commande -->

<!-- <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal"
            data-bs-target="#modal">Ajouter au panier
            <i class="bi bi-basket"></i>
          </button> -->

<!-- ajout de plusieurs plats à la suite => voir avec une méthode ou propriété bs pour cacher et scrowlé -->

<!-- /////:FORMULAIRE DE COMMANDE //////////// -->

<div class="container d-flex justify-content-center mt-5" id="formulaire">
  <form action="commande_script_ini.php" method="post" onsubmit="return valider(event)" id="valid" class="validation row col-8 m-5 " novalidate>
    <div class="col-md-12 mb-5">
      <label for="nom" class="form-label">
        Nom et Prénom
        <span class="required text-danger">*</span>
      </label>
      <input type="text" class="form-control form-control-hover" placeholder="" id="nom" name="nom_client" autocomplete="off" required>
      <span class="invalid-feedback">Veuillez renseigner votre Nom et votre prénom</span>
      <div class="erreur text-danger" id="erreurNom"></div>
    </div>

    <div class="col-md-6 mb-5">
      <label for="email" class="form-label">
        Email
        <span class="required text-danger">*</span>
      </label>
      <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend3">@</span>
        <input type="text" class="form-control" id="email" name="email_client" autocomplete="off" required>
        <span class="invalid-feedback">Veuillez renseigner votre Email</span>
        <div class="erreur text-danger" id="erreurMail"></div>
      </div>
    </div>

    <div class="col-md-6">
      <label for="tel" class="form-label">
        Téléphone
        <span class="required text-danger">*</span>
      </label>
      <input type="number" class="form-control" id="tel" name="tel_client" autocomplete="off" required>
      <span class="invalid-feedback">Veuillez renseigner un téléphone</span>
      <div class="erreurTel text-danger" id="erreurTel"></div>
    </div>

    <div class="mb-3">
      <label for="adresse" class="form-label">
        Votre adresse
        <span class="required text-danger">*</span>
      </label>
      <textarea class="form-control" id="adresse" name="adresse_client" rows="3" autocomplete="off" required></textarea>
      <span class="invalid-feedback">Veuillez renseigner votre adresse</span>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="accept_util" name="accept" autocomplete="off" required>
      <label class="form-check-label" for="flexCheckIndeterminate">
        J'accepte les conditions d'utilisations
      </label>
    </div>
    <h6 class="row p-3 text-danger">*Tous les champs sont obligatoires</h6>

    <!-- METTRE EN PLACE UNE ANIMATION SUR LE BTN SUBMIT -->

    <!-- 1/ au survol : déplacement y top et retour base (x3) => CSS -->
    <!-- 2/ disparition du 'submit' et affiche un clin d'oeil malicieux avec un texte "c'était une blagounette !"=> JS  -->
    <!-- 3/ réaparition du btn classique => JS -->

    <div class="col-12 d-flex justify-content-end">
      <button class="btn btn-primary btn-joke" id="envoyer" type="submit">Envoyer</button>
    </div>

  </form>
</div>
  </div>
  <!-- /// LA MODAL include la modal avec php /// -->
  <!-- <div class="modal fade modal-sm" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="message envoyé" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success">Commande envoyer !</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
          <p>Votre commande a bien été enregistré !</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div> -->

  <?php

  // }
  include('../partials/footer.php');
  ?>
  </div>

  <script type="module" src="../dist/assets/index.js"></script>
</body>

</html>