<!DOCTYPE html>
<?php
    require 'db_functions.php';
$id = (isset($_GET["id"])) ? $_GET["id"] : "";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>product</title>
</head>
<body>
    <main id='globale_container'>
        <a href="index.php">retour</a>
            <div class='card'>
                <?php $product = findOneById($id);
                    $id = $product["id"];
                    echo '<h3>nom :</h3>';
                    echo '<p>'.$product["name"].'</p>';
                    echo '<h3>description :</h3>';
                    echo '<p>'.$product["description"].'</p>';
                    echo '<h3>prix :</h3>';
                    echo '<p>'.$product["price"].' € </p>';
                echo "<br><br><a style='color:green' href=traitement.php?action=utilisateurAjouterProduit&id=".$id.">Ajouter au panier<a><br>";
                ?>
                

            </div>
    </main>
</body>
</html>