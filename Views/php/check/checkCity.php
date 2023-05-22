<?php
include('../../module/dbconnect.php'); // Inclut le fichier de connexion à la base de données
$error = 0; // Variable pour compter les erreurs éventuelles

// Récupère et traite les informations du formulaire en POST

// Nom de la commune $cityName
if (isset($_POST['cityName'])) { // Vérifie si le champ "cityName" a été envoyé via POST
    if (!empty($_POST['cityName'])) { // Vérifie si le champ "cityName" n'est pas vide
        $cityName = mysqli_real_escape_string($db, $_POST['cityName']); // Échappe les caractères spéciaux et assigne la valeur à la variable
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Logo de la commune $cityLogo
if (isset($_FILES['cityLogo']['name'])) { // Vérifie si le champ "cityLogo" a été envoyé via POST
    if (!empty($_FILES['cityLogo']['name'])) { // Vérifie si le champ "cityLogo" n'est pas vide
        $tmpname = $_FILES['cityLogo']['tmp_name'];
        $cityLogo = date('YmdHis') . mysqli_real_escape_string($db, $_FILES['cityLogo']['name']); // Échappe les caractères spéciaux et assigne la valeur à la variable $cityLogo
        $logoDestination = '../../../Files/cityLogo/' . $cityLogo;
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Nom de l'employé communale
if (isset($_POST['accLastname'])) { // Vérifie si le champ "accLastname" a été envoyé via POST
    if (!empty($_POST['accLastname'])) { // Vérifie si le champ "accLastname" n'est pas vide
        $accLastname = mysqli_real_escape_string($db, $_POST['accLastname']); // Échappe les caractères spéciaux et assigne la valeur à la variable $accLastname
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Prénom de l'employé
if (isset($_POST['accFirstname'])) { // Vérifie si le champ "accFirstname" a été envoyé via POST
    if (!empty($_POST['accFirstname'])) { // Vérifie si le champ "accFirstname" n'est pas vide
        $accFirstname = mysqli_real_escape_string($db, $_POST['accFirstname']); // Échappe les caractères spéciaux et assigne la valeur à la variable $accFirstname
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Role de l'employé
if (isset($_POST['accRole'])) { // Vérifie si le champ "accRole" a été envoyé via POST
    if (!empty($_POST['accRole'])) { // Vérifie si le champ "accRole" n'est pas vide
        $accRole = mysqli_real_escape_string($db, $_POST['accRole']); // Échappe les caractères spéciaux et assigne la valeur à la variable $accRole
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Adresse postale
if (isset($_POST['accAddress'])) { // Vérifie si le champ "accAddress" a été envoyé via POST
    if (!empty($_POST['accAddress'])) { // Vérifie si le champ "accAddress" n'est pas vide
        $accAddress = mysqli_real_escape_string($db, $_POST['accAddress']); // Échappe les caractères spéciaux et assigne la valeur à la variable $accAddress
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// EMail 
if (isset($_POST['accEmail'])) { // Vérifie si le champ "accEmail" a été envoyé via POST
    if (!empty($_POST['accEmail'])) { // Vérifie si le champ "accEmail" n'est pas vide
        $accEmail = mysqli_real_escape_string($db, $_POST['accEmail']); // Échappe les caractères spéciaux et assigne la valeur à la variable $accEmail
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Numéro de téléphone
if (isset($_POST['accPhone'])) { // Vérifie si le champ "accPhone" a été envoyé via POST
    if (!empty($_POST['accPhone'])) { // Vérifie si le champ "accPhone" n'est pas vide
        $accPhone = mysqli_real_escape_string($db, $_POST['accPhone']); // Échappe les caractères spéciaux et assigne la valeur à la variable $accPhone
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Username
$accUsername =  'fyb' . strtolower($cityName); // Génère un nom d'utilisateur en ajoutant 'fyb' à la version en minuscules du nom de la ville

// Mot de passe
if (isset($_POST['accPassword'])) { // Vérifie si le champ "accPassword" a été envoyé via POST
    if (!empty($_POST['accPassword'])) { // Vérifie si le champ "accPassword" n'est pas vide
        $password = mysqli_real_escape_string($db, $_POST['accPassword']); // Échappe les caractères spéciaux et assigne la valeur à la variable $password
        $accPassword = password_hash($password, PASSWORD_DEFAULT); // Hash la valeur de $password et assigne ce hash à la variable $accPassword
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

if ($error >= 1) { // Vérifie s'il y a eu au moins une erreur
    header('Location: ../newCity.php'); // Redirige vers la page du formulaire en cas d'erreur
} else {
    move_uploaded_file($tmpname, $logoDestination); // Déplace le fichier téléchargé vers l'emplacement de destination spécifié
    // Prépare la requête SQL pour insérer les valeurs dans la table t_city
    $sql = "INSERT INTO t_city (citName, citLogo, citAccUsername,  citAccPassword, citAccLastName, citAccFirstName, citAccRole, citAccAddress, citAccEmail, citAccPhone) VALUES ('$cityName', '$cityLogo', '$accUsername', '$accPassword', '$accLastname', '$accFirstname', '$accRole', '$accAddress', '$accEmail', '$accPhone')";
    $result = mysqli_query($db, $sql);
    
    if ($result) {
        // La requête s'est exécutée avec succès
        print "Insertion réussie !";
        header('Location: ../login.php');
    } else {
        // Une erreur s'est produite
        print "Erreur lors de l'insertion : " . mysqli_error($db);
    }
}
