<?php
// : démarrer une session sur le serveur pour l'utilisateur courant
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ajouter un produit</h1>
    <form action="traitement.php" method="POST">
        <p>
            <label>Nom du produit <input type="text" name="name" /></label>
        </p>
        <p>
            <label>Prix du produit <input type="number" step="any" name="price" /></label>
        </p>
        <p>
            <label>Quantité <input type="number" value="1" name="qtt" /></label>
        </p>
        <p>
            <input type="submit" name="submit"  value="Ajouter le produit" />
        </p>
    </form>
</body>

</html>