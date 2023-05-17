<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Meta tags -->
  <meta charset="UTF-8" />
  <meta name="description" content="Application Web de gestion de vélo perdu puis retrouvé. TPI-2023" />
  <meta name="author" content="Cyril Narducci" />

  <!-- Titre de la page -->
  <title>Inscription Commune</title>

  <!-- Inclusion des modules de l'application -->
  <?php
  include('../module/navbar.html');
  ?>

</head>

<body>
  <div class="container my-5">
    <h2>Inscription Commune</h2>
    <form action="check/checkCity.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="cityName" class="form-label">Nom de la Commune:</label>
        <input type="text" class="form-control" id="cityName" name="cityName">
      </div>

      <div class="mb-3">
        <label for="cityLogo" class="form-label">Logo de la Commune:</label>
        <input type="file" class="form-control" id="cityLogo" name="cityLogo">
      </div>

      <div class="mb-3">
        <label for="accLastname" class="form-label">Nom de famille:</label>
        <input type="text" class="form-control" id="accLastname" name="accLastname">
      </div>

      <div class="mb-3">
        <label for="accFirstname" class="form-label">Prénom:</label>
        <input type="text" class="form-control" id="accFirstname" name="accFirstname">
      </div>

      <div class="mb-3">
        <label for="accRole" class="form-label">Mon rôle au sein de la commune:</label>
        <input type="text" class="form-control" id="accRole" name="accRole">
      </div>

      <div class="mb-3">
        <label for="accAddress" class="form-label">Adresse postale:</label>
        <input type="text" class="form-control" id="accAddress" name="accAddress">
      </div>

      <div class="mb-3">
        <label for="accEmail" class="form-label">Email:</label>
        <input type="email" class="form-control" id="accEmail" name="accEmail">
      </div>

      <div class="mb-3">
        <label for="accPhone" class="form-label">Numéro de téléphone:</label>
        <input type="tel" class="form-control" id="accPhone" name="accPhone" pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}">
      </div>

      <div class="mb-3">
        <label for="accPassword" class="form-label">Mot de passe:</label>
        <input type="password" class="form-control" id="accPassword" name="accPassword">
      </div>

      <button type="submit" class="btn btn-primary btn-block my-3">Valider</button>
    </form>
  </div>

</body>

</html>