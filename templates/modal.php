<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>message d'envoi</title>
</head>
<!-- attention cette page n'est pas vérifiée! -->

<body>

  <!-- <?php include("../../../SERVEUR/PHP/header.php"); ?> -->
  <!-- le header pourrait etre dans un container fluid -->

  <!-- <header> <a href="index.html">Accueil</a>
    </header>
    <h1 class="row col-12 justify-content-end">plats sélectionnés</h1>
 -->
  <!-- créer une modale affichée au click sur boutton
      avec un submit pour enregistrer dans la commande 'pour la quantité de plats voulu' -->

  <!-- /// LA MODAL /// -->
  <div class="modal" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Message d'envoi</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-success">
          <p id="modalMessage">Votre demande a été envoyé avec succès !</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL PLATS -->
  <!-- <div class="container">
        <button type="button" class=" d-block mt-5 btn btn-secondary mx-auto" data-bs-toggle="modal"
            data-bs-target="#modal">Ajouter au panier</button>

        <div class="modal fade" id="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ma commande</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" aria-describedby="content">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Quantité
                                <input type="number" id="number" name="amount" value="1" min="1" max="10">
                            </button>
                            <select class="dropdown-menu">
                                <option type="number" value="1" min="1" max="20"></option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button> -->
  <!-- mettre en place un "submit"  pour envoyer les données ... ? -->
  <!-- <button type="button" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


  <!-- MODAL SUCCESS ENVOIE FORM -->
  <!-- data-bs-backdrop="static" -->
  <!-- <div class="modal fade modal-sm" id="modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="message envoyé"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-success">Message envoyer !</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
        </div>
        <div class="modal-body">
          <p>Votre message a bien été envoyé !</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div> -->




 
  <script type="module" src="../../../main.js"></script>

</body>

</html>