
<?php
require_once 'Db.php';
require_once 'Product.php';

$product=new Product();
$product->displayProduct(new Db);

?>   
