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

    <title>Cours PHP -  PDO</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

  <?php 
        require '../inc/nav.inc.php';
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Cours PHP 7 - PDO</h1>
        <p class="lead">La variable "$pdo" est un objet qui représente la connexion à une BDD</p>
    </div>

     <!-- **********************************************-->
     <!--                CONTENU PRINCIPAL              -->
     <!-- **********************************************-->

    <main class="container bg-white m-4 mx-auto">

    <div class="row">
        <div class="col-sm-12">
            <h2>Connexion à la base de donnée</h2>
            <p><abbr title="Php Data Objet">PDO </abbr></p>
            <?php 
                $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise', /* adresse + base de donnée utilisée */ 
                //On a en premier le lieu le driver mysql (IBM, ORACLE, OBDC ...), le nom du serveur, le nom de la BDD
                'root', /* nom utilisateur pour la base de donnée*/
                '', /* mot de passe */
                //si vous êtes sur MAC il y un mdp = 'root'
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, //cette ligne sert à afficher les erreurs SQL dans le navigateur
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    )//Pour définir le charset des échanges avec la BDD
                    /* fin array PDO */
                ); 
                /* fin PDO */

                //METHODE DE PATRICK ISOLA
                // $host = 'localhost'; /* adresse */
                // $database= 'entreprise'; /* base de donnée */
                // $user = 'root'; /* utilisateur */
                // $psw = ''; /* mot de passe */

                // $pdoENT = new PDO('mysql:host='.$host.';dbname='.$database, $user, $psw);
                // $pdoENT ->exec("SET NAMES utf8");

                // jevardump($pdoENT);//L'objet est vide car il n'y a pas de propriétes
                // jevardump(get_class_methods($pdoENT));//Permet d'afficher la liste des méthode présentes dans l'objet PDO
            ?> 
        </div><!-- fin col -->
        <div class="col-12">
                <h2>2 - Faire des requêtes avec <code>exect()</code></h2>
                <p>La méthode <code>exec()</code> est utilisée pour faire des requêtes qui ne retournent pas de résultat : INSERT, UPDATE, DELETE</p>
                <p>Les valeurs de retours possible : <br>
                    Succès : x : indique le nombre de ligne affectées par la requête </p> <br>
                    Echec : false = 0 / True = 1
                <!-- requete SQL d'insertion dans la BDD et dans la table employes: INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES('Jean', 'Bon', 'm', 'Cuisine', '2021-03-18', '2000') -->
                <?php 
                // on va insérer un employé dans la BDD
                    // $requete = $pdoENT->exec("INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES('Jean', 'Bon', 'm', 'Cuisine', '2021-03-18', '2000')");

                    // $requete = $pdoENT->exec("DELETE FROM employes WHERE prenom='jean' AND nom='Bon'");*
                    // jevardump($requete);

                    // echo "Dernier id générée en BDD : " .$pdoENT->LastInsertID();
                ?> 
        </div><!-- fin col -->
        <div class="col-sm-12">
            <h2>3- Faire des requêtes avec <code>query()</code></h2>
            <p><code>query()</code> est utilisé pour des requêtes qui retournent un ou plusieurs résultats : SELECT mais aussi DELETE, UPDATE et INSERT</p>

            <?php 
            // 1 - on demande des informations à la BDD car il y a un ou plusieurs résultats avec query()
            $requete = $pdoENT->query("SELECT * FROM employes WHERE prenom = 'Amandine'");
            jevardump($requete);
            // 2 -Dans cet objet $requete nous ne voyons pas encore les données concernant amandine pour autant elle s'y trouve. Pour y accéder nous devons utiliser une méthode de $requete

            $ligne = $requete->fetch(PDO::FETCH_ASSOC);
            // 3 - Avec cette méthode fetch() on transforme l'objet $requete
            // 4 - fetch(), avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $requete en un array associatif appelé ici $ligne : on y trouve en indice le nom des champs de la requête SQL
            jevardump($ligne);

            echo "<p>Nom : " .$ligne['prenom']." ". $ligne['nom']."<br>service : " .$ligne['service']." date d'embauche le ". $ligne['date_embauche']. "<br>Salaire mensuel: ".$ligne['salaire']."€/mois"."</p>";
            
            ?> 
        </div>
    </div>


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