<!DOCTYPE html>
<html lang="FR">

<head>
  <!-- Meta tags -->
  <meta charset="UTF-8" />
  <meta name="description" content="Application Web de gestion de vélo perdu puis retrouvé. TPI-2023" />
  <meta name="author" content="Cyril Narducci" />

  <title>Login</title>

  <!-- Feuilles de style et script JavaScript-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/blockinput.js"></script>

</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Consultation</h2>
        <form action="check/checkConsLogin.php" method="post">
          <div class="mb-3">
            <label for="consUsername" class="form-label">Nom d'utilisateur:</label>
            <input type="text" class="form-control" id="consUsername" name="consUsername" oninput="blockInput()">
          </div>

          <div class="mb-3">
            <label for="consPassword" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="consPassword" name="consPassword">
          </div>

          <button type="submit" class="btn btn-primary" id="consBtn">Se connecter</button>
        </form>
      </div>

      <div class="col-md-6">
        <h2>Commune</h2>
        <form action="check/checkEntrLogin.php" method="post">
          <div class="mb-3">
            <label for="entrUsername" class="form-label">Nom d'utilisateur:</label>
            <input type="text" class="form-control" id="entrUsername" name="entrUsername" oninput="blockInput()">
          </div>

          <div class="mb-3">
            <label for="entrPassword" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="entrPassword" name="entrPassword">
          </div>

          <button type="submit" class="btn btn-primary" id="entrBtn">Se connecter</button>
        </form>
      </div>
    </div>

    <div class="mt-3 align-center">
      <a href="../php/newCity.php" class="btn btn-primary">S'inscrire en tant que commune</a>
    </div>

  </div>

</body>

</html>