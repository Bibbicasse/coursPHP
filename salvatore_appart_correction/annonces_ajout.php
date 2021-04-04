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

    if (!empty($_POST)) {
        //pour se prémunir des failles nous faisons ceci
        $_POST['title'] = htmlspecialchars($_POST['title']); 
        $_POST['description'] = htmlspecialchars($_POST['description']);
        $_POST['city'] = htmlspecialchars($_POST['city']);
        $_POST['postal_code'] = htmlspecialchars($_POST['postal_code']);
        $_POST['type'] = htmlspecialchars($_POST['type']); //a commenter si NOW()
        $_POST['price'] = htmlspecialchars($_POST['price']);

        $resultat = $pdoAnnonce->prepare( "INSERT INTO advert (title, description, city, postal_code, type, price) VALUES(:title, :description, :city, :postal_code, :type, :price)" );

        $resultat->execute( array(
            ':title' => $_POST['title'], 
            ':description' => $_POST['description'],
            ':city' => $_POST['city'],
            ':postal_code' => $_POST['postal_code'],
            ':type' => $_POST['type'],
            ':price' => $_POST['price'],
        ));
    } /* fin !empty $_POST */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main class="container bg-white m-4 mx-auto">
    <?php 
        require 'nav.php';
    ?>
         <h1 class="text-center">Ajouter une annonce</h1>
        
        <!-- < ?php 
            echo "<p>Logement ".$ligne['title']."</p>";
            echo "<p>De ".$ligne['city']."</p>";
            
            $requete = $pdoAnnonce->query('SELECT * FROM advert');
            $nbr_annnonce = $requete->rowCount();
        
            echo "Il y a $nbr_annnonce d'annonce dans la base <br><br>";
        
            while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                echo $ligne['title']."<br>".$ligne['description']."<br>".$ligne['price']."<br>";
            }
        
        ?>  -->
        
        <div class="col-sm-6 mx-auto">
            <form action="" method="POST" class="border border-success border-5 m-2 px-2 py-2">
                <div class="mb-3 form-group">
                    <label for="title" class="form-label">Titre de l'annonce</label>
                    <input type="text" name="title" id="title" class="form-control form-group border border-success">
                </div>
                <div class="mb-3 form-group">
                    <label for="description" class="form-label">Description de l'annonce</label>
                    <input type="text" name="description" id="description" class="form-control form-group border border-success">
                </div>

                <div class="mb-3 form-group mx-auto">
                    <label for="city" class="form-label">Votre ville</label>
                    <input type="text" name="city" id="city" class="form-control form-group border border-success">
                </div>
                <div class="mb-3 form-group mx-auto">
                    <label for="postal_code" class="form-label">Code postal</label>
                    <input type="text" name="postal_code" id="postal_code" class="form-control form-group border border-success">
                </div>
                <div class="mb-3 form-group mx-auto ">
                    <label for="type" class="form-label">Type de vente</label> <br>
                    <select class="form-select border border-success btn btn-outline-white" aria-label="Default select example" name="type" >
                        <option value="location">Location</option>
                        <option value="vente">Vente</option>
                    </select>
                </div>
                <div class="mb-3 form-group mx-auto">
                    <label for="price" class="form-label">Prix de vente</label>
                    <input type="number" name="price" id="price" class="form-control form-group border border-success">
                </div>
                <input type="submit" href="#" class="submit btn btn-outline-success d-sm-block my-2 col-sm-6 mx-auto" value="Ajouter mon annonce">
            </form>
        </div>
        
    </main>

         <!-- **********************************************-->
         <!--               BOOSTRAP 5 SCRIPT               -->
         <!-- **********************************************-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


</body>
</html>