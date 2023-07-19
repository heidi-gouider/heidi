<?php
$title = "Accueil";
include('partials/header.php');
?>

<!-- <div class="container-fluid video-container"> -->
<div class="row video-container">
    <div class="text-white" id="titre-accueil">
        <h1>The District</h1>
    </div>

    <!-- <div class="row justify-content-center"> -->
    <form class="search-form d-flex justify-content-center" id="search-bar">
          <input type="text" placeholder="Rechercher...">
          <button class="btn text-light bg-dark" type="submit"><i class="bi bi-search"></i></button>
        </form>
    <!-- </div> -->
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="input-group search-bar w-25">-->
        <!-- <div class="col-3 col-md-4 col-lg-4 search-bar " id="search-bar">
            <input class="form-control" type="search" placeholder="Recherche" aria-label="Search">
            <button class="btn text-light bg-dark"><i class="bi bi-search"></i></button>
        </div>
    </div> -->
    <video controls="controls" class="" loop="loop" autoplay="autoplay" muted>
        <!-- <video controls="controls" class="controls video-fluid" loop="loop" autoplay="autoplay" muted> -->
        <source src="public/VIDEO/video2.mp4">
    </video>
</div>

<!-- <h2>Bienvenue au restaurant</h2> -->

<div class="container d-grid mt-lg-4" id="images">
    <div class="row gap-5 justify-content-sm-center m-3">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/asian_food_cat.jpg" alt="asian food">
        <img class="col-6 col-md-4 col-lg-3  p-2 img-thumbnail" src="public/IMG/category/burger_cat.jpg" alt="burger">
        <img class="col-6 col-md-4 col-lg-3  p-2 img-thumbnail" src="public/IMG/category/salade_cat.jpg" alt="salad">
    </div>
    <div class="row gap-5 justify-content-sm-center d-md-flex m-3">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/pasta_cat.jpg" alt="pates">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/sandwich_cat.jpg" alt="sandwich">
        <img class="col-6 col-md-4 col-lg-3 p-2 img-thumbnail" src="public/IMG/category/veggie_cat.jpg" alt="végé">
    </div>
</div>


<footer class="footer ">
    <h3>Pour nous suivre !</h3>
    <div class="container">
        <ul class="list-inline text-center">
            <li class="list-inline-item">
                <a href="#"><i class="bi bi-facebook"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="#"><i class="bi bi-geo-alt"></i></a>
            </li>
            <li class="list-inline-item">
                <a href="#"><i class="bi bi-instagram"></i></a>
            </li>
        </ul>
    </div>
    <h4>Nous contacter</h4>
</footer>
<script type="module" src="dist/assets/index.js"></script>

</body>

</html>