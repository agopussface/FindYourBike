<?php
session_start();
include('../../module/dbconnect.php');


// Recupère les infos du formulaire en POST et les entre dans une variable
$username = $_POST['consUsername'];
$password = $_POST['consPassword'];

// Query SQL en fonction de l'entrée username
$query = mysqli_query($db, "SELECT * FROM t_consultacc WHERE coaUsername='$username'");
while ($row = $query->fetch_assoc()) {
    $pwd = $row['coaPassword'];
}

// Check si le password entré dans le formulaire ($password) correspond au password de la db ($pwd)
if ($password == $pwd) {
    $_SESSION['logged'] = true;
    $_SESSION['username'] = $username;
    header('Location: ../home.php'); // Redirection à la page home si validé

} else {
    header('Location: ../login.php'); // Redirection vers la page de login si pas validé
}
