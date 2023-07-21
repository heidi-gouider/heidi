<?php
$title = "Nos Plats";
include('../partials/header.php');
?>

<div class="contenu">
<h1 class="row col-12 fst-italic">Nos burgers</h1>
<!-- /// LA MODAL /// -->
<div class="modal fade" id="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title rounded p-3">Ma commande</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-secondary" aria-describedby="quantité">
        <div class="dropdown">
          <!-- <button class="btn btn-secondary dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false"> -->
          <label for="quantité" class="lead text-white">Combien de burgers désirez-vous</label>
          <input type="number" id="quantité" name="amount" value="1" min="1" max="10">
          <!-- </button> -->
          <!-- <select class="dropdown-menu">
              <option> -->
          <!-- <input type="number" id="number" name="amount" value="1" min="1" max="10"> -->
          <!-- </option>
            </select> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <!-- mettre en place un "submit"  pour envoyer les données ... ? -->
        <button type="button" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<!-- /// LES PLATS /// -->
<div class="container m-5 pt-3" id="cards">
  <div class="row  m-3 justify-content-around" id="row1-burger">
    <div class="card p-3 w-25">
      <!-- <div class="card-header ">
        <button type="button" class="btn text-white">
          <i class="bi bi-plus"></i>
        </button> -->
        <img src="/public/IMG/food/cheesburger.jpg" alt="image burger" id="image1">
      <!-- </div> -->
      <div class="card-title">
        <h5>fromage</h5>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p>description du produit</p>
          <p class="content bg-body"> 6.90 $ </p>
        </div>
        <!-- <div class="container"> -->
        <!-- bouton -->
        <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal" data-bs-target="#modal">Ajouter au panier
          <i class="bi bi-basket"></i>
        </button>

      </div>
    </div>

    <div class="card p-3 w-25">
      <!-- <div class="card-header ">
        <button type="button" class="btn text-white">
          <i class="bi bi-plus"></i>
        </button> -->
        <img src="/public/IMG/food/veggie-burger.jpg" alt="image veggie burger" id="image2">
      <!-- </div> -->
      <div class="card-title">
        <h5>le végé</h5>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p>description du produit</p>
          <p class="content bg-body">6.90 $</p>
        </div>
        <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal" data-bs-target="#modal">Ajouter au panier
          <i class="bi bi-basket"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="row  m-3 pt-5 justify-content-around">
    <div class="card p-3 w-25">
      <img src="/public/IMG/food/hamburger.jpg" alt="image hamburger" id="image3">
      <div class="card-title">
        <h5>classique</h5>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p>description du produit</p>
          <p class="content bg-body">5.90 $</p>
        </div>
        <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal" data-bs-target="#modal">Ajouter au panier
          <i class="bi bi-basket"></i>
        </button>
      </div>
    </div>

    <div class="card p-3 w-25">
      <img src="/public/IMG/food/burger-du-chef.jpg" alt="image burger du chef" id="image4">
      <div class="card-title">
        <h5>burger du chef</h5>
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <p>description du produit</p>
          <p class="content bg-body">7.90 $</p>
        </div>
        <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal" data-bs-target="#modal">Ajouter au panier
          <i class="bi bi-basket"></i>
        </button>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include('../partials/footer.php');
?>

<script type="module" src="../dist/assets/index.js"></script>
</body>

</html>