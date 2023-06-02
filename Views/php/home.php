<!DOCTYPE html>
<html lang="FR">

<head>

    <!-- Meta tags -->
    <meta charset="UTF-8" />
    <meta name="description" content="Application Web de gestion de vélo perdu puis retrouvé. TPI-2023" />
    <meta name="author" content="Cyril Narducci" />

    <!-- Inclusion des modules de l'application -->
    <?php
    include('../module/islogged.php');
    include('../module/navbar.html');
    ?>

    <!-- Titre de la page -->
    <title>Home</title>

</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .center-image {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-12 center-image">
                <img src="../../Files/appfiles/logo.png" alt="Image centrée" class="img-fluid">
            </div>
        </div>
    </div>

    <?php print $_SESSION['username']; 
    print $_SESSION['city'] . '<br>';
    print $_SESSION['trimSelect'];
    print $_SESSION['yearSelect'];
    ?>
</body>

</html>