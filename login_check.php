<?php
require_once 'Db.php';
require_once 'Customer.php';

$customer=new Customer();
$customer->signIn(new Db);

?>