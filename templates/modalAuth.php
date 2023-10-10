<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>

    <!-- /// LA MODAL authentification/// -->
    <div class="error-message">
        <?php
        // Vérifier s'il y a un message d'erreur
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
            // Effacer le message d'erreur
            unset($_SESSION['error_message']);
        }
        ?>
    </div>


    <div id="modalAuth" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Je valide ma commande</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="contenu">
                <div class="modal-body mt-5">
                        <!-- Contenu de la modal -->
                        <h3 class="text-center custom-title text-white">J'ai déjà un compte</h3>

                        <div class="container mx-auto" id="formulaire">
                            <!-- <form action="<?php //echo $_SERVER["PHP_SELF"]; 
                                                ?>" method="post" onsubmit="return valider(event)" id="valid"  novalidate> -->
                            <form action="mon_compte_script.php" method="post" id="valid" novalidate>
                                <!-- onsubmit="return valider(event)"  -->

                                <!-- class="validation row col-8 m-5 " -->
                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Me connecter</button>
                                </div>
                            </form>
                        </div>
                        <div class="text-center mt-5">
                            <h3 class="text-center custom-title text-white">Je n'ai pas de compte </h3>
                            <a class="btn btn-primary rounded-0 mt-3 align-items-center text-nowrap" href="/templates/inscription.php">
                                Je minscrit</a>
                        </div>
                        <div class="text-center mt-5">
                            <h3 class="text-center custom-title text-white">Je continue sans compte </h3>
                            <a class="btn btn-primary rounded-0 mt-3 align-items-center text-nowrap" href="/templates/commande_form.php">
                                valider</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // include('../partials/footer.php');
    ?>
    </div>
    <script type="module" src="../dist/assets/index.js"></script>
</body>

</html>