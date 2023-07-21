<?php
$title = "Accueil";
include('partials/header.php');
?>

<div class="row video-container">
    <div class="text-white fst-italic" id="titre-accueil">
        <h1>The District</h1>
    </div>

    <form class="search-form d-flex justify-content-center" id="search-bar">
        <input type="text" placeholder="Rechercher...">
        <button class="btn text-light bg-dark" type="submit"><i class="bi bi-search"></i></button>
    </form>
    <video controls="controls" class="" loop="loop" autoplay="autoplay" muted>
        <!-- <video controls="controls" class="controls video-fluid" loop="loop" autoplay="autoplay" muted> -->
        <source src="public/VIDEO/video2.mp4">
    </video>
</div>

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

<?php
include('partials/footer.php');
?>


<script type="module" src="dist/assets/index.js"></script>

</body>

</html>