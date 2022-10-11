<?php
   
    
    function panier(){
        $qtt = 0;
        foreach($_SESSION['products'] as $index => $product){
            $qtt += $product['qtt'];
        }
        return $qtt;
    }
    function afficherMessage(){
        if (isset($_SESSION['messages'])){
            return $_SESSION['messages'];
        }else{
            return null;
        }
        
    }

?>