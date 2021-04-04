<?php 
/* ***********************************************/
/*             Mes fonctions Débug               */
/* ***********************************************/
function jevardump($maVariable) {
    echo "<br> <small class=\"bg-warning text-white\">... var_dump </small><pre class=\"alert alert-warning w-75\">";
        var_dump($maVariable);//une variable à laquelle on appelle la fonction var_dump
    echo "</pre>";
}
//création d'une fonction pour "print_r" une variable (très utile pour un tableau)
function jePrintR($maVariable) {
    echo "<br> <small class=\"bg-danger text-white\">... print_r </small><pre class=\"alert alert-danger w-75\">";
        var_dump($maVariable);//une variable à laquelle on appelle la fonction var_dump
    echo "</pre>";
}
?> 

<?php 
    // connexion à la BASE
    $pdoAnnonce = new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_salvatore_correction', 
    'root', /* nom utilisateur */ '',//mdp
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        )
    );
    $requete = $pdoAnnonce->query("SELECT * FROM advert");
    // jevardump($requete);

    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
    // jevardump($ligne);

    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Toutes les annonces</title>
</head>
<body>
    <main class="container bg-white m-4 mx-auto">
    <?php 
        require 'nav.php';
    ?>
        <h1 class="text-center">Toutes les annonces</h1>
        <div class="col-sm-12 mx-auto">
            <?php 
                echo "<table class=\"table table-sm table-success table-striped\">";
                    echo "<thead>";
                        echo "<tr class=\"text-center\">";
                            // echo "<th>ID</th>";
                            echo "<th>Titre</th>";
                            echo "<th>Description</th>";
                            echo "<th>Ville</th>";
                            echo "<th>Code Postal</th>";
                            echo "<th>Type de vente</th>";
                            echo "<th>Prix de vente</th>";
                            echo "<th>Info</th>";
                            echo "<th>Reservation</th>";
                        echo "</tr>";
                    echo "</thead>";
                    foreach ( $pdoAnnonce->query( " SELECT * FROM advert ORDER BY id DESC" ) as $infos ) { 
                    echo "<tbody>";
                        echo "<tr>";
                            // echo "<td>#" .$infos['id']." </td>";
                            echo "<td style='text-transform: uppercase;'>" .$infos['title']." </td>";
                            echo "<td>" .$infos['description']." </td>";
                            echo "<td>" .$infos['postal_code']." </td>";
                            echo "<td>" .$infos['city']." </td>";
                            echo "<td>" .$infos['type']." </td>";
                            echo "<td>" .number_format($infos['price'],2,".",","). "€</td>";
                            echo "<td><a href=\"annonce_infos.php?id=".$infos['id']."\"> Consulter</a><td>";

                            if (empty($infos['reservation_message'])) {
                                echo "<p class=\"alert alert-warning\">Disponible</p>";
                            } else {
                                echo "<p class=\"alert alert-danger\">Réservé</p>";
                            }
                         
                            
                        echo "</tr>";
                    echo "</tbody>";
                        }
                echo "</table>";
            ?> 
        </div>
                            
    </main>

         <!-- **********************************************-->
         <!--               BOOSTRAP 5 SCRIPT               -->
         <!-- **********************************************-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</body>
</html>