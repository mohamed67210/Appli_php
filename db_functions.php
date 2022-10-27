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
            $request = $conn->query("SELECT * FROM product WHERE id ='$id' ");
            $request->execute();
            $product = $request->fetch();
            return $product;
    }

    function insertProduct($name, $descr, $price){
        
            $conn = connexion();
            // preparer la requete insert into
            $requete = $conn->prepare("INSERT INTO product (name, description, price) VALUES (:name,:descr,:price)");
            $requete-> bindValue(':name', $name);
            $requete-> bindValue(':descr', $descr);
            $requete-> bindValue(':price', $price);
            $requete->execute();
            $lastID =$conn->lastInsertId();
            return $lastID;
    }


?>