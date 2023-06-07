<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
  crossorigin="anonymous"
/>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
  crossorigin="anonymous"
></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 bg-black text-white">
      <div
        class="d-flex flex-column flex-shrink-0 p-3 text-white bg-black"
        style="height: 100vh"
      >
        <a
          href="home.php"
          class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
        >
          <h1 class="fs-4">FindYourBike</h1>
        </a>
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="newBike.php" class="nav-link text-white text-wrap">
              Vélo trouvé
            </a>
          </li>
          <li class="nav-item">
            <a href="bikeResearch.php" class="nav-link text-white text-wrap">
              Rechercher un vélo dans la base
            </a>
          </li>
          <li class="nav-item">
            <a href="statistiques.php" class="nav-link text-white text-wrap">
              Statistiques
            </a>
          </li>
          <li class="nav-item">
            <a href="cities.php" class="nav-link text-white text-wrap">
              Gestion de la commune
            </a>
          </li>
          <li class="nav-item">
            <a href="check/disconnect.php" class="nav-link text-white text-wrap">
              <?php print $_SESSION['username'] . ' - Se deconecter'?>
            </a>
          </li>
          <li class="mt-5">

          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <style>
        .col-md-10 {
          height: 100vh;
        }
      </style>
