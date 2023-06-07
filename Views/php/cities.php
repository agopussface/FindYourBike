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

     <script src="../js/searchbar.js"></script>

     <!-- Titre de la page -->
     <title>Home</title>

 </head>

 <body>
     <?php
        if ($_SESSION['entr'] == true) { ?>
         <div class="row">
             <div class="col-3">
                 <div class="col-12" style="height: 50vh;">
                     <h5>Chercher une commune</h5>
                     <input id="searchbar" onkeyup="search()" type="text" name="search" placeholder="Search..." style="max-width: 100%; height: 5vh">
                     <ol id='list' style="overflow-y: scroll; max-height: 100%;">
                         <?php
                            // Recupération des clients depuis la db
                            $query = mysqli_query($db, "SELECT * FROM t_city");
                            // Check si la récupération a fonctionné
                            if (!$query) {
                                die("Query failed: " . mysqli_error($db));
                            }
                            // Check si la liste de clients n'est pas vide
                            if (mysqli_num_rows($query) > 0) {
                                // Affiche la liste des clients
                                while ($row = mysqli_fetch_assoc($query)) {
                                    print '<a  class="searchitem" href="cities.php?city=' . $row['idCity'] . '">' . $row['citName'] . '</br></a>';
                                }
                            } else {
                                // Si la liste est vide...
                                print "No customers found.";
                            }
                            ?>
                     </ol>



                 </div>
             </div>


             <div class="col-5" style="height: 100vh;">
                 <?php
                    $selCity = $_GET['city'];
                    $query = mysqli_query($db, "SELECT * FROM t_city WHERE idCity = '$selCity'");
                    $row = $query->fetch_assoc();
                    print '<img class="d-block mx-auto mt-3" style="height: 50px; width: 50px;" src="../../Files/cityLogo/' . $row['citLogo'] . '"/>';
                    print '<h2 class="text-center">' . $row['citName'] . '</h2>';
                    print '<h4>Informations : </h4> <br>';
                    ?>
                 <div class="text-center">
                     <h5><?php print $row['citAccFirstName'] . ' ' . $row['citAccLastName'] ?></h5>
                     <?php
                        $role = $row['idRole'];
                        $queryRol = mysqli_query($db, "SELECT rolName FROM t_role WHERE idRole='$role'");
                        $rowRol = $queryRol->fetch_assoc();
                        ?>
                     <p><?php print $rowRol['rolName'] ?></p>
                 </div>
                 <p><?php print $row['citAccEmail'] ?></p>
                 <p><?php print $row['citAccPhone'] ?></p>
                 <p><?php print $row['citAccAddress'] ?></p>
                 <div class="text-center">
                     <?php
                        if ($row['citState'] == '0') {
                        ?>
                         <a href="check/validCity.php?city=<?php print $row['idCity'] ?>" class="btn btn-primary mt-5">Valider la ville</a>
                     <?php
                        } else {
                        ?>
                         <p class="mt-5">Commune active</p>
                     <?php
                        }
                        ?>
                 </div>

                 <?php
                    ?>
             </div>
             <div class="col-4">
                 <div class="col-12" style="height: 50vh;">
                     <h4 class="text-center">Compte de consultation</h4>
                     <?php
                        $query = mysqli_query($db, "SELECT * FROM t_consultacc");
                        $row = $query->fetch_assoc();
                        print $row['coaUsername'] . '<br>';
                        print $row['coaPassword'];
                        ?>
                 </div>

             </div>
         </div>
     <?php } else {
            print 'Vous n\'avez pas accès à cette page';
        }
        ?>
 </body>

 </html>