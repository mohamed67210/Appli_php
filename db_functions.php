<?php
 
// connexion a la base de donnée store
function connexion(){
    $conn = new \PDO('mysql:host=localhost;dbname=store;charset=utf8', 'root', '',
    [   \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE  => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'
    ]);
    return $conn;
}
    function findAll(){
        $conn = connexion();
        $requet = $conn->prepare("SELECT * FROM product");
        $requet->execute();
        $products = $requet->fetchAll();
        return $products;
    }
    function findOneById($id){
        $conn = connexion();
        // $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        // var_dump($id);
            $request = $conn->query("SELECT * FROM product WHERE id ='$id' ");
            $request->execute();
            $product = $request->fetch();
            return $product;
    }

    function insertProduct($name, $descr, $price){
        $conn = connexion();
        $requete = $conn->prepare("INSERT INTO livre ('name', 'description', 'price') VALUES ($name ,$descr,$price)");
    }


?>