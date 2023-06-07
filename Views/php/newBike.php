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
    include('../module/dbconnect.php');
    include('../module/navbar.php');
    ?>

    <title>New Bike</title>

</head>

<body>
    <div class="container">
        <h2>Recenser un vélo</h2>
        <form action="check/checkBike.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="bikepicture" class="form-label">Photo du vélo</label>
                <input type="file" class="form-control" id="bikepicture" name="bikepicture">
            </div>

            <div class="mb-3">
                <label for="ebike" class="form-label">E bike ? </label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ebike" id="yesEbike" value="1">
                    <label class="form-check-label" for="yesEbike">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ebike" id="noEbike" value="0">
                    <label class="form-check-label" for="noEbike">Non</label>
                </div>

            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Couleur</label>
                <input type="text" class="form-control" id="color" name="color">
            </div>

            <div class="mb-3">
                <label for="size" class="form-label">Taille en pouces</label>
                <input type="number" class="form-control" id="size" name="size">
            </div>

            <div class="mb-3">
                <label for="frameNo" class="form-label">Numéro de cadre</label>
                <input type="number" class="form-control" id="frameNo" name="frameNo">
            </div>

            <div class="mb-3">
                <label for="brand-select" class="form-label">Marque du vélo</label>
                <select class="form-select" id="brand-select" name="brand" aria-label="Marque du vélo">
                    <?php
                    $query = mysqli_query($db, "SELECT * FROM t_brand");
                    while ($row = $query->fetch_assoc()) {
                        print '<option value="' . $row['braName'] . '">' . $row['braName'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>
</body>

</html>