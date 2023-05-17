<!-- Definit si une session est ouverte. Si non redirection a la page de login -->
<?php
session_start();
    if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
        header('Location: login.php');
        exit;
    }
?>