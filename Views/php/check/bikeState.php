<?php
include('../../module/dbconnect.php');
$id = $_GET['id'];
$sql=mysqli_query($db, "UPDATE t_bike SET bikState ='0' WHERE idBike = '$id'");
$result = mysqli_query($db, $sql);
header('Location: ../home.php');
?>