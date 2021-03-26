<?php require_once '../inc/functions.php'; ?> <!-- php des fonction -->
<?php 
    // connexion à la BASE
    $pdoDIAG = new PDO('mysql:host=localhost;dbname=dialogue', 
    'root', /* nom utilisateur */ '',//mdp
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        )
    );
?>
<?php 
    // traitement du formulaire & insertion dans la BDD
    // if (!empty($_POST)) {
        //CE TRAITEMENT N'EST PAS ASSEZ SECURISE
        // $resultat = $pdoDIAG->query( "INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW() )" );
        // $resultat = $pdoDIAG->query( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')" ); 
        //NOW() renvoie la date d'aujourd'hui ATTENTION dans l'exemple l'ordre "mélangé" des indices facilite l'injection SQL
    // }

    if (!empty($_POST)) {
        //pour se prémunir des failles nous faisons ceci
        $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']); //nettoie les données et se prémuni des injection SQL
        $_POST['message'] = htmlspecialchars($_POST['message']); //nettoie les données et se prémuni des injection SQL
       
        $resultat = $pdoDIAG->prepare( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES(:pseudo, NOW(), :message)" );

        $resultat->execute( array(
            ':pseudo' => $_POST['pseudo'],
            ':message' => $_POST['message'],
        ));
    } //fin du if + array
    
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
        <h1 class="display-4">Cours PHP 7 - Sécurité & PHP</h1>
        <p class="lead">TEXT</p>

       
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">
    <div class="row">
        <div class="col-md-6">
            <!-- Il faut faire un formulaire HTML avec action et méthod, action reste vide si nous insérons grâce à cette même page et poste va envoyer les infos du form dans la superglobale $_POST-->
            <form action="01_dialogue.php" method="POST" class="border border-success border-5 m-2 px-2" >
                <div class="mb-3 form-group">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control form-group" placeholder="Votre Pseudo">
                </div>
                <div class="mb-3 form-group">
                    <label for="message" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="message" name="message" value="" cols="30" rows="5" placeholder="Votre commentaire"></textarea>
                </div>
                <input type="submit" href="#" class="submit btn btn-outline-success my-2"></a>
            </form>
        </div><!-- fin col -->
        
        <div class="col-md-6 p-4 ">
            <p>Création d'une BDD "dialogue" avec les information suivante</p>
            <ul class="alert alert-success">
                <li>Nom de la BDD : dialogue</li>
                <li>Nom de la table : commentaire</li>
                <li>la table contient les champs suivant :</li> 
                <li>Champs : id_commentaire INT PK AI</li>
                <li>Pseudo : VARCHAR(20)</li>
                <li>message : TEXT</li>
                <li>date_enregistrement : DATETIME</li>
            </ul>
        </div>

        <div class="col-md-12 mx-auto">
    <?php 
        $requete = $pdoDIAG->query("SELECT * FROM commentaire ");
            // jevardump($requete);
            $ligne = $requete->fetch(PDO::FETCH_ASSOC);
            // jevardump($ligne);
            // while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
            //     echo "<li>" .$ligne['pseudo']. " a écrit le " .$ligne['message'] ." le " .$ligne['date_enregistrement']. "</li>";   
            // }
            $requete = $pdoDIAG->query("SELECT * FROM commentaire ORDER BY pseudo");
            // jevardump($requete3);
            $ligne = $requete->rowCount();
            // jevardump($nbr_employes2);
            echo "<p class=\"text-center\"><br><strong> Commentaires : </strong></p>";
            echo "<table class=\"mx-auto w-75 border border-secondary mb-3\">";
            // jevardump($requete);
            echo "<thead class=\" border bg-danger text-center text-white\">";
                echo "<tr>";
                    echo "<td> ID </td>";
                    echo "<td> Pseudo </td>";
                    echo "<td> Commentaire </td>";
                    echo "<td> Date </td>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody class=\"text-center\">";
                while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                    echo "<td>#".$ligne['id_commentaire']."</td>";
                    echo "<td>" .$ligne['pseudo']."</td>";
                    echo "<td>".$ligne['message']."</td>";
                    echo "<td>".$ligne['date_enregistrement']."</td>";
                echo "</tr>"; }
            echo "</tbody>";  
            echo "</table>";

            // correction de patrick

            echo "<hr>";

            echo"<h2 class=\"text-center mx-auto\">Correction de Patrick </h2>";

            $resultat = $pdoDIAG->query("SELECT * FROM commentaire");
            jePrintR($resultat); 
            $nbr_commentaire = $resultat->rowCount();//je compte les résultats et je passe le total dans une nouvelle variable
    ?> 
        <h5>Il y a <?php 
            echo $nbr_commentaire;//je compte les résultats ?> commentaires </h5>

            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pseudo</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
            

            <?php 
            while ($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)) { ?> 
                <tr>
                    <td><?php echo $commentaire['id_commentaire']; ?></td>
                    <td><?php echo $commentaire['pseudo']; ?></td>
                    <td><?php echo $commentaire['message']; ?></td>
                    <td><?php echo $commentaire['date_enregistrement']; ?></td>
                </tr>
            <?php   } ?>
              
            </table>
            
           
        </div> <!-- fin tableau commentaire -->
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