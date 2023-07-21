<?php
$title = "Catégories";
include('../partials/header.php');
?>



<!-- <h1 class="row col-12 fst-italic">Notre carte</h1> -->
<div class="contenu">
  <h1 class="fst-italic">Notre carte</h1>
  <div class="container d-flex justify-content-center" id="section">
    <div id="carousel" class="carousel slide row col-5 m-5" data-ride="carousel" data-interval="2000">
      <!-- Indicateurs -->
      <ul class="carousel-indicators mx-auto">
        <li data-bs-target="#carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="3"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="4"></li>
        <li data-bs-target="#carousel" data-bs-slide-to="5"></li>
      </ul>
      <!-- CAROUSEL -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/public/IMG/category/burger_cat.jpg" class="d-block w-100" alt="photo burger">
          <div class="carousel-caption d-none d-md-block">
            <!-- <a href="plats.html">Nos burgers</a> -->
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="/public/IMG/category/pizza_cat.jpg" class="d-block w-100" alt="photo pizza">
          <div class="carousel-caption d-none d-md-block">
            <a href="plats.html">Nos pizzas</a>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="/public/IMG/category/asian_food_cat.jpg" class="d-block w-100" alt="photo asian food">
          <div class="carousel-caption d-none d-md-block">
            <a href="plats.html">Nos menu d'asie</a>
            <p>description et commentaire.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="/public/IMG/category/pasta_cat.jpg" class="d-block w-100" alt="photo pates">
          <div class="carousel-caption d-none d-md-block">
            <a href="plats.html">Nos pates</a>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="/public/IMG/category/salade_cat.jpg" class="d-block w-100" alt="photo salade">
          <div class="carousel-caption d-none d-md-block">
            <a href="plats.html">Nos salades</a>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="/public/IMG/category/sandwich_cat.jpg" class="d-block w-100" alt="photo sandwich">
        </div>
      </div>
      <!-- CONTROL DU CAROUSEL -->

      <button class="carousel-control-prev" href="#carousel" type="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon rounded" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </button>
      <button class="carousel-control-next " href="#carousel" type="button" data-bs-slide="next">
        <!-- <svg id="i-chevron-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="5">
          <path d="M12 30 L24 16 12 2" />
      </svg> -->
        <span class="carousel-control-next-icon rounded" aria-hidden="true"></span>
        <span class="sr-only"></span>
      </button>
    </div>
  </div>
  <button type="button" class="btn btn-order bg-danger col-3 col-md-4 col-lg-3" href="/PAGES/commande.php">
    Ma commande <i class="bi bi-basket btn-icon"></i>
  </button>
  <!-- <a class="btn btn-order rounded-0" href="/PAGES/commande.php"> -->

    <!-- <a class="nav-link commande btn mx-auto bg-danger col-2 " href="/PAGES/commande.php" role="button">
      <span class="d-sm-none d-md-inline">commander</span>
    <i class="bi bi-basket btn-icon"></i></a> -->
</div>

<?php
include('../partials/footer.php');
?>

<script type="module" src="/dist/assets/index.js"></script>
</body>

</html>