<?php
include('../../module/dbconnect.php');

$error = 0;

$ebike;

// Photo du vélo
if (isset($_POST['bikepicture']['name'])) {
    print 'oui';
    if (!empty($_FILES['bikepicture']['name'])) {
        print 'pas vide';
    } else {
        $error++;
    }
} else {
    $error++;
}



// Couleur
if (isset($_POST['color'])) {
    if (!empty($_POST['color'])) {
        $color = mysqli_real_escape_string($db, ($_POST['color']));
    } else {
        $error++;
    }
} else {
    $error++;
}

// Taille
if (isset($_POST['size'])) {
    if (!empty($_POST['size'])) {
        $size = mysqli_real_escape_string($db, ($_POST['size']));
    } else {
        $error++;
    }
} else {
    $error++;
}

// Numéro de cadre
if (isset($_POST['frameNo'])) {
    if (!empty($_POST['frameNo'])) {
        $frameNo = mysqli_real_escape_string($db, $_POST['frameNo']);
        $query = mysqli_query($db, "SELECT COUNT(*) FROM t_bike WHERE bikFrameNo = '$frameNo'");
        if ($query) {
            $count = mysqli_fetch_row($query)[0];
            if ($count >= 1) {
                $error++;
            }
        } else {
            // Ne rien faire...
        }
    } else {
        $error++;
    }
} else {
    $error++;
}

// Marque
if (isset($_POST['brand'])) {
    if (!empty($_POST['brand'])) {
        $bran = mysqli_real_escape_string($db, $_POST['brand']); // utilisation de   pour protéger la chaîne
        $query = "SELECT idBrand FROM t_brand WHERE braName='$bran'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $brand = $row['idBrand'];
    } else {
        $error++;
    }
} else {
    $error++;
}
 
$entryacc;

print $color . '<br>';
print $size . '<br>';
print $frameNo . '<br>';
print $brand . '<br>';

print $error . '<br>';
