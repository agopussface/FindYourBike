<?php
include('../../module/dbconnect.php');
session_start(); // Démarre une session PHP pour gérer les variables de session
$error = 0; // Variable pour compter les erreurs éventuelles

// Récupère et traite les informations du formulaire en POST

// Username
if (isset($_POST['consUsername'])) { // Vérifie si le champ "consUsername" a été envoyé via POST
    if (!empty($_POST['consUsername'])) { // Vérifie si le champ "consUsername" n'est pas vide
        $username = mysqli_real_escape_string($db, ($_POST['consUsername'])); // Échappe les caractères spéciaux et assigne la valeur à la variable $username
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Password
if (isset($_POST['consPassword'])) { // Vérifie si le champ "consPassword" a été envoyé via POST
    if (!empty($_POST['consPassword'])) { // Vérifie si le champ "consPassword" n'est pas vide
        $password = mysqli_real_escape_string($db, ($_POST['consPassword'])); // Échappe les caractères spéciaux et assigne la valeur à la variable $password
    } else {
        $error++; // Incrémente $error pour indiquer une erreur
    }
} else {
    $error++; // Incrémente $error pour indiquer une erreur
}

// Requête SQL en fonction de l'entrée de l'utilisateur pour le nom d'utilisateur
$query = mysqli_query($db, "SELECT * FROM t_consultacc WHERE coaUsername='$username'");

while ($row = $query->fetch_assoc()) { // Parcours les résultats de la requête
    $pwd = $row['coaPassword']; // Récupère le mot de passe correspondant à l'entrée de l'utilisateur
}

if ($password !== $pwd) { // Vérifie si le mot de passe entré ne correspond pas au mot de passe récupéré
    $error++; // Incrémente $error pour indiquer une erreur
}

if ($error >= 1) { // Vérifie s'il y a eu au moins une erreur
    header('Location: ../login.php'); // Redirige vers la page de connexion en cas d'erreur
} else {
    $_SESSION['logged'] = true; // Définit la variable de session 'logged' à true pour indiquer que l'utilisateur est connecté
    $_SESSION['username'] = $username; // Stocke le nom d'utilisateur dans la variable de session 'username'
    $_SESSION['entr'] = false;
    header('Location: ../home.php'); // Redirige vers la page d'accueil en cas de succès
}
?>