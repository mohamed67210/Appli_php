<?php
session_start();
include 'db_functions.php';
$action = (isset($_GET["action"])) ? $_GET["action"] : "";
$id = (isset($_GET["id"])) ? $_GET["id"] : "";
$Qtt = (isset($_GET["qtt"])) ? $_GET["qtt"] : "";

switch ($action) {
    case "ajouterProduit":
        if (isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            $succes = 'votre produit est ajouté !';
            $delete = "produit supprimé !";

            if ($name && $description && $price && $qtt) {
                $product = [
                    "name" => $name,
                    "description" => $description,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price * $qtt
                ];
                $_SESSION['products'][] = $product;
            }
        }
        $_SESSION['messages'] = 'le produit est bien enregistré !';

        // else {
        header("Location:admin.php");
        // }

        break;
    case "utilisateurAjouterProduit":
        $product = findOneById($id);
        if (isset($_GET['id'])) {
            $product = findOneById($id);
            
            
            foreach ($_SESSION["products"] as $index=> $productInSession) {
                if ($productInSession['bddId']==$product['id']) {
                    return header("location:traitement.php?action=upQtt&id=".$index."");
                }
            }
            
            $product = [
                "name" => $product['name'],
                "description" => $product['description'],
                "price" => $product['price'],
                "qtt" => 1,
                "bddId"=> $product['id']
            ];
            $_SESSION['products'][] = $product;
            $_SESSION['messages'] = 'le produit est bien enregistré !';
            header("Location:index.php");
            var_dump($product['name']);
        }
        break;
    
    case "ajouterProduitBdd":
        if (isset($_POST['submit'])) {

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $descr = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        if($name && $descr && $price ){
            insertProduct($name, $descr, $price);
            $id = insertProduct($name, $descr, $price);
            var_dump($id);

            header("Location:product.php?id=".$id."");
            // header("Location:index.php");
        }else {
            echo 'erreur';
        }
    }
        break;

    case "viderPanier":
        unset($_SESSION["products"]);
        header("Location:recap.php");
        $_SESSION['messages'] = 'Le panier est vidé !';
        break;

    case "upQtt":
        $_SESSION['products'][$id]['qtt']++;
        header("Location:recap.php");
        break;

    case "downQtt":
        $newQtt = $_SESSION['products'][$id]['qtt']--;
        header("Location:recap.php");
        if ($newQtt == 1) {
            unset($_SESSION["products"][$id]);
        }

        break;

    case "deleteProduit":
        unset($_SESSION["products"][$id]);
        header("Location:recap.php");
        $_SESSION['messages'] = 'Le produit est bien supprimé !';

        break;
}


?>
<!DOCTYPE html>
<html lang="en">

<!-- <head>
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
            <a href="recap.php"><input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="mes produits" /></a>
        </div>
        <label class="text-gray-500"> OU</label>
        <div class="px-8 pt-6 pb-8 mb-4 flex w-2/5  flex-col justify-center items-center text-center gap-4 bg-white shadow-md rounded" >
            <label class="text-gray-500">Vous pouvez rajouter un autre produit </label>
            <a href="admin.php"><input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="nouveau produit" /></a>
        </div>
    </div>


</body> -->

</html>