<?php
session_start();
include 'db_functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>store</title>
</head>
<body>
    <main id='globale_container'>
        <div id='cards_container'>
            
            <?php 
            //afficher tt les produit pour function finAll()
            $requet = $conn->prepare("SELECT * FROM product");
            $requet->execute();
            $products = $requet->fetchAll();
            foreach ($products as $product) {

                echo "<div class='card'>";
                echo "<form action='product.php?id=".$product['id']."' method='POST'>";
                echo '<label>nom:</label><br>';
                echo'<label>'.$product['name'].'</label><br>';
                echo '<label>description:</label><br>';
                echo'<label>'.$product['description'].'</label><br>';
                echo '<label>prix:</label><br>';
                echo'<label>'.$product['price'].' €</label><br>';
                echo "<button type='submit'>Ajouter au panier</button>";
                echo "</form>";
                echo '</div>';
            }
            ?>
        </div>
    </main>
</body>
</html>