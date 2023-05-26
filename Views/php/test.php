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
  ?>

  <!-- Titre de la page -->
  <title>Statistiques</title>

</head>

<body>

  <!-- Initiation du graph -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    // Load Charts and the corechart package.
    google.charts.load('current', {
      'packages': ['corechart']
    });

    // Draw the pie chart for Sarah's pizza when Charts is loaded.
    google.charts.setOnLoadCallback(drawSarahChart);

    // Draw the pie chart for the Anthony's pizza when Charts is loaded.
    google.charts.setOnLoadCallback(drawAnthonyChart);

    // Callback that draws the pie chart for Sarah's pizza.
    function drawSarahChart() {

      // Create the data table for Sarah's pizza.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
        ['Mushrooms', 1],
        ['Onions', 1],
        ['Olives', 2],
        ['Zucchini', 2],
        ['Pepperoni', 1]
      ]);

      // Set options for Sarah's pie chart.
      var options = {
        title: 'How Much Pizza Sarah Ate Last Night',
        width: 400,
        height: 300
      };

      // Instantiate and draw the chart for Sarah's pizza.
      var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
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
      <div class="col" id="Sarah_chart_div">
      </div>
      <div class="col" id="Anthony_chart_div">
        Graph Annuel
      </div>
    </div>

    <div class="row">
      <div class="col">
        <p>Lorem ipsum dolor sit amet. Ut dolore sunt 33 voluptas dolorem ea mollitia tenetur in perspiciatis beatae id ipsa voluptatem. Hic beatae sunt et cupiditate assumenda rem recusandae eveniet aut eligendi expedita aut laborum aperiam sed esse aliquam et ipsum cumque. Ut cumque ratione et nesciunt inventore et nihil galisum est maiores veritatis et soluta esse cum quia quos. Est dolor molestias quo iure laudantium sit alias dolore aut possimus quia rem molestias autem aut consequatur voluptate. Eos labore architecto in accusamus nobis sit saepe error qui omnis delectus et voluptatibus mollitia ut dolorum itaque. Vel saepe eveniet aut commodi repellendus et eligendi illo ut officia dolorem et nemo voluptatibus. Hic dolorem omnis aut porro adipisci qui accusantium incidunt sed galisum nulla ut rerum totam. </p>
        <p>Et nobis maxime eos repudiandae quibusdam vel ratione voluptates et aliquid consectetur. 33 nulla eaque ea quas porro est similique itaque est illum fugit. Ut corrupti modi vel numquam quasi in rerum maxime aut earum consequatur et labore assumenda rem culpa voluptas. Sed libero facilis sit adipisci molestias et provident aperiam aut voluptas vitae sed nulla ipsum sit soluta delectus qui eaque necessitatibus. Ad sapiente voluptatem sed quia eveniet et quia laudantium qui aliquam saepe. Qui laborum dolores non voluptatem corrupti ut deserunt illo ut iusto inventore. Id atque rerum aut atque quisquam sed perferendis omnis in fugiat velit. Hic rerum quia id atque distinctio sit aspernatur laudantium eos consequatur facilis non tenetur saepe sed dicta quos. Non accusamus sapiente ut dolor voluptatem sed recusandae voluptates ut obcaecati sunt. </p>

      </div>
      <div class="col">
        <p>Lorem ipsum dolor sit amet. Ut dolore sunt 33 voluptas dolorem ea mollitia tenetur in perspiciatis beatae id ipsa voluptatem. Hic beatae sunt et cupiditate assumenda rem recusandae eveniet aut eligendi expedita aut laborum aperiam sed esse aliquam et ipsum cumque. Ut cumque ratione et nesciunt inventore et nihil galisum est maiores veritatis et soluta esse cum quia quos. Est dolor molestias quo iure laudantium sit alias dolore aut possimus quia rem molestias autem aut consequatur voluptate. Eos labore architecto in accusamus nobis sit saepe error qui omnis delectus et voluptatibus mollitia ut dolorum itaque. Vel saepe eveniet aut commodi repellendus et eligendi illo ut officia dolorem et nemo voluptatibus. Hic dolorem omnis aut porro adipisci qui accusantium incidunt sed galisum nulla ut rerum totam. </p>
        <p>Et nobis maxime eos repudiandae quibusdam vel ratione voluptates et aliquid consectetur. 33 nulla eaque ea quas porro est similique itaque est illum fugit. Ut corrupti modi vel numquam quasi in rerum maxime aut earum consequatur et labore assumenda rem culpa voluptas. Sed libero facilis sit adipisci molestias et provident aperiam aut voluptas vitae sed nulla ipsum sit soluta delectus qui eaque necessitatibus. Ad sapiente voluptatem sed quia eveniet et quia laudantium qui aliquam saepe. Qui laborum dolores non voluptatem corrupti ut deserunt illo ut iusto inventore. Id atque rerum aut atque quisquam sed perferendis omnis in fugiat velit. Hic rerum quia id atque distinctio sit aspernatur laudantium eos consequatur facilis non tenetur saepe sed dicta quos. Non accusamus sapiente ut dolor voluptatem sed recusandae voluptates ut obcaecati sunt. </p>

      </div>
    </div>
  </div>
</body>