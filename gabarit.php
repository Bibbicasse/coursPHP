<?php 
require_once '../inc/functions.php';

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
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
    <div class="row">
      <h2 class="col-sm-12 text-center">H2</h2>
      <div class="col-md-6">
    
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

<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>prenom</th>
                            <th>nom</th>
                            <th>sexe</th>
                            <th>service</th>
                            <th>salaire</th>
                        </tr>
                    </thead>
            <?php 
            while ($employes = $resultat->fetch(PDO::FETCH_ASSOC)) { ?> 
                <tr>
                    <td><?php echo $employes['id_employes']; ?></td>
                    <td><?php echo $employes['prenom']; ?></td>
                    <td><?php echo $employes['nom']; ?></td>
                    <td><?php echo $employes['sexe']; ?></td>
                    <td><?php echo $employes['service']; ?></td>
                    <td><?php echo $employes['date_enregistrement']; ?></td>
                    <td><?php echo $employes['salaire']; ?></td>
                </tr>
            <?php   } ?>
              
            </table>