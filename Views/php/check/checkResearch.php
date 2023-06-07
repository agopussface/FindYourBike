<?php
// Inclusion du module de connexion à la base de donnée
include('../../module/dbconnect.php');

if (isset($_POST['frameNo'])) { // Verifie si l'input frameNo existe
    if (!empty($_POST['frameNo'])) { // Verifi si l'input frameNo est non vide
        $frameNo = mysqli_real_escape_string($db, $_POST['frameNo']);
        header("Location: ../bikeResearch.php?frameNo=$frameNo");
        exit(); // quitte le script
    } else { // Si frameNo vide

        // Assignation des autres critères de recherches
        $bran = $_POST['brand'];
        $brandQuery = mysqli_query($db, "SELECT idBrand FROM t_brand WHERE braName = '$bran'");
        $brand = $brandQuery->fetch_row()[0];

        $ebike = $_POST['ebike'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $date = $_POST['date'];


        // Defini l'id min de la table t_bike
        $minIdQuery = mysqli_query($db, "SELECT Min(idBike) FROM t_bike");
        $minId = $minIdQuery->fetch_row()[0];

        // Defini l'id max de la table t_bike
        $maxIdQuery = mysqli_query($db, "SELECT Max(idBike) FROM t_bike");
        $maxId = $maxIdQuery->fetch_row()[0];

        $order = array(); // Ouvre un nouveau tableau pour le classement des résultats

        $i = $minId;
        
        // Boucle qui va checker ligne par ligne les colonnes qui match avec les critères de recherches
        while ($i <= $maxId) {

            // Récupère toutes les infos de la ligne min a max de la db
            $query = mysqli_query($db, "SELECT * FROM t_bike WHERE idBike = '$i' AND bikState = 1;");

            $match = 0; // Compte les critères qui match

            while ($row = $query->fetch_assoc()) {
                // Verification des match critères = infos de la db
                if ($row['idBrand'] == $brand) {
                    $match++;
                }
                if ($row['bikEBike'] == $ebike) {
                    $match++;
                }
                if ($row['bikColor'] == $color) {
                    $match++;
                }
                if ($row['bikSize'] == $size) {
                    $match++;
                }
                if ($row['bikDate'] == $date) {
                    $match++;
                }
            }

            $order[$i] = $match; // Ajoute une ligne dans le tableau order
            $i++;
        }

        arsort($order); // Trie les valeures du tableau order du plus petit au plus grand


        $bikeResults = array(); // Crée un nouveau tableau 

        // Boucle qui va récuperer les valeurs de la db dans l'ordre des résultats
        foreach ($order as $idBike => $score) {
            $query = mysqli_query($db, "SELECT * FROM t_bike WHERE idBike = '$idBike' AND bikState = 1;");
            $row = $query->fetch_assoc();
            $bikeResults[] = array(
                'idBike' => $row['idBike'],
                'bikPicture' => $row['bikPicture'],
                'bikEbike' => $row['bikEBike'],
                'bikColor' => $row['bikColor'],
                'bikSize' => $row['bikSize'],
                'bikFrameNo' => $row['bikFrameNo'],
                'bikState' => $row['bikState'],
                'bikDate' => $row['bikDate'],
                'idBrand' => $row['idBrand'],
                'idCity' => $row['idCity'],
                'score' => $score
            );
        }

        // ouvre la session pour retourner les valezrs du dernier tableau dans une variable de session
        session_start();
        $_SESSION['bikeResults'] = $bikeResults;
        header("Location: ../bikeResearch.php");
    }
}
