<?php 
require_once 'inc/init.php'; //fichier d'initialisation

if (isset($_GET['id'] ) ) { 
// jevardump($_GET);
        $resultat = $pdoWebforce->prepare("SELECT * FROM advert WHERE id = :id");
        $resultat->execute(array(
            ':id' => $_GET['id']
        ));
        
//  jePrintR($resultat);
// jePrintR($resultat->rowCount())
       $resultat->fetch(PDO::FETCH_ASSOC);
        // jePrintR($annonce);
    
        // if ($resultat->rowCount() == 0) {
        //     header('location:accueil.php');
        //     exit();
        // } else {
        // header('location:accueil.php');
        // exit();
        // }
    }
    // jevardump($resultat); //$resultat non défini ligne 23 non trouvé
    if(!empty($_POST)) {

        if (!isset($_POST['title']) || strlen($_POST['title']) < 4 || strlen($_POST['title']) > 100) {
            $contenu .='<div class="alert alert-danger">Le titre doit contenir moins de 100 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
         } //fin isset title

         if (!isset($_POST['description']) || strlen($_POST['description']) > 500) {
             $contenu .='<div class="alert alert-danger">Le titre doit contenir moins de 100 caractères.</div>'; // affiche ce message si condition n'est pas respecté.
         } //fin isset description

         if (!isset($_POST['postal_code']) || !preg_match('#^[0-9]{5}$#', $_POST['postal_code']) ) {
             $contenu .='<div class="alert alert-danger">le code postal est vide ou possède une erreur</div>';
         }// Est ce que le code postal correspond à l'expression régulière précisée : la "regex" régular expression

         if (!isset($_POST['type']) || ($_POST['type']) !="location" && ($_POST['type']) !="vente") { 
             $contenu .='<div class="alert alert-danger">>le type de votre annonce n\'est pas validé</div>'; // affiche ce message si condition n'est pas respecté.
         }
        $resultat = $pdoWebforce->prepare("UPDATE advert SET title = :title, description = :description, postal_code = :postal_code, city = :city, type = :type, price = :price, reservation_message = :reservation_message  WHERE id = :id");

        $resultat->execute( array(
            ':title' => $_POST['title'], 
            ':description' => $_POST['description'],
            ':postal_code' => $_POST['postal_code'],
            ':city' => $_POST['city'],
            ':type' => $_POST['type'],
            ':price' => $_POST['price'],
            ':reservation_message' => $_POST['reservation_message'],
            ':id' => $_GET['id'],
        ));
        header('location:accueil.php');
        exit();
    }
?> 
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>WEBFORCE 3 - PHP EVALUATION </title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  
  <body>
    <!-- **********************************************-->
    <!--                    NAVIGATION                 -->
    <!-- **********************************************-->
  <?php 
        require 'inc/nav.inc.php';
    ?> <!-- navigation soucis de lien non résolu -->

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container mx-auto m-4 p-4"> 
    
        <h1 class="text-center">WEBFORCE 3 - PHP EVALUATION - Annnonce <?php echo $resultat['title']?></h1>
        <h2 class="text-center">Les annonces</h2>

        <h5 class="alert alert-success text-center"> <?php echo $resultat['title']. " " .$resultat['postal_code'];?></h5>

        <div>
        <?php 
        echo "<table class=\"table table-sm table-success table-striped\">";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Titre</th>";
                    echo "<th>Description</th>";
                    echo "<th>Code postal</th>";
                    echo "<th>Ville</th>";
                    echo "<th>Type</th>";
                    echo "<th>Prix</th>";
                    echo "<th>Prix</th>";
                echo "</tr>";
            echo "</thead>";
        foreach ( $pdoWebforce->query( " SELECT * FROM advert ORDER BY id DESC LIMIT 15" ) as $infos ) { 
                echo "<tr>";
                    echo "<td>#" .$infos['id']." </td>";
                    echo "<td style='text-transform: uppercase;'>" .$infos['title']." </td>";
                    echo "<td>" .$infos['description']." </td>";
                    echo "<td>" .$infos['postal_code']." </td>";
                    echo "<td>" .$infos['city']." </td>";
                    echo "<td>" .$infos['type']." </td>";
                    echo "<td>" .number_format($infos['price'],2,".",","). "€</td>";
                    echo "<td>" .$infos['reservation_message']." </td>";
                echo "</tr>";
                }
        echo "</table>";
    ?> 
        </div>
    </main>

<?php 
    
?> 



         <!-- **********************************************-->
         <!--               BOOSTRAP 5 SCRIPT               -->
         <!-- **********************************************-->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>