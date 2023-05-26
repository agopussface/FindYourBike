<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    include('../module/dbconnect.php');
    // Variable PHP initiale
    $startDate = '';

    // Vérifier si une nouvelle valeur a été envoyée via le formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['option'])) {
            // Mettre à jour la variable PHP avec la nouvelle valeur
            $startDate = $_POST['option'];
        }
    }
    ?>

    <form method="POST">
        <input type="radio" name="option" value="<?php echo date('Y-01-01'); ?>" onchange="this.form.submit()"> Jan-Mar<br>
        <input type="radio" name="option" value="<?php echo date('Y-04-01'); ?>" onchange="this.form.submit()"> Avr-Juin<br>
        <input type="radio" name="option" value="<?php echo date('Y-07-01'); ?>" onchange="this.form.submit()"> Jui-Sep<br>
        <input type="radio" name="option" value="<?php echo date('Y-10-01'); ?>" onchange="this.form.submit()"> Oct-Dec<br>
    </form>
    <?php
    $nextDate = date('Y-m-d', strtotime('+3 months', strtotime($startDate)));
    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([

                <?php
                $queryBikeOn = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$startDate' AND bikDate < '$nextDate' AND bikState = 1");
                $bikeOnCount = $queryBikeOn->fetch_row()[0];

                $queryBikeoFF = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$startDate' AND bikDate < '$nextDate' AND bikState = 0");
                $bikeOffCount = $queryBikeoFF->fetch_row()[0];
                ?>

                ['String', 'Num'],
                ['Vélos trouvés', <?php print $bikeOnCount ?>],
                ['Vélos rendus', <?php print $bikeOffCount ?>],

            ]);


            <?php
            $startMonth = date('F', strtotime($startDate));
            $endMonth = date('F', strtotime('-1 months', strtotime($nextDate)));
            ?>
            var options = {
                title: '<?php print $startMonth . ' - ' . $endMonth ?>'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>

    <div id="piechart" style="width: 900px; height: 500px;"></div>

</body>

</html>