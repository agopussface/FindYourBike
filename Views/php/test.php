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

<header>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-3">ManageMyIt</h1>
                    <h3 class="text-center mb-3">Login</h3>
                    <form action="check/checkLogin.php" method="post">
                        <div class="form-group">
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nathalie Portman = natportman">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-dark" value="Se connecter">
                        </div>
                        <div>
                            <a href="insertUser.php">Créer un compte</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
</body>

</html>