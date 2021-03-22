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
            <h2>1 -Connexion à la base de donnée</h2>
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
                    Echec : false = 0
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
            <p>En cas de success <code>Query()</code> retourne un nouvel objet qui provient de la classe PDOstatement <br> Echec = False</p>
            <ul>
                <li>Pour information, on peux mettre dans les paramètre() de fetch()</li>
                <li>PDO::FETCH_NUM : Pour obtenir un tableau aux indices numériques</li>
                <li>PDO::FETCH_OBJ : pour obtenir un dernier objet</li>
            </ul>
            
            
            <?php 
            // 1 - on demande des informations à la BDD car il y a un ou plusieurs résultats avec query()
            $requete = $pdoENT->query("SELECT * FROM employes WHERE prenom = 'amandine'");
            jevardump($requete);
            // 2 -Dans cet objet $requete nous ne voyons pas encore les données concernant amandine pour autant elle s'y trouve. Pour y accéder nous devons utiliser une méthode de $requete

            $ligne = $requete->fetch(PDO::FETCH_ASSOC);
            // 3 - Avec cette méthode fetch() on transforme l'objet $requete fetch(), avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $requete en un array associatif appelé ici $ligne : on y trouve en indice le nom des champs de la requête SQL
            jevardump($ligne);

            echo "<p>Nom : " .$ligne['prenom']." ". $ligne['nom']."<br>service : " .$ligne['service']." date d'embauche le ". $ligne['date_embauche']. "<br>Salaire mensuel: ".$ligne['salaire']."€/mois"."</p>";
            
            // exo affiche le service de l'employé dont l'id est 417 et son nom et son prénom
            $requete = $pdoENT->query("SELECT * FROM employes WHERE id_employes = 417"); //requete de connexion
            $ligne = $requete->fetch(PDO::FETCH_ASSOC); //requete pour chercher l'information
            echo "<p>".$ligne['prenom']." ".$ligne['nom']." est dans le service de ".$ligne['service']; //echo pour afficher le resultat
            ?>
            
        </div><!-- fin de col -->
        <div class="col-sm-12">
            <h2>4 - Faire des requêtes avec <code>query()</code> et afficher plusieurs résultats</h2>

            <?php 
                $requete = $pdoENT->query("SELECT * FROM employes");
                jevardump($requete);

                $nbr_employes = $requete->rowCount();//cette méthode rowCount() permet de compter le nombre de rangées d'enregistrement) retournés par la requête
                // jevardump($nbr_employes);
                echo "Il y a $nbr_employes employés dans la base <br>";
                //Comme nous avopns plusieurs résultat dans $requete nous devons faire une boucle pour les parcourir
                //fetch() va chercher la ligne suyivante du jeu de résultat à chaque tour de boucle, et le transforme en objet. la boucle while permet de faire avancer le curseur dans l'objet. Quant 
                echo "<br><strong> Employés : </strong><br>";
                while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                    echo $ligne['prenom']." ". $ligne['nom'].
                    "<br> Au service ". $ligne['service'].
                    " et  à été embauché le ". $ligne['date_embauche'].
                    "<br> Son salaire est de ". $ligne['salaire']."€/mois <br><br>";
                }

                // $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                // jevardump($requete);

                // EXO afficher la liste des différents services dans une Ul en mettant un service par des li
                $requete2 = $pdoENT->query("SELECT DISTINCT(service) FROM employes ORDER BY service");
                jevardump($requete2);  
                $service = $requete2->rowCount();

                echo "<p class=\"bg-success mx-auto w-50 text-center p-2\"><strong>il y a " .$service." services dans la société </strong></p>";
                echo "<ul class=\"border borer-success mx-auto w-50 py-2\">";
                
                while ($service = $requete2->fetch(PDO::FETCH_ASSOC)) {
                    echo "<li>".$service['service']. "</li><br>";
                }
                echo "</ul>";
            ?> 
        </div><!-- fin de col -->
        <div class="col-sm-12">
            <h2>Compter le nombre d'employés, puis afficher toutes les informations d'un des employés dans un tableau HTML trier par ordre ASC de nom</h2>

            <?php 
            $requete3 = $pdoENT->query("SELECT * FROM employes ORDER BY sexe DESC, nom ASC");
                // jevardump($requete3);
                $nbr_employes2 = $requete3->rowCount();
                // jevardump($nbr_employes2);
                echo "<h3 class=\"text-center pt-2\"> Il y a ". $nbr_employes2. " employés dans la société </h3>";
                //////////////////////////////////////////////////////////////////////////
                    echo "<p class=\"text-center\"><br><strong> Employés : </strong></p>";
                    echo "<table class=\"mx-auto w-75 border border-secondary mb-3\">";
                        echo "<thead class=\" border bg-danger text-center text-white\">";
                            echo "<tr>";
                                echo "<td> ID </td>";
                                echo "<td> Nom </td>";
                                echo "<td> Sexe </td>";
                                echo "<td> Service </td>";
                                echo "<td> Date Embauche </td>";
                                echo "<td> Salaire </td>";
                            echo "</tr>";
                        echo "<tbody class=\"text-center\">";
                            while ($ligne = $requete3->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>#".$ligne['id_employes']."</td>";
                                echo "<td>" .$ligne['nom']. " " .$ligne['prenom']. "</td>";
                                if ($ligne['sexe'] == 'm') {
                                    echo "<td> Homme </td>"; 
                                } else {
                                    echo "<td> Femme </td>";
                                }
                                echo "<td>".$ligne['service']."</td>";
                                echo "<td>".$ligne['date_embauche']."</td>";
                                echo "<td>".$ligne['salaire']." €/mois</td>";   
                            echo "</tr>";
                            }
                        echo "</tbody>";
                        echo "</thead>";
                    echo "</table>";

                            // Avec un foreach //
                echo "<table class=\"table table-sm table-success table-striped\">";
                echo "<thead>";
                echo "<tr>";
                  echo "<th>Nom, prénom</th>";
                  // echo "<th>Sexe</th>";
                  echo "<th>Service</th>";
                  echo "<th>Date d'entrée</th>";
                  echo "<th>Salaire mensuel</th>";
                echo "</tr>";
              echo "</thead>";

                foreach ( $pdoENT->query( " SELECT * FROM employes ORDER BY sexe DESC, nom ASC " ) as $infos ) { //$employe étant un tableau on peut le parcourir avec une foreach. La variable $infos prend les valeurs successivement à chaque tour de boucle
                  // jevardump($infos);
                  echo "<tr>";
                    echo "<td>";
                    if ( $infos['sexe'] == 'f') {
                      echo "<span class=\"badge badge-secondary\">Mme ";
                    } else {
                      echo "<span class=\"badge badge-primary\">M. ";
                    } echo $infos['nom']. " " .$infos['prenom']. "</span></td>";
                    echo "<td>" .$infos['service']. " </td>";

                    //3 methode de formater la date en français.

                    // Basic - 
                    // echo "<td>" .$infos['date_embauche']. " </td>";
                    
                    // 1 -
                    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR');
                    $dateBDD = $infos['date_embauche'];
                    echo "<td>" . strftime('%d %B %Y', strtotime($dateBDD)). " </td>";

                    // 2 -
                    // echo "<td>" . strftime('%d/%m/%Y',strtotime($infos['date_embauche']))."</td>";

                    // 3 -
                    //echo "<td>" .date('d/m/Y', strtotime($infos['date_embauche'])). " </td>";
                    
                    
                    echo "<td>" .number_format($infos['salaire'],2,".",","). "€</td>";
                  echo "</tr>";
                  
                }
                echo "</table>";


            ?> 
        </div><!-- fin col -->
        <div class="col-sm-12">
            <h2>05 - requête préparées avec <code>prepare()</code></h2>
            <p>Les requêtes préparées sont préconisées si vous exécutez plusieurs fois la même requête, ainsi vous éviterez au SGBD de répéter toutes les phrases, analyses, interprétations exécution etc ... On gagne en performance</p>
            <p>Les requêtes préparées sont utiles pour nettoyer les données et se prémunir des injection de type SQL (tentative de piratage) cf.09_securite</p>

            <?php 
            //une requête préparée se réalise en 3 étapes

            $nom = 'Sennard';//ici j'ai l'info que je cherche dans un résultat ex. Je cherche "Sennard

            //1 - on prépare la requête
            
            $resultat = $pdoENT->prepare("SELECT * FROM employes WHERE nom = :nom"); 
            // a - prepare permet de preparer la requête sans l'exécuté.
            // b - :nom est un marqueur qui est vide (comme une boite vide) et qui attend une valeur
            // c - Pour le moment un objet PDOStatement
            // jevardump($resultat);
            // 2 - On lie le marqueur :nom à une variable $nbr_employes
            $resultat->bindParam(':nom', $nom);//permet de lier le marqueur au paramètres
            // $resultat->bindValue(':nom', 'titi');//si on besoin de lier le marqueur à une valeur fixe

            // 3 - Puis on exécute la requête

            $resultat->execute();//permet d'exécuter toute la requête
            // jevardump($resultat);

            $employe = $resultat->fetch(PDO::FETCH_ASSOC);
            // jevardump($employe);

            echo "<p>" . $employe['prenom']. ' ' .$employe['nom']. ' du service ' .$employe['service']. "</p>";

            echo "<hr>";

            //prepare() et boucle car là je cherche tous les résultat
            $sexe = "f";
            $requete = $pdoENT->prepare( " SELECT * FROM employes WHERE sexe = :sexe" );
            $requete->bindParam(':sexe', $sexe);
            $requete->execute();
            $nombre_employes = $requete->rowCount();
            jevardump($nombre_employes);
            while ( $ligne = $requete->fetch( PDO::FETCH_ASSOC ) ) {
                    echo "<p>Nom : " .$ligne['prenom']. " " .$ligne['nom']." travaille au service : " .$ligne['service']."</p>";
                };

            ?> 
            <!-- REPREMDRE MARDI REQUETE SANS bindparam -->
        </div>
    </div> <!-- fin row -->


    


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