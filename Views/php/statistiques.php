<!DOCTYPE html>
<html lang="FR">

<head>

  <!-- Meta tags -->
  <meta charset="UTF-8" />
  <meta name="description" content="Application Web de gestion de vélo perdu puis retrouvé. TPI-2023" />
  <meta name="author" content="Cyril Narducci" />

  <!-- Inclusion des modules de l'application -->
  <?php
  include('../module/islogged.php');
  include('../module/navbar.html');
  include('../module/dbconnect.php');
  ?>

  <!-- Titre de la page -->
  <title>Statistiques</title>

</head>

<body>
  <?php

  ?>
  <!-- Initiation du graph -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // Load Charts and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });

    // Draw the pie chart for Sarah's pizza when Charts is loaded.
    google.charts.setOnLoadCallback(drawTrimChart);

    // Draw the pie chart for the Anthony's pizza when Charts is loaded.
    google.charts.setOnLoadCallback(drawAnthonyChart);

    // Callback that draws the pie chart for Sarah's pizza.
    function drawTrimChart() {

      <?php
      // Variable PHP initiale
      $startDate = '';

      // Vérifier si une nouvelle valeur a été envoyée via le formulaire
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['option'])) {
          // Mettre à jour la variable PHP avec la nouvelle valeur
          $startDate = $_POST['option'];
        }
      }

      $nextDate = date('Y-m-d', strtotime('+3 months', strtotime($startDate)));

      $queryBikeOn = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$startDate' AND bikDate < '$nextDate' AND bikState = 1");
      $bikeOnCount = $queryBikeOn->fetch_row()[0];

      $queryBikeoFF = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$startDate' AND bikDate < '$nextDate' AND bikState = 0");
      $bikeOffCount = $queryBikeoFF->fetch_row()[0];
      ?>

      // Create the data table for Sarah's pizza.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'String');
      data.addColumn('number', 'Num');
      data.addRows([
        ['Vélos trouvés', <?php echo $bikeOnCount; ?>],
        ['Vélos rendus', <?php echo $bikeOffCount; ?>]
      ]);
      <?php
      $startMonth = date('F', strtotime($startDate));
      $endMonth = date('F', strtotime('-1 months', strtotime($nextDate)));
      ?>

      // Set options for Sarah's pie chart.
      var options = {
        title: '<?php print $startMonth . ' - ' . $endMonth; ?>',
        width: 400,
        height: 300
      };

      // Instantiate and draw the chart for Sarah's pizza.
      var chart = new google.visualization.PieChart(document.getElementById('trimChart'));
      chart.draw(data, options);
    }

    // Callback that draws the pie chart for Anthony's pizza.
    function drawAnthonyChart() {

      // Create the data table for Anthony's pizza.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
        ['Mushrooms', 2],
        ['Onions', 2],
        ['Olives', 2],
        ['Zucchini', 0],
        ['Pepperoni', 3]
      ]);

      // Set options for Anthony's pie chart.
      var options = {
        title: 'How Much Pizza Anthony Ate Last Night',
        width: 400,
        height: 300
      };

      // Instantiate and draw the chart for Anthony's pizza.
      var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
      chart.draw(data, options);
    }
  </script>
  <!-- Fin de l'initiation -->


  <div class="container text-center">
    <div class="row">
      <div class="col" id="trimChart">
      </div>
      <div class="col" id="Anthony_chart_div">
        Graph Annuel
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="row">
          <form method="POST">
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-outline-primary">
                <input type="radio" name="option" value="<?php echo date('Y-01-01'); ?>" onchange="this.form.submit()"> Jan-Mar
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="option" value="<?php echo date('Y-04-01'); ?>" onchange="this.form.submit()"> Avr-Juin
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="option" value="<?php echo date('Y-07-01'); ?>" onchange="this.form.submit()"> Jui-Sep
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="option" value="<?php echo date('Y-10-01'); ?>" onchange="this.form.submit()"> Oct-Dec
              </label>
            </div>
          </form>
        </div>
      </div>
      <div class="col">

      </div>
    </div>
  </div>
</body>

</html>