<?php
$title="Commande";
include ('../partials/header.php');
?>

  <!-- PENSER A AJOUTER UNE CONNEXION... -->

  <!-- Pour désactiver les info-bulles ajouter l'attribut novalidate à la class du form -->
  <div class="contenu">
  <h1 class="row col-12 fst-italic">Ma commande</h1>

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


  <!-- /// LES PLATS COMMANDÉS EN SCROLL HIDDEN/// -->
  <div class="container m-5 overflow-hidden overflow-y-scroll" style="height: 20vh;cursor: pointer;">
    <!-- <div class="row"> -->
    <!-- <div data-bs-spy="scroll" data-bs-target="#simple-list-example" data-bs-offset="0" data-bs-smooth-scroll="true"
    class="scrollspy-example" tabindex="0"> -->
    <div class="row  m-3 justify-content-around">
      <div class="card p-3 w-50 h-50 flex-row justify-content-between ">
        <img class="col-4" src="public/IMG/food/cheesburger.jpg" alt="image burger" id="img1">
        <div class="col-7">
          <div class="card-title row justify-content-around">
            <h5 class="col-6"> burger-du-chef</h5>
            <i class="bi bi-basket col-1"></i>
          </div>
          <div class="card-body row justify-content-around">
            <span class="col-4">quantité</span>
            <span class="content col-2 border">2</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row  m-3 justify-content-around">
      <div class="card p-3 w-50 flex-row justify-content-between ">
        <img class="col-4" src="public/IMG/food/cheesburger.jpg" alt="image cheesburger" id="img2">
        <div class="col-7">
          <div class="card-title row justify-content-around">
            <h5 class="col-6"> burger-du-chef</h5>
            <i class="bi bi-basket col-1"></i>
          </div>
          <div class="card-body row justify-content-around">
            <span class="col-4">quantité</span>
            <span class="content col-2 border">2</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ajouter un boutton pour modifier la commande -->

  <!-- <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal"
            data-bs-target="#modal">Ajouter au panier
            <i class="bi bi-basket"></i>
          </button> -->

  <!-- ajout de plusieurs plats à la suite => voir avec une méthode ou propriété bs pour cacher et scrowlé -->



  <div class="container d-flex justify-content-center">
    <form action="#" method="post" id="valid" class="validation row col-8 m-5 " novalidate>
      <div class="col-md-12">
        <label for="nom" class="form-label">
          Nom et Prénom
          <span class="required text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-hover" placeholder="" id="nom" name="nom" autocomplete="off"
          required>
        <span class="invalid-feedback">Veuillez renseigner votre Nom et votre prénom</span>
      </div>

      <div class="col-md-6">
        <label for="email" class="form-label">
          Email
          <span class="required text-danger">*</span>
        </label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend3">@</span>
          <input type="text" class="form-control" id="email" name="email" autocomplete="off" required>
          <span class="invalid-feedback">Veuillez renseigner votre Email</span>
        </div>
      </div>

      <div class="col-md-6">
        <label for="tel" class="form-label">
          Téléphone
          <span class="required text-danger">*</span>
        </label>
        <input type="number" class="form-control" id="tel" name="tel" autocomplete="off" required>
        <span class="invalid-feedback">Veuillez renseigner un téléphone</span>
      </div>

      <div class="mb-3">
        <label for="adresse" class="form-label">
          Votre adresse
          <span class="required text-danger">*</span>
        </label>
        <textarea class="form-control" id="adresse" rows="3" autocomplete="off" required></textarea>
        <span class="invalid-feedback">Veuillez renseigner votre adresse</span>
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
  <!-- </form> -->

  <?php
include('../partials/footer.php');
?>

  <script type="module" src="dist/assets/index.js"></script>
</body>

</html>