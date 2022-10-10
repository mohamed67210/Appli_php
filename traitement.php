<?php
session_start();

$action = $_GET["action"];
$id = (isset($_GET["id"])) ? $_GET["id"] : "";

switch($action) {
    case "ajouterProduit":
        if (isset($_POST['submit'])) {
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
            $succes = 'votre produit est ajouté !';
            $delete = "produit supprimé !";

            if($succes && $delete){
                $message =[
                    "succes" => $succes,
                    "delete" => $delete
                ];
                $_SESSION['messages'][] = $message;
            }
            
            if ($name && $price && $qtt) {
                $product = [
                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price * $qtt
                ];
                $_SESSION['products'][] = $product;
            }
        } 
        
        // else {
            header("Location:index.php");
        // }
    break;

    case "viderPanier":
        unset($_SESSION["products"]);
        header("Location:recap.php");
    break;

    case "upQtt":
          $_SESSION['products'][$id]['qtt']++;
         
        header("Location:recap.php");
    break;
    
    case "downQtt":
        $newQtt = $_SESSION['products'][$id]['qtt']--;
        header("Location:recap.php");
         if($newQtt == 1){
            unset($_SESSION["products"][$id]);
         }
        
    break;
    
    case "deleteProduit":
        unset($_SESSION["products"][$id]);
        header("Location:recap.php");
    break;
        
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
            <a href="recap.php"><input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="mes produits" /></a>
        </div>
        <label class="text-gray-500"> OU</label>
        <div class="px-8 pt-6 pb-8 mb-4 flex w-2/5  flex-col justify-center items-center text-center gap-4 bg-white shadow-md rounded" >
            <label class="text-gray-500">Vous pouvez rajouter un autre produit </label>
            <a href="index.php"><input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="nouveau produit" /></a>
        </div>
    </div>


</body>

</html>