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
      $startYear = $_POST['option'];
    }
  }
  ?>


  <?php
  $currentYear = date('Y-01-01');
  $yearBefore = date('Y-m-d', strtotime('-1 years', strtotime($currentYear)));
  $yearAfter = date('Y-m-d', strtotime('+1 years', strtotime($currentYear)));
  $endOfYear = date('Y-m-d', strtotime('+1 years -1 days', strtotime($startYear)));
  ?>
  <form method="POST">
    <input type="radio" name="option" value="<?php print date('Y-m-d', strtotime('-1 years', strtotime($currentYear))); ?>" onchange="this.form.submit()"> <?php print $yearBefore ?><br>
    <input type="radio" name="option" value="<?php print date('Y-01-01'); ?>" onchange="this.form.submit()"> <?php print $currentYear ?> <br>
    <input type="radio" name="option" value="<?php print date('Y-m-d', strtotime('+1 years', strtotime($currentYear))); ?>" onchange="this.form.submit()"> <?php print $yearAfter ?> <br>
  </form>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        <?php
        $queryBikeOn = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$startYear' AND bikDate < '$endOfYear' AND bikState = 1");
        $bikeOnCount = $queryBikeOn->fetch_row()[0];


        $queryBikeoFF = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$startYear' AND bikDate < '$endOfYear' AND bikState = 0");
        $bikeOffCount = $queryBikeoFF->fetch_row()[0];
        ?>

        ['String', 'Num'],
        ['Vélos trouvés', <?php print $bikeOnCount ?>],
        ['Vélos rendus', <?php print $bikeOffCount ?>],
      ]);

      var options = {
        title: 'My Daily Activities'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
  <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>

</html>