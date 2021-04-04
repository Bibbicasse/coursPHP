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
    if (isset($_GET['id'] ) ) { 
        // jevardump($_GET);
            $resultat = $pdoAnnonce->prepare("SELECT * FROM advert WHERE id = :id");
            // jevardump($_GET);
            $resultat->execute(array(
                ':id' => $_GET['id']
            ));

            $fiche = $resultat->fetch(PDO::FETCH_ASSOC);
            // jePrintR($fiche);
        
            if ($resultat->rowCount() == 0) {
                header('location:index.php');
                exit();
            }
        } else {
            header('location:index.php');
            exit();
        }

    if (!empty($_POST)) {
        $_POST['reservation_message'] = htmlspecialchars($_POST['reservation_message']);

        $resultat = $pdoAnnonce->prepare("UPDATE advert SET reservation_message = :reservation_message WHERE id = :id");

        $resultat->execute(array( 
            ':reservation_message' => $_POST['reservation_message'],
            ':id' => $_GET['id'],
        ));
        header('location:annonces_all.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Infos</title>
</head>
<body>
    <main class="container bg-white m-4 mx-auto">
    <?php 
        require 'nav.php';
    ?>
        <h1 class="text-center"><?php echo $fiche['title'];?></h1>
        <div class="row">
        
        <div class="col-sm-12 my-auto">
            <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-sm-3">
                        <img src="../img/homme.png" alt="..." class="img-fluid my-auto" style="text-align: center;">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <!-- < ?php $nbr_format = number_format($number, 2, ',',' '?> -->
                            <h5 class="card-title alert alert-success text-center"> 
                            <?php echo $fiche['title']." "; 
                                if (!empty($fiche['reservation_message'])) {
                                    echo "<p class=\"alert alert-danger w-25 mx-auto\">Réservé</p>";
                                }
                            ?>
                            </h5>

                            <p class="card-text ">
                                <?php echo $fiche['description']. 
                                    "<br> <strong> Prix : </strong>" .number_format($fiche['price'])."€ <br> <strong> Type : </strong>". $fiche['type']."<br><strong> Ville :</strong>". $fiche['city']. '<br><strong> CP :</strong>'.$fiche['postal_code']. "<br><strong>Type de vente :</strong>". $fiche['type']. 
                                    "<br><strong> Prix de vente :</strong>"; ?> 
                                <?php 
                                    if ($fiche['type'] === 'location') {
                                        echo number_format($fiche['price'],2,".",","). "€/mois";
                                    } else {
                                        echo number_format($fiche['price'],2,".",",")."€";
                                    }
                                ?> 
                            </p>
                            
                            
                            <?php 
                                if (empty($fiche['reservation_message'])) {
                                    echo "  <form action=\"\" method=\"POST\">
                                        <textarea name=\"reservation_message\" id=\"reservation_message\" cols=\"75\" rows=\"5\" placeholder=\"Insérez vos raisons\"></textarea> <br>
                                        <button type=\"submit\" class=\"btn btn-outline-success\">Je reserve</button>
                                </form>";
                                } else {
                                    echo "<p class=\"alert alert-danger\">". $fiche['reservation_message']. "</p>";
                                }
                            ?>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
        </div><!-- fin col -->
    </div>
        
    </main>

         <!-- **********************************************-->
         <!--               BOOSTRAP 5 SCRIPT               -->
         <!-- **********************************************-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</body>
</html>