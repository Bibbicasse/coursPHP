<!DOCTYPE html>
<?php
    //Déclaration d'une variable PHP
    $variable1 = "PHP 7 (qui est dans une variable)";
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title>Page 01, un exemple</title>"; ?>
</head>
<body>
    <?php
        echo "<h1>Cours sur le $variable1</h1>";
    ?>
    <p>Utilisation de variable PHP, on travail aussi avec :  <br>
    <?php
        $variable2 = "MySQL";
        echo $variable2;
        echo "</p>";

        $variable2 = "coucou";
        echo $variable2;
    ?>
    <hr>
    <?="<blockquote>$variable2, $variable2, on entend le $variable2</bockquote>";?>

</body>
</html>