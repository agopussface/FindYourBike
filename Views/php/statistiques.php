<?php
include('../module/dbconnect.php');

$currentDate = date('Y-m-d'); // Obtenez la date actuelle

$startDate = date('Y-01-01');

$endDate = date('Y-12-d', strtotime('+0 years', strtotime($currentDate)));

$currentDate = $startDate;

while ($currentDate <= $endDate) {
  $nextDate = date('Y-m-d', strtotime('+3 months', strtotime($currentDate)));

  // Graphique

  $currentDate = $nextDate;
}
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Callback that draws a pie chart.
      function drawChart(data, options, chartDivId) {
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn('string', 'Topping');
        dataTable.addColumn('number', 'Slices');
        dataTable.addRows(data);

        var chart = new google.visualization.PieChart(document.getElementById(chartDivId));
        chart.draw(dataTable, options);
      }

      // Function to generate charts
      function generateCharts() {
        var trim1Data = [
          ['Mushrooms', 1],
          ['Onions', 1],
          ['Olives', 2],
          ['Zucchini', 2],
          ['Pepperoni', 1]
        ];
        var trim1Options = {
          title: 'trim1',
          width: 400,
          height: 300
        };
        drawChart(trim1Data, trim1Options, 'trim1');

        var trim2Data = [
          ['Mushrooms', 2],
          ['Onions', 2],
          ['Olives', 2],
          ['Zucchini', 0],
          ['Pepperoni', 3]
        ];
        var trim2Options = {
          title: 'trim2',
          width: 400,
          height: 300
        };
        drawChart(trim2Data, trim2Options, 'trim2');
        var trim3Data = [
          ['Mushrooms', 2],
          ['Onions', 2],
          ['Olives', 2],
          ['Zucchini', 0],
          ['Pepperoni', 3]
        ];
        var trim3Options = {
          title: 'trim4',
          width: 400,
          height: 300
        };
        drawChart(trim3Data, trim2Options, 'trim3');
      

      var trim4Data = [
          ['Mushrooms', 2],
          ['Onions', 2],
          ['Olives', 2],
          ['Zucchini', 0],
          ['Pepperoni', 3]
        ];
        var trim4Options = {
          title: 'trim4',
          width: 400,
          height: 300
        };
        drawChart(trim4Data, trim4Options, 'trim4');
      }

      google.charts.setOnLoadCallback(generateCharts);

    </script>
  </head>
  <body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="trim1" style="border: 1px solid #ccc"></div></td>
        <td><div id="trim2" style="border: 1px solid #ccc"></div></td>
        <td><div id="trim3" style="border: 1px solid #ccc"></div></td>
        <td><div id="trim4" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html>


