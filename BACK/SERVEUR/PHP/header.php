<!-- require est utilisé lorsque l'inclusion du fichier est obligatoire et générera une erreur fatale en cas d'échec,
-----include est utilisé lorsque l'inclusion du fichier est facultative et générera un avertissement en cas d'échec. -->

  <!-- le header pourrait etre dans un container fluid -->


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accuei</title>
  <meta name="description" content="">
</head>
<body>
    <div class="container">
        <div class="row justify-content-between">
            <!-- le header -->
            <div class="col-3">
                <img src="../ASSETS/IMG/logo/logo.png" alt="logo" style="width: 90%;">
            </div>
            <!-- la nav-bar -->
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <!-- utiliser ce lien pour le logo -->
                <!-- <a class="navbar-brand" href="#">Jarditou.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>  -->
                <!-- je regroupe et cache les éléments pour le responsive -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">           
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="category.html">Tableau</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="plats.html">Plats</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="commande.html">
                    <i class="bi bi-basket"></i> 
                    Ma commande</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Votre promotion" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
                </div>
            </div>
        </nav>
    </div>

    <?php
      $euro=6.55957;
      printf("%.2f FF<br />",$euro);
      $money1 = 68.75;
      $money2 = 54.35;
      $money = $money1 + $money2;
      // echo $money affichera "123.1";
      echo "affichage sans printf : " . $money . "<br />";
      $monformat = sprintf("%01.2f", $money);

      // echo $monformat affichera "123.10"
      echo "affichage avec printf : " . $monformat . "<br />";

      $year="2002";
      $month="4";
      $day="5";
      $varDate = sprintf("%04d-%02d-%02d", $year, $month, $day) ;

      // echo $varDate affichera "2002-04-05"
      echo "affichage avec sprintf :\n" . $varDate. "<br />";
      $var1 = "bonjour";
$$var1 = "le monde"; 
echo $bonjour. "<br />";
echo $_SERVER["REMOTE_ADDR"]. "<br />";
// echo $_SERVER["SERVER_ADDR"];

    ?>
    
</body>
</html>