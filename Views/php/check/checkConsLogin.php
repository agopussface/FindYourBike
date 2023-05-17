<?php
session_start();
include('../../module/dbconnect.php');

$error = 0;

// Recupère et traite les infos du formulaire en POST
if (isset($_POST['consUsername'])) {
    if (!empty($_POST['consUsername'])) {
        $username = mysqli_real_escape_string($db, ($_POST['consUsername']));
    } else {
        $error++;
        print 'empty username' . '<br>';
    }
} else {
    $error++;
    print 'not isset username' . '<br>';
}

if (isset($_POST['consPassword'])) {
    if (!empty($_POST['consPassword'])) {
        $password = mysqli_real_escape_string($db, ($_POST['consPassword']));
    }else{
        $error++;
        print 'empty password' . '<br>';
    }
}else{
    $error++;
    print 'not isset password' . '<br>';
}


// Query SQL en fonction de l'entrée username
$query = mysqli_query($db, "SELECT * FROM t_consultacc WHERE coaUsername='$username'");
while ($row = $query->fetch_assoc()) {
    $pwd = $row['coaPassword'];
}

if($password !== $pwd){
    $error++;
    print 'wrong password' . '<br>';
}

if($error >= 1){
    header('Location: ../login.php');
}else{
    $_SESSION['logged'] = true;
    $_SESSION['username'] = $username;
    header('Location: ../home.php');
}
