<?php
    $title="Accueil";
      include ('partials/header.php');
      ?>
    
    <!-- <div class="container-fluid video-container"> -->
    <div class="row video-container">
        <div class="text-white" id="titre-accueil">
            <h1>The District</h1>
        </div>
        <div class="row  justify-content-center">
            <div class=" input-group search-bar w-25 ">
                <input class="form-control " type="search" placeholder="Recherche" aria-label="Search">
                <button class="btn text-light bg-dark"><i class="bi bi-search"></i></button>
            </div>
        </div>
        <video controls="controls" class="" loop="loop" autoplay="autoplay" muted>
            <!-- <video controls="controls" class="controls video-fluid" loop="loop" autoplay="autoplay" muted> -->
            <source src="dist/VIDEO/video2.mp4">
        </video>
    </div>
    <!-- </div> -->

    <!-- <h2>Bienvenue au restaurant</h2> -->

    <div class="container d-grid mt-lg-4" id="images">
        <div class="row gap-5 justify-content-sm-center m-3">
            <img class="col-3  p-2 img-thumbnail" src="dist/IMG/category/asian_food_cat.jpg" alt="asian food">
            <img class="col-3  p-2 img-thumbnail" src="dist/IMG/category/burger_cat.jpg" alt="burger">
            <img class="col-3  p-2 img-thumbnail" src="dist/IMG/category/salade_cat.jpg" alt="salad">
        </div>
        <div class="row gap-5 justify-content-sm-center d-md-flex m-3">
            <img class="col-3 p-2 img-thumbnail" src="dist/IMG/category/pasta_cat.jpg" alt="pates">
            <img class="col-3 p-2 img-thumbnail" src="dist/IMG/category/sandwich_cat.jpg" alt="sandwich">
            <img class="col-3 p-2 img-thumbnail" src="dist/IMG/category/veggie_cat.jpg" alt="végé">
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