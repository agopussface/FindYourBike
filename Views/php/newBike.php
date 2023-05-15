<!DOCTYPE html>
<html>

<head>
    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php
    include('../module/dbconnect.php');
    ?>
</head>

<body>
    <div class="container">
        <form action="check/checkBike.php" method="POST">

            <div class="mb-3">
                <label for="bike-picture" class="form-label">Photo du vélo</label>
                <input type="file" class="form-control" id="bike-picture" name="bikepicture">
            </div>

            <fieldset class="mb-3">
                <legend class="form-label">EBike ?</legend>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="yesEbike" name="ebike" value="yes">
                    <label class="form-check-label" for="yesEbike">Oui</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="noEbike" name="ebike" value="no">
                    <label class="form-check-label" for="noEbike">Non</label>
                </div>
            </fieldset>

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
                        echo '<option value="' . $row['braName'] . '">' . $row['braName'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>
</body>

</html>
