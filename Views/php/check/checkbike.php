<?php
session_start();
include('../../module/dbconnect.php'); // Inclut le fichier de connexion à la base de données
$error = 0; // Variable pour compter les erreurs éventuelles

$ebike;

// Photo du vélo $bikePicture
if (isset($_FILES['bikepicture']['name'])) { // Vérifie si le champ "bikepicture" a été envoyé via POST
    if (!empty($_FILES['bikepicture']['name'])) { // Vérifie si le champ "bikepicture" n'est pas vide
        $tmpname = $_FILES['bikepicture']['tmp_name'];
        $bikePicture = date('YmdHis') . mysqli_real_escape_string($db, $_FILES['bikepicture']['name']);
        $picDestination = '../../../Files/bikePictures/' . $bikePicture;
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Couleur du vélo $color
if (isset($_POST['ebike'])) { // Vérifie si le champ "ebike" a été envoyé via POST
    if (!empty($_POST['ebike'])) { // Vérifie si le champ "ebike" n'est pas vide
        $ebike = mysqli_real_escape_string($db, ($_POST['ebike'])); // Échappe les caractères spéciaux et assigne la valeur à la variable $ebike
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Couleur du vélo $color
if (isset($_POST['color'])) { // Vérifie si le champ "color" a été envoyé via POST
    if (!empty($_POST['color'])) { // Vérifie si le champ "color" n'est pas vide
        $color = mysqli_real_escape_string($db, ($_POST['color'])); // Échappe les caractères spéciaux et assigne la valeur à la variable $color
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Taille
if (isset($_POST['size'])) { // Vérifie si le champ "size" a été envoyé via POST
    if (!empty($_POST['size'])) { // Vérifie si le champ "size" n'est pas vide
        $size = mysqli_real_escape_string($db, ($_POST['size'])); // Échappe les caractères spéciaux et assigne la valeur à la variable $size
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Numéro de cadre
if (isset($_POST['frameNo'])) { // Vérifie si le champ "frameNo" a été envoyé via POST
    if (!empty($_POST['frameNo'])) { // Vérifie si le champ "frameNo" n'est pas vide
        $frameNo = mysqli_real_escape_string($db, $_POST['frameNo']); // Échappe les caractères spéciaux et assigne la valeur à la variable $frameNo
        $query = mysqli_query($db, "SELECT COUNT(*) FROM t_bike WHERE bikFrameNo = '$frameNo'");
        if ($query) {
            $count = mysqli_fetch_row($query)[0];
            if ($count >= 1) {
                $error++; // Incrémente $error pour indiquer une erreur
            }
        } else {
            // Ne rien faire...
        }
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Marque
if (isset($_POST['brand'])) { // Vérifie si le champ "brand" a été envoyé via POST
    if (!empty($_POST['brand'])) { // Vérifie si le champ "brand" n'est pas vide
        $bran = mysqli_real_escape_string($db, $_POST['brand']); // Échappe les caractères spéciaux et assigne la valeur à la variable
        $query = "SELECT idBrand FROM t_brand WHERE braName='$bran'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $brand = $row['idBrand'];
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Ville 
$city = $_SESSION['city']; // Assigne la valeur de la variable de session à $city

if($error >= 1){
    header('Location: ../newBike.php');
} else {
    move_uploaded_file($tmpname, $picDestination);
    $sql = "INSERT INTO t_bike (bikPicture, bikEBike, bikColor, bikSize, bikFrameNo, idBrand, idCity) VALUES ('$bikePicture', '$ebike', '$color', '$size', '$frameNo', '$brand','$city')";
    $result = mysqli_query($db, $sql);
    
    if ($result) {
        // La requête s'est exécutée avec succès
        print "Insertion réussie !";
        header('Location: ../home.php');
    } else {
        // Une erreur s'est produite
        print "Erreur lors de l'insertion : " . mysqli_error($db);
    }
}