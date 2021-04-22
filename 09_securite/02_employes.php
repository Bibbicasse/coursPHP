<?php
// php des fonction
 require_once '../inc/functions.php';
    // connexion à la BASE
    $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise', 
    'root', /* nom utilisateur */ 
    '',//mdp
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //erreur SQL navigateur
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //charset des échange BDD
        )
    );

    if (!empty($_POST)) {
        //pour se prémunir des failles nous faisons ceci
        $_POST['prenom'] = htmlspecialchars($_POST['prenom']); 
        $_POST['nom'] = htmlspecialchars($_POST['nom']);
        $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
        $_POST['service'] = htmlspecialchars($_POST['service']);
        $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']); //a commenter si NOW()
        $_POST['salaire'] = htmlspecialchars($_POST['salaire']);
       
                            // Choisir 1 si NOW() sinon 2 pour type="date" //
        // $resultat = $pdoENT->prepare( "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom, :nom, :sexe, :service, NOW(), :salaire)" );

        $resultat = $pdoENT->prepare( "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES(:prenom, :nom, :sexe, :service, :date_embauche, :salaire)" );

        $resultat->execute( array(
            ':prenom' => $_POST['prenom'], 
            ':nom' => $_POST['nom'],
            ':sexe' => $_POST['sexe'],
            ':service' => $_POST['service'],
            ':date_embauche' => $_POST['date_embauche'],
            ':salaire' => $_POST['salaire'],
        ));
    } /* fin !empty $_POST */
    ?> 

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP -  Sécurité & PHP</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

  <?php 
        require '../inc/nav.inc.php';
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - Exercice d'insertion</h1>
        <p class="lead">Connexion, affichage et insertion d'un nouveau employés</p>
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
    <div class="row">
    <div class="col-sm-12">
        <?php 
        echo "<table class=\"table table-sm table-success table-striped\" id=\"updateForm\">";
            echo "<thead>";
                echo "<tr>";
                echo "<th>Nom, prénom</th>";
                  echo "<th>ID</th>";
                echo "<th>Service</th>";
                echo "<th>Date d'entrée</th>";
                echo "<th>Salaire mensuel</th>";
                echo "<th>Fiche</th>";
                echo "</tr>";
            echo "</thead>";
        foreach ( $pdoENT->query( " SELECT * FROM employes ORDER BY sexe DESC, nom ASC " ) as $infos ) { 
                echo "<tr>";
                    echo "<td>";
                        if ( $infos['sexe'] == 'f') {
                            echo "<span class=\"badge badge-secondary\">Mme ";
                        } else { echo "<span class=\"badge badge-primary\">M. "; } 
                    echo $infos['nom']. " " .$infos['prenom']. "</span></td>";
                    echo "<td>#" .$infos['id_employes']." </td>";
                    echo "<td>" .$infos['service']. " </td>";

                    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR');
                    $dateBDD = $infos['date_embauche'];
                    echo "<td>" . strftime('%d %B %Y', strtotime($dateBDD)). " </td>";

                    echo "<td>" .number_format($infos['salaire'],2,".",","). "€</td>";

                    echo "<td><a href=\"02_fiche_employe.php?id_employes=".$infos['id_employes']."\"> Voir sa fiche</a><td>";
                    // echo "<td><a href=\"01_dialogue.php\"> Voir sa fiche</a><td>";
                echo "</tr>";
                }
        echo "</table>";
    ?> 
    </div><!-- fin col -->
                                    <!-- FORMULAIRE D'INSERTION -->
    <div class="col-sm-6 mx-auto">
        <form action="02_employes.php" method="POST" class="border border-success border-5 m-2 px-2 py-2" >
            <div class="mb-3 form-group">
                <!-- <label for="prenom" class="form-label">Prenom</label> -->
                <input type="text" name="prenom" id="prenom" class="form-control form-group border border-success" placeholder="Votre prenom" >
            </div>
            <div class="mb-3 form-group">
                <!-- <label for="nom" class="form-label">Nom</label> -->
                <input type="text" name="nom" id="nom" class="form-control form-group border border-success" placeholder="Votre nom" >
            </div>
            <div class="mb-3 form-group ">
                <!-- <label for="sexe" class="form-label">Sexe</label> <br> -->
                <select class="form-select border border-success btn btn-outline-white" aria-label="Default select example" name="sexe" >
                    <option value="f">Femme</option>
                    <option value="m">Homme</option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <!-- <label for="service" class="form-label">Services</label> <br> -->
                <select class="form-select border border-success btn btn-outline-white" aria-label="Default select example" name="service" >
                    <option value="assistant">Assistant</option>
                    <option value="commercial">Commercial</option>
                    <option value="communication">Communication</option>
                    <option value="direction">Direction</option>
                    <option value="informatique">Informatique</option>
                    <option value="juridique">Juridique</option>
                    <option value="production">Production</option>
                    <option value="secretariat">Secretariat</option>
                </select>
            </div>
            <div class="mb-3 form-group">
                <!-- <label for="date_embauche" class="form-label">date_embauche</label> -->
                <input type="date" name="date_embauche" id="date_embauche" class="form-control form-group border border-success" >
            </div>
            <div class="mb-3 form-group">
                <!-- <label for="salaire" class="form-label">Salaire</label> -->
                <input type="number" name="salaire" id="salaire" class="form-control form-group border border-success" placeholder="Salaire souhaité" >
            </div>
                <input type="submit" href="#" class="submit btn btn-outline-success d-sm-block my-2 col-sm-6 mx-auto" value="M'inscrire">
        </form>
    </div><!-- fin col -->

    <div class="col-sm-12">
    
    </div>
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