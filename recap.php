<?php
session_start();
include'functions.php';
// fonction pour supprimer tt les elements du tableau
function delete_all(){
    unset($_SESSION['products']);
}
if (isset($_GET['delete'])) {
    delete_all();
  }
// fonction pour supprimer un seul produit quand va appeler par la suite 
function delete_product($index){
    unset($_SESSION['products'][$index]);
}
// quand on recoie le numero de l'index on supprime le produit avec l'index recu
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    delete_product($index);
    // var_dump($index);
  }
// changer le contenu du bouton supprimer tout en fonction des produit 
  function supprimerAll(){
    if (empty($_SESSION['products'])) {
        echo "pas de produit !";
    } else {
        echo "Supprimer tout";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Récapitulatif de produits</title>
</head>

<body class="h-screen flex  flex-col ">
    <header class="w-full h-10 flex  flex-row justify-around items-center bg-green-200  ">
        <ul class=" h-full flex flex-row justify-around items-center gap-5 text-white ">

            <a href="index.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">index</li>
            </a>
            <!-- <a href="traitement.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">traitement</li>
            </a> -->
        </ul>
        <a class="w-40 text-center text-white rounded-sm bg-teal-300" href="recap.php" class="no-underline">
            <i class="fa-solid fa-basket-shopping "> <?php if (empty($_SESSION['products']))  {echo "vide";}else{ echo panier();} ?></i>
        </a>
        <a href="traitement.php?action=viderPanier">Vider panier</a>
    </header>
    <!-- container globale -->
    <div class="w-full h-screen flex  flex-col justify-center items-center py-7 bg-teal-300 ">
        <div><?php  echo afficherMessage();unset($_SESSION['messages']);?></div>
        <!-- tableau container -->
        <div class="mt-5">
            <?php
            //  si la clé "products" du tableau $-session n'existe pas OU ou cette clé existe mais ne contient aucune donnée  -->
            if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                echo "<p>Aucun produit en session</p>";
            } else {
                echo "<table class='table table-striped table-dark'>",
                "<thead>",
                "<tr>",
                "<th>ID</th>",
                "<th>Nom</th>",
                "<th>Description</th>",
                "<th>Prix</th>",
                "<th>Qt</th>",
                "<th>Total</th>",
                "<th></th>",
                "</tr>",
                "</thead>",
                "<tbody>";
                $totalGeneral = 0;
                foreach ($_SESSION['products'] as $index => $product) {
                    $newTotal = $product['qtt'] * $product['price'];
                    echo "<tr>",
                    "<td>" . $index . "</td>",
                    "<td>" . $product['name'] . "</td>",
                    "<td>" . $product['description'] . "</td>",
                    "<td>" . number_format($product['price'], 2, ',', " ") . " €</td>",
                    "<td><a href='traitement.php?action=downQtt&id=$index'><i class='fa-solid fa-minus'></i></a>" . $product['qtt'] . "<a href='traitement.php?action=upQtt&id=$index'><i class='fa-solid fa-plus'></i></td></a></td>",
                    "<td>" . number_format($newTotal, 2, ',', " ") . " €",
                    "<td>
                    <a class='btn btn-danger' href='traitement.php?action=deleteProduit&id=$index'>supprimer</a>
                     </td>",
                    "</tr>";
                     $totalGeneral += $newTotal;
                }
                echo "<tr>",
                "<td class='table-primary'colspan=4>Total general : </td>",
                "<td class='table-primary' ><strong>" . number_format($totalGeneral, 2, ",", " ") . " € </strong></td>",

                "</tr>";
                echo "</tbody>",
                "</table>";
            }
            ?>
        </div>
        
    </div>
    <script src="js/script.js"></script>
</body>

</html>