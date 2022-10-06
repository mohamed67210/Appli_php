<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de produits</title>
</head>

<body>
    <?php
    //  si la clé "products" du tableau $-session n'existe pas OU ou cette clé existe mais ne contient aucune donnée  -->

    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
        echo "<p>Aucun produit en session</p>";
    } else {
        echo "<table>",
        "<thead>",
        "<tr>",
        "<th>#</th>",
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
        "<td colsan=4>Total general : </td>",
        "<td><strong>" . number_format($totalGeneral, 2, ",", " ") . " € </strong></td>",

        "</tr>";
        echo "</tbody>",
        "</table>";
    }
    ?>
</body>

</html>