<?php
$title = "Contact";
include('../partials/header.php');
?>
<!-- Pour désactiver les info-bulles ajouter l'attribut novalidate à la class du form -->
<div class="contenu">
  <h1 class="fst-italic">Nous contacter
    <span class="titre"></span>
  </h1>

  <?php
  include('PAGES/modal.php');
  ?>

  <div class="container d-flex justify-content-center mx-auto" id="formulaire">
    <form action="target.txt" method="post" onsubmit="return valider(event)" id="valid" class="validation row col-8 m-5 " novalidate>
      <div class="col-md-6 mb-4">
        <label for="nom" class="form-label">Nom
          <span class="required text-danger">*</span>
        </label>
        <input type="text" class="form-control form-control-hover champ" placeholder="Nom" name="nom" id="nom" autocomplete="off" required>
        <span class="invalid-feedback">Veuillez renseigner votre Nom
        </span>
        <div class="erreur text-danger" id="erreurNom"></div>
      </div>

      <div class="col-md-6 mb-4">
        <label for="prenom" class="form-label">Prénom
          <!-- <span class="required text-danger">*</span> -->
        </label>
        <input type="text" class="form-control form-control-hover" placeholder="Prénom" id="prenom" name="prenom" autocomplete="off">
        <!-- <span class="invalid-feedback">Veuillez renseigner votre Prénom</span> -->
        <!-- <span class="erreur text-danger"></span> -->
      </div>

      <div class="col-md-6 mb-4">
        <label for="email" class="form-label">Email
          <span class="required text-danger">*</span>
        </label>
        <div class="input-group has-validation">
          <span class="input-group-text">@</span>
          <input type="text" class="form-control form-control-hover champ" placeholder="Email" id="email" name="email" autocomplete="off" required>
          <span class="invalid-feedback">Veuillez renseigner un email</span>
          <div class="erreur text-danger" id="erreurMail"></div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <label for="tel" class="form-label">Téléphone
          <!-- <span class="required text-danger">*</span> -->
        </label>
        <input type="tel" class="form-control form-control-hover champ" placeholder="Téléphone" id="tel" name="tel" autocomplete="off">
        <!-- <span class="invalid-feedback">Veuillez renseigner un numéro de téléphone</span> -->
        <div class="erreurTel text-danger" id="erreurTel"></div>
      </div>


      <div class="mb-3">
        <label for="message" class="form-label">Votre message
          <span class="required text-danger">*</span>
        </label>
        <textarea class="form-control form-control-hover champ" placeholder="Mon message" rows="10" id="message" name="message" autocomplete="off" required></textarea>
        <span class="invalid-feedback">Veuillez renseigner votre Nom</span>
        <div class="erreur text-danger" id="erreurMess"></div>
      </div>

      <h6 class="row p-3 text-danger">*Champs obligatoires</h6>

      <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-primary" onclick="valider(event)" id="envoyer" type="submit">Envoyer</button>
        <!--  data-bs-toggle="modal" -->
      </div>
    </form>
  </div>
</div>

<?php
include('../partials/footer.php');
?>

<!-- /// LA MODAL include la modal avec php /// -->

<script type="module" src="/dist/assets/index.js"></script>
<script src="JAVASCRIPT\contact.js"></script>

</body>

</html>