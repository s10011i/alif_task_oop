<?php
session_start();
class Product{
    public function displayProduct($db){
        $query="SELECT * FROM products ";
        if (!$db->display($query)){
            header('Location: index.php?product-list=empty');
            exit();
        }else{
            $_SESSION['goods']=$db->product_list;
            header('Location: product-show.php');
            exit();
            // return $db->resultset;
        }
    }


}