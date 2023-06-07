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
  include('../module/navbar.php');
  include('../module/dbconnect.php');
  ?>

  <!-- Appel des librairies javascript : -->
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- JsPdf pour générer et télécharger des pdf depuis le web-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <!-- Html2Canvas pour capturer le résultat d'un code -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
  <!-- Google Charts pour créer des graphiques -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Script JS de la page -->
  <script src="../js/pdf.js"></script>

  <!-- Titre de la page -->
  <title>Statistiques</title>

</head>

<body>
  <!-- Initiation du graph -->
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['corechart']
    });

    // Dessine le graphique des stats trimestrielles
    google.charts.setOnLoadCallback(drawTrimChart);

    // Dessine le graphique des stats annuelles
    google.charts.setOnLoadCallback(drawYearChart);

    // Definition de la fonction du graphique trimestriel
    function drawTrimChart() {

      <?php
      // Varibale qui définit la date sélectionnée
      $trimSelect = '';

      // Vérifier si une nouvelle valeur a été envoyée via les inputs radio
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['optTrim'])) {
          if (!empty($_GET['optTrim'])) {
            // Mettre à jour la variable PHP avec la nouvelle valeur
            $trimSelect = $_GET['optTrim'];
          }
        }
      }

      // Defini la fin du trimestre selectionné
      $nextDate = date('Y-m-d', strtotime('+3 months', strtotime($trimSelect)));

      // Query SQL pour compter le nombre de vélos ajouté durant le trimestre 
      $trimQueryBikeOn = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$trimSelect' AND bikDate < '$nextDate' AND bikState = 1");
      $trimBikeOnCount = $trimQueryBikeOn->fetch_row()[0];

      // Query SQL pour compter le nombre de vélos rendus durant le trimestre 
      $trimQueryBikeoFF = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$trimSelect' AND bikDate < '$nextDate' AND bikState = 0");
      $trimBikeOffCount = $trimQueryBikeoFF->fetch_row()[0];
      ?>

      // Créer la table du graphique trimsestriel
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Vélos');
      data.addColumn('number', 'Nombre');
      data.addRows([
        // Ajouter les valeures des queries dans le tableau
        ['Vélos trouvés', <?php print $trimBikeOnCount; ?>],
        ['Vélos rendus', <?php print $trimBikeOffCount; ?>]
      ]);
      <?php
      // Récupère le nom du mois en texte
      $startMonth = date('F', strtotime($trimSelect));
      $endMonth = date('F', strtotime('-1 months', strtotime($nextDate)));
      ?>

      // Definit les options du graphique trimestriel
      var options = {
        title: '<?php print $startMonth . ' - ' . $endMonth; ?>',
      };

      // Créer une instance pour le graphique trimestriel
      var chart = new google.visualization.PieChart(document.getElementById('trimChart'));
      chart.draw(data, options);
    }

    // Definition de la fonction du graphique annuel
    function drawYearChart() {

      <?php
      // Varibale qui définit la date sélectionnée
      $yearSelect = '';

      // Vérifier si une nouvelle valeur a été envoyée via le formulaire
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['optYear'])) {
          if (!empty($_GET['optYear'])) {
            // Mettre à jour la variable PHP avec la nouvelle valeur
            $yearSelect = $_GET['optYear'];
          }
        }
      }

      // Définition des dates nécéssaire
      $currentYear = date('Y-01-01');
      $endOfYear = date('Y-m-d', strtotime('+1 years -1 days', strtotime($yearSelect)));

      // Query SQL pour compter le nombre de vélos ajouté durant l'année 
      $yearQueryBikeOn = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$yearSelect' AND bikDate < '$endOfYear' AND bikState = 1");
      $yearBikeOnCount = $yearQueryBikeOn->fetch_row()[0];

      // Query SQL pour compter le nombre de vélos rendus durant l'année 
      $yearQueryBikeoFF = mysqli_query($db, "SELECT COUNT(idBike) FROM t_bike WHERE bikDate >= '$yearSelect' AND bikDate < '$endOfYear' AND bikState = 0");
      $yearBikeOffCount = $yearQueryBikeoFF->fetch_row()[0];
      ?>

      // Créer la table du graphique annuel
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Vélos');
      data.addColumn('number', 'Nombre');
      data.addRows([
        // Ajouter les valeures des queries dans le tableau
        ['Vélos trouvés', <?php print $yearBikeOnCount ?>],
        ['Vélos rendus', <?php print $yearBikeOffCount ?>]
      ]);

      // Definit les options du graphique annuel
      var options = {
        title: '<?php print date('Y', strtotime($yearSelect)) ?>',
      };

      // Créer une instance pour le graphique annuel
      var chart = new google.visualization.PieChart(document.getElementById('yearChart'));
      chart.draw(data, options);
    }
  </script>
  <!-- Fin de l'initiation -->


  <div class="container text-center">
    <!-- Affichage des deux graphiques -->
    <div class="row">
      <div class="col" id="trimChart">
      </div>
      <div class="col" id="yearChart">
      </div>
    </div>

    <!-- Formulaire en type radio pour la sélection des trimeste et années-->
    <div class="row">
      <div class="col">
        <div class="row">
          <form method="GET" action="statistiques.php">
            <!-- Garde en url la valeur du get de l'autre formulaire -->
            <?php
            foreach ($_GET as $name => $value) {
              if ($name !== 'optTrim') {
                print '<input type="hidden" name="' . $name . '" value="' . $value . '">';
              }
            }
            ?>
            <!-- Radio box -->
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-outline-primary">
                <input type="radio" name="optTrim" value="<?php print date('Y-01-01'); ?>" onchange="this.form.submit()"> Jan-Mar
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="optTrim" value="<?php print date('Y-04-01'); ?>" onchange="this.form.submit()"> Avr-Juin
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="optTrim" value="<?php print date('Y-07-01'); ?>" onchange="this.form.submit()"> Jui-Sep
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="optTrim" value="<?php print date('Y-10-01'); ?>" onchange="this.form.submit()"> Oct-Dec
              </label>
            </div>
          </form>
        </div>
      </div>
      <div class="col">
        <div class="row">
          <form method="GET" action="statistiques.php">
            <!-- Garde en url la valeur du get de l'autre formulaire -->
            <?php
            foreach ($_GET as $name => $value) {
              if ($name !== 'optYear') {
                print '<input type="hidden" name="' . $name . '" value="' . $value . '">';
              }
            }
            ?>
            <!-- Radio box -->
            <div class="btn-group" data-toggle="buttons">
              <label class="btn btn-outline-primary">
                <input type="radio" name="optYear" value="<?php print date('Y-m-d', strtotime('-2 years', strtotime($currentYear))); ?>" onchange="this.form.submit()"> <?php print date('Y', strtotime('-2 years', strtotime($currentYear))); ?><br>
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="optYear" value="<?php print date('Y-m-d', strtotime('-1 years', strtotime($currentYear))); ?>" onchange="this.form.submit()"> <?php print date('Y', strtotime('-1 years', strtotime($currentYear))); ?> <br>
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="optYear" value="<?php print date('Y-01-01'); ?>" onchange="this.form.submit()"> <?php print date('Y'); ?> <br>
              </label>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Bouton qui appelle la function generate-pdf() du fichier ../js/pdf.js -->
  <button id="generate-pdf" class="btn btn-primary">PDF</button>
</body>

</html>