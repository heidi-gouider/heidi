<?php
$title = "category";
include('../partials/header.php');
?>

<div class="contenu">
    <h1 class="fst-italic">Notre carte</h1>
    <section class="category">
        <!-- conteneur principal -->
        <div class="carousel d-flex align-items-center justify-content-center mx-auto">
            <!-- <div class="carousel"> -->
            <!-- conteneur des éléments -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- <div class="image-container"> -->
                        <img src="/public/IMG/category/burger_cat.jpg" class="rounded p-3 " alt="photo burger">
                        <!-- <div class="carousel-caption d-none d-md-block text-white text-center text-wrap custom-scrollbar">
                            <h2>Des savouveux burgers</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident iste ratione illum,
                                consequatur unde dolor sequi est minima odio debitis explicabo praesentium voluptas reiciendis iure illo dignissimos atque libero. Consequatur.
                            </p>
                        </div> -->
                    <!-- </div> -->
                    <img src="/public/IMG/category/asian_food_cat.jpg" class="rounded p-3" id="image2" alt="photo asian food">
                    <img src="/public/IMG/category/pizza_cat.jpg" class="rounded p-3" id="image3" alt="photo pizza">
                    <img src="/public/IMG/category/burger_cat.jpg" class="rounded p-3" alt="photo burger">
                    <img src="/public/IMG/category/pasta_cat.jpg" class="rounded p-3" alt="pates">
                    <img src="/public/IMG/category/salade_cat.jpg" class="rounded p-3" alt="photo salades">
                </div>
            </div>
            <!-- </div> -->
        </div>
        <!-- </div> -->
        <!-- CONTROL DU CAROUSEL -->
    </section>


    <button class="carousel-control-prev" href="#carousel" type="button" data-bs-slide="prev">
        <svg id="i-caret-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M22 30 L6 16 22 2 Z" />
        </svg>
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </button>
    <button class="carousel-control-next" href="#carousel" type="button" data-bs-slide="next">
        <svg id="i-caret-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M10 30 L26 16 10 2 Z" />
        </svg>
        <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
        <span class="sr-only"></span>
    </button>
    <!-- <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol> -->
    <!-- </div>
    </div> -->

    <!-- si je change mes item en cartes
            <div class="col-md-4">
                <div class="card p-3 w-25">
                    <img src="/ASSETS/IMG/category/asian_food_cat.jpg" alt="image hamburger" id="image2" />
                    <div class="card-title">
                      <h5>burger du chef</h5>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <p>description du produit</p>
                        <p class="content bg-body">7.90 $</p>
                      </div>
                      <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal"
                        data-bs-target="#modal">Ajouter au panier
                        <i class="bi bi-basket"></i>
                      </button>
                    </div>
                  </div> -->
</div>

<?php
include('../partials/footer.php');
?>
<script src="/JAVASCRIPT/Carousel.js"></script>
<script type="module" src="../../../main.js"></script>

</body>

</html>