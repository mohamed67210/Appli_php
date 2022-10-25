<?php
 
// connexion a la base de donnée store
    $conn = new \PDO('mysql:host=localhost;dbname=store;charset=utf8', 'root', '',
    [   \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE  => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'
    ]);

    function findOneById($conn){
        $id = (isset($_GET["id"])) ? $_GET["id"] : "";
        var_dump($id);
            $request = $conn->query("SELECT * FROM product WHERE id ='$id' ");
            $request->execute();
            $products = $request->fetchAll();
            foreach ($products as $product) {
                echo '<p>'.$product["name"].'</p>';
                echo '<p>'.$product["description"].'</p>';
                echo '<p>'.$product["price"].'</p>';
            }
    }


?>