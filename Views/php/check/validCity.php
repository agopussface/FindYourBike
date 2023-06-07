<?php
include('../../module/dbconnect.php');
$city = $_GET['city'];
$sql=mysqli_query($db, "UPDATE t_city SET citState ='1' WHERE idCity = '$city'");
$result = mysqli_query($db, $sql);
header('Location: ../cities.php');
?>