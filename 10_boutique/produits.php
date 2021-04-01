<?php 
require_once '../inc/functions.php';

     /* ***********************************************/
     /*      1 - CONNEXION A LA BASE DE DONNEES        /
     /* ***********************************************/     
     
     $pdoProduit = new PDO('mysql:host=localhost;dbname=site', 
     'root', /* nom utilisateur */ 
     '',//mdp
     array(
         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //erreur SQL navigateur
         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //charset des échange BDD
         )
     );
    //  jePrintR($pdoProduit);

     $requete = $pdoProduit->query("SELECT * FROM produit ");
    //  jevardump($requete);

     $test = $requete->fetch(PDO::FETCH_ASSOC);
     // jevardump($test);   
?>  

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP -  </title>
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
  <?php require '../inc/nav.inc.php'; ?>

    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - </h1>
        <p class="lead">TEXT</p>
        <!-- < ?php  -->
        
        <!-- // echo "<p class=\bg-warning\">ref :".$test['reference']." <br> titre:".$test['titre']."<br> prix: ".$test['prix']."</p>"; -->
        <!-- // ?>  -->
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
    <div class="row">
      <h2 class="col-sm-12 text-center">Produits</h2>
      <div class="col-md-12">
        <?php 
          echo "<table class=\"table table-sm table-success table-striped\">";
            echo "<thead>";
                echo "<tr>";
					echo "<th>Photos</th>";
					echo "<th>REF</th>";
					echo "<th>Titre</th>";
					echo "<th>Catégorie</th>";
					echo "<th>Description</th>";
					echo "<th>Couleur</th>";
					echo "<th>Taille</th>";
					echo "<th>Public</th>";
					echo "<th>Prix</th>";
				echo "</tr>";
            echo "</thead>";
            foreach ( $pdoProduit->query( " SELECT * FROM produit " ) as $infos ) {
      echo "<tbody>";
			  echo "<tr>";
          echo "<td><img src=\"{$infos['photo']}\" class=\"img-fluid\"></td>";
          echo "<td>#" .$infos['reference']." </td>"; 
          echo "<td>" .$infos['titre']." </td>"; 
          echo "<td>" .$infos['categorie']." </td>"; 
          echo "<td>" .$infos['description']." </td>";
          echo "<td>" .$infos['couleur']." </td>";
          echo "<td>" .$infos['taille']." </td>"; 
          echo "<td>" .$infos['public']." </td>"; 
          echo "<td>" .$infos['prix']." </td>"; 
      echo "</tr>";
    echo "</tbody>";
		}
        echo "</table>";

        // jePrintR($infos['photo']);
        ?> 
      </div><!-- fin col -->
    </div><!-- fin row -->
    
    </main>

    <?php 
        require '../inc/footer.inc.php';
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
