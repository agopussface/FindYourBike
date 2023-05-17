<?php
include('../../module/dbconnect.php');
$error = 0;

// Nom de la commune $cityName
if (isset($_POST['cityName'])) {
    if (!empty($_POST['cityName'])) {
        $cityName = mysqli_real_escape_string($db, $_POST['cityName']);
    } else {
        //$error++;
        print 'empty cityName';
    }
} else {
    //$error++;
    print 'cityName not set';
}

// Logo de la commune $cityLogo
if (isset($_FILES['cityLogo']['name'])) {
    if (!empty($_FILES['cityLogo']['name'])) {
        $tmpname = $_FILES['cityLogo']['tmp_name'];
        $cityLogo = date('YmdHis') . mysqli_real_escape_string($db, $_FILES['cityLogo']['name']);
        $logoDestination = '../../../Files/bikePictures/' . $cityLogo;
    } else {
        //$error++;
        print 'empty logo';
    }
} else {
    //$error++;
    print 'cityLogo not set';
}

// Nom de l'employé communale
if (isset($_POST['accLastname'])) {
    if (!empty($_POST['accLastname'])) {
        $accLastname = mysqli_real_escape_string($db, $_POST['accLastname']);
    } else {
        $error++;
    }
} else {
    $error++;
}

// Prénom de l'employé
if (isset($_POST['accFirstname'])) {
    if (!empty($_POST['accFirstname'])) {
        $accFirstname = mysqli_real_escape_string($db, $_POST['accFirstname']);
    } else {
        $error++;
    }
} else {
    $error++;
}


// Role de l'employé
if (isset($_POST['accRole'])) {
    if (!empty($_POST['accRole'])) {
        $accRole = mysqli_real_escape_string($db, $_POST['accRole']);
    } else {
        $error++;
    }
} else {
    $error++;
}


// Adresse postale
if (isset($_POST['accAddress'])) {
    if (!empty($_POST['accAddress'])) {
        $accAddress = mysqli_real_escape_string($db, $_POST['accAddress']);
    } else {
        $error++;
    }
} else {
    $error++;
}

// EMail 
if (isset($_POST['accEmail'])) {
    if (!empty($_POST['accEmail'])) {
        $accEmail = mysqli_real_escape_string($db, $_POST['accEmail']);
    } else {
        $error++;
    }
} else {
    $error++;
}

// Numéro de téléphone
if (isset($_POST['accPhone'])) {
    if (!empty($_POST['accPhone'])) {
        $accPhone = mysqli_real_escape_string($db, $_POST['accPhone']);
    } else {
        $error++;
    }
} else {
    $error++;
}

// Username
$accUsername =  'fyb' . strtolower($cityName);

// Mot de passe
if (isset($_POST['accPassword'])) {
    if (!empty($_POST['accPassword'])) {
        $password = mysqli_real_escape_string($db, $_POST['accPassword']);
        $accPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $error++;
    }
} else {
    $error++;
}


if ($error == 0) {
    move_uploaded_file($tmpname, $logoDestination);
    $sql = "INSERT INTO t_city (citName, citLogo, citAccUsername,  citAccPassword, citAccLastName, citAccFirstName, citAccRole, citAccAddress, citAccEmail, citAccPhone) VALUES ('$cityName', '$cityLogo', '$accUsername', '$accPassword', '$accLastname', '$accFirstname', '$accRole', '$accAddress', '$accEmail', '$accPhone')";
    mysqli_query($db, $sql);

} else{
    print $error;
}
