<?php
include ('../module/dbconnect.php');
$currentDate = date('Y-m-d'); // Obtenez la date actuelle


// Calculer la startDate en soustrayant 5 années à partir de la currentDate
$startDate = date('Y-01-01', strtotime('-1 year', strtotime($currentDate)));

$endDate = date('Y-12-31', strtotime('+5 years', strtotime($currentDate)));

$currentDate = $startDate;

while ($currentDate <= $endDate) {
    $nextDate = date('Y-m-d', strtotime('+3 months', strtotime($currentDate)));

    $startMonth = date('F', strtotime($currentDate)); // Obtenez le nom complet du mois
    $endMonth = date('F', strtotime('-1 months', strtotime($nextDate)));
    $year = date('Y', strtotime($currentDate)); // Obtenez le nom complet de l'année

    echo $startMonth . '-' . $endMonth . ' ' . $year . "<br>"; // Afficher le mois associé à la currentDate

    $query = mysqli_query($db, "SELECT * FROM t_bike WHERE bikDate >= '$currentDate' AND bikDate < '$nextDate'");

    while ($row = mysqli_fetch_assoc($query)) {
        // Afficher les données de chaque ligne
        echo "ID : " . $row['bikFrameNo'] . "<br>";

    }

    $currentDate = $nextDate;

    print '<br>';
}
?>
