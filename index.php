<?php
// include 'db_functions.php';
include 'traitement.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>store</title>
</head>
<body>
<header class="w-full h-10 flex  flex-row justify-around items-center bg-green-300 ">
        <ul class=" h-full flex flex-row justify-around items-center gap-5 text-white ">
            <a href="index.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">index</li>
            </a>
            <a href="admin.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">admin</li>
            </a>
        </ul>
        <a class="w-40 text-center text-white rounded-sm bg-teal-300" href="recap.php" class="no-underline">
            <i class="fa-solid fa-basket-shopping "> <?php if (empty($_SESSION['products']))  {echo "vide";}else{ echo count($_SESSION['products']);} ?></i>
        </a>
        
    </header>
    <div class="text-green-500 "><?php  echo afficherMessage(); unset($_SESSION['messages']);?></div>
    <main id='globale_container'>
        <div id='cards_container'>
            <?php 
            //afficher tt les produit pour function finAll()
            $products = findAll();
            foreach ($products as $product) {
                $id = $product['id'];
                echo "<div class='card'>";
                echo"<a style='color:blue' href=product.php?id=".$id.">Afficher produit<a><br>";
                // echo "<form action='product.php?id=".$product['id']."' method='POST'>";
                echo '<label>nom:</label><br>';
                echo'<label>'.$product['name'].'</label><br>';
                echo '<label >description:</label><br>';
                echo"<label class='description' >".$product['description'].'</label><br>';
                echo '<label>prix:</label><br>';
                echo'<label>'.$product['price'].' €</label><br><br><br>';
                echo"<a style='color:green' href=traitement.php?action=utilisateurAjouterProduit&id=".$id.">Ajouter au panier<a><br>";
                // echo "<center><button type='submit'>Afficher produit</button></center>";
                // echo "</form>";
                echo '</div>';
            }
            ?>
        </div>
        
    </main>
</body>
</html>