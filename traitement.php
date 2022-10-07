<?php
session_start();

if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    // var_dump($name);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    // var_dump($price);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
    // var_dump($qtt);
    if ($name && $price && $qtt) {
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt
        ];
        $_SESSION['products'][] = $product;
    }
} else {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Traitement du produit</title>
</head>

<body>
    <div class="w-full h-screen flex  flex-row justify-around items-center bg-green-300">
        <div class="px-8 pt-6 pb-8 mb-4 flex w-2/5  flex-col justify-center items-center text-center gap-4 bg-white shadow-md rounded" >
            <label class="text-gray-500">Vous pouvez voir votre panier en cliquant sur ce bouton </label>
            <a href="recap.php" target="_blank" rel="noopener noreferrer"><input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="mes produits" /></a>
        </div>
        <label class="text-gray-600"> OU</label>
        <div class="px-8 pt-6 pb-8 mb-4 flex w-2/5  flex-col justify-center items-center text-center gap-4 bg-white shadow-md rounded" >
            <label class="text-gray-500">Vous pouvez rajouter un autre produit </label>
            <a href="index.php" target="_blank" rel="noopener noreferrer"><input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="nouveau produit" /></a>
        </div>
    </div>


</body>

</html>