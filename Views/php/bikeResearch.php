<!DOCTYPE html>
<html>

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8" />
    <meta name="description" content="Application Web de gestion de vélo perdu puis retrouvé. TPI-2023" />
    <meta name="author" content="Cyril Narducci" />

    <!-- Inclusion des modules de l'application -->
    <?php
    include('../module/islogged.php');
    include('../module/navbar.php');
    include('../module/dbconnect.php');
    ?>

    <!-- Titre de la page -->
    <title>Home</title>
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>Rechercher un vélo</h1>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <form method="POST" action="check/checkResearch.php">
            <div class="row">
                <div class="col">
                    <label for="brand" class="form-label">Marque du vélo</label>
                    <select class="form-select" id="brand" name="brand" aria-label="Marque du vélo">
                        <option value="">--Please choose an option--
                            <?php
                            $query = mysqli_query($db, "SELECT * FROM t_brand");
                            while ($row = $query->fetch_assoc()) {
                                print '<option value="' . $row['braName'] . '">' . $row['braName'] . '</option>';
                            }
                            ?>
                    </select>
                </div>
                <div class="col">
                    <label for="frameNo" class="form-label">Numéro de cadre</label>
                    <input class="form-control" type="number" name="frameNo">
                </div>
                <div class="col">
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
                <div class="col">
                    <label for="color" class="form-label">Couleur</label>
                    <input class="form-control" type="text" name="color">
                </div>
                <div class="col">
                    <label for="size" class="form-label">Taille (en pouces)</label>
                    <input class="form-control" type="number" name="size">

                </div>
                <div class="col">
                    <label class="form-label" for="date">Date</label>
                    <input class="form-control" type="date" id="date" name="date">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary mt-3" type="submit">Rechercher</button>
                </div>
            </div>
    </div>

    </form>

    <?php
    if (isset($_GET['frameNo'])) {
        $frameNo = $_GET['frameNo'];
        $frameQuery = mysqli_query($db, "SELECT * FROM t_bike WHERE bikFrameNo ='$frameNo' AND bikState = 1;");
        $row = $frameQuery->fetch_assoc();
    ?>
        <div class="container">
            <div class="row ">
                <div class="card col-md-3 mt-3">
                    <img src="../../Files/bikePictures/<?php print $row['bikPicture'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php print $row['idBrand'] ?></h5>
                        <p class="card-text"><?php print 'ID: ' . $row['idBike'] ?></p>
                        <p class="card-text"><?php print 'Ebike: ' . $row['bikEBike'] ?></p>
                        <p class="card-text"><?php print 'Couleur: ' . $row['bikColor'] ?></p>
                        <p class="card-text"><?php print 'Taille: ' . $row['bikSize'] ?></p>
                        <p class="card-text"><?php print 'Numéro de cadre: ' . $row['bikFrameNo'] ?></p>
                        <p class="card-text"><?php print 'Date: ' . $row['bikDate'] ?></p>
                        <p class="card-text"><?php print 'Commune: ' . $row['idCity'] ?></p>
                        <a href="check/bikeState.php?id=<?php print $row['idBike'] ?>" class="btn btn-primary">Rendre</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        if (isset($_SESSION['bikeResults'])) {
            $bikeResults = $_SESSION['bikeResults'];
        ?>
            <div class="container">
                <div class="row ">
                    <?php
                    $i = 0;

                    foreach ($bikeResults as $row) {
                    ?>

                        <div class="card col-md-3 mt-3">
                            <img src="../../Files/bikePictures/<?php print $row['bikPicture'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php print $row['idBrand'] ?></h5>
                                <p class="card-text"><?php print 'ID: ' . $row['idBike'] ?></p>
                                <p class="card-text"><?php print 'Ebike: ' . $row['bikEbike'] ?></p>
                                <p class="card-text"><?php print 'Couleur: ' . $row['bikColor'] ?></p>
                                <p class="card-text"><?php print 'Taille: ' . $row['bikSize'] ?></p>
                                <p class="card-text"><?php print 'Numéro de cadre: ' . $row['bikFrameNo'] ?></p>
                                <p class="card-text"><?php print 'Date: ' . $row['bikDate'] ?></p>
                                <p class="card-text"><?php print 'Commune: ' . $row['idCity'] ?></p>
                                <a href="check/bikeState.php?id=<?php print $row['idBike'] ?>" class="btn btn-primary">Rendre</a>
                            </div>
                        </div>

                    <?php
                        $i++;

                        if ($i == 4) {
                            break;
                        }
                    }
                    ?>

                </div>
            </div>
    <?php
            unset($_SESSION['bikeResults']);
        } else {
            print "Aucun résultat de vélo trouvé.";
        }
    }

    ?>

</body>

</html>