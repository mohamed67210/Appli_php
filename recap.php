<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Récapitulatif de produits</title>
</head>

<body class="h-screen">
    <header class="w-full h-10 flex  flex-row justify-center items-center ">
        <ul class="w-full h-full flex flex-row justify-around items-center bg-green-200  text-white ">

            <a href="index.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">index</li>
            </a>

            <a href="traitement.php" class="no-underline">
                <li class="w-40 text-center	rounded-sm bg-teal-300">traitement</li>
            </a>

        </ul>

    </header>
    <!-- container globale -->
    <div class="w-full h-screen flex  flex-col justify-center items-center ">
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
                "<th>Prix</th>",
                "<th>Qt</th>",
                "<th>Total</th>",
                "</tr>",
                "</thead>",
                "<tbody>";
                $totalGeneral = 0;
                foreach ($_SESSION['products'] as $index => $product) {
                    echo "<tr>",
                    "<td>" . $index . "</td>",
                    "<td>" . $product['name'] . "</td>",
                    "<td>" . number_format($product['price'], 2, ',', " ") . " €</td>",
                    "<td>" . $product['qtt'] . "</td>",
                    "<td>" . number_format($product['total'], 2, ',', " ") . " €</td>",
                    "</tr>";
                    $totalGeneral += $product['total'];
                }
                echo "<tr>",
                "<td class='table-primary'>Total general : </td>",
                "<td class='table-primary'><strong>" . number_format($totalGeneral, 2, ",", " ") . " € </strong></td>",

                "</tr>";
                echo "</tbody>",
                "</table>";
            }
            ?>
        </div>

    </div>
</body>

</html>