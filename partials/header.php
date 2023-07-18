<!-- require est utilisé lorsque l'inclusion du fichier est obligatoire et générera une erreur fatale en cas d'échec,
-----include est utilisé lorsque l'inclusion du fichier est facultative et générera un avertissement en cas d'échec. -->

<!-- le header pourrait etre dans un container fluid -->


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <meta name="description" content="">
</head>

<body>
    <div class="container-fluid fixed-top mb-4" id="menu">
        <div class="row">
            <div class="col-4 col-md-2 d-flex justify-content-end align-items-center">
                <a class="navbar-brand logo d-flex mx-2 py-3 justify-content-center" href="index.html">
                    <img src="/ASSETS/IMG/logo/logo.png" alt="logo" style="width: 50%; border-radius: 60%;">
                </a>
                <button id="installButton" class="btn btn-danger">Installer l'appli</button>
            </div>
            <div class="col-8 col-md-10 d-flex align-items-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- <ul class="nav-fill justify-content-end"> -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 justify-content-center text-sm">
                        <li class="nav-item pe-4 pt-2">
                            <a class="nav-link active nav-link-custom" id="link-active" aria-current="page"
                                href="index.html">Accueil</a>
                        </li>
                        <li class="nav-item pe-4 pt-2">
                            <a class="nav-link nav-link-custom" href="FRONT/STATIQUE/HTML/category.html">Catégories</a>
                        </li>
                        <li class="nav-item pe-4 pt-2">
                            <a class="nav-link nav-link-custom" href="FRONT/STATIQUE/HTML/plats.html">Plats</a>
                        </li>
                        <li class="nav-item pe-4 pt-2">
                            <a class="nav-link nav-link-custom" href="FRONT/STATIQUE/HTML/contact.html">Contact <i
                                    class="bi bi-envelope"></i></a>
                        </li>
                        <!-- <li class="nav-item" id="commande"> -->
                        <li class="btn btn-command d-flex rounded-0 mt-3 align-items-center" id="commande">
                            <!-- <a class="btn btn-order rounded-0"  href="FRONT/STATIQUE/HTML/commande.html"> -->
                            <a class="nav-link" href="FRONT/STATIQUE/HTML/commande.html">
                                Ma commande <i class="bi bi-basket"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-4 col-md-2 d-flex justify-content-end align-items-center">
                <a class="navbar-brand logo d-flex mx-2 py-3 justify-content-center" href="index.html">
                    <img src="ASSETS/IMG/logo/logo.png" alt="logo" style="width: 50%; border-radius: 60%;">
                </a>
                <button id="installButton" class="btn btn-danger">Installer l'appli</button>
            </div> -->
        </div>
    </div>
    </div>
    <script type="module" src="../../../main.js"></script>

</body>

</html>