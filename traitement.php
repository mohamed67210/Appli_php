<?php 
session_start();

if (isset($_POST['submit'])) 
{
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    // var_dump($name);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    // var_dump($price);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
    // var_dump($qtt);
    if($name && $price &&$qtt){
        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price * $qtt
        ];
        $_SESSION['products'][] = $product;
    }
}
else{
    header("Location:index.php");
}

?>