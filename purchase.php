<?php 
include 'inc/header.php';
require_once 'Db.php';
$db=new Db();
// get product details
$id=$_GET['id'];
// create query
$query="SELECT * FROM products WHERE id=".$id;
// 
if (!$db->login($query)){
    header('Location: index.php?specific=error');
    exit();
}else{
    $product_id=$db->resultset['id'];
    $product_name=$db->resultset['product_name'];
    $product_price=$db->resultset['price'];
}
// get customer details
$customer_id=$_SESSION['id'];
$customer_email=$_SESSION['email'];

$query_transaction="INSERT INTO transactions (customer_id,product_id,product_name,product_price) VALUES ('$customer_id','$product_id','$product_name','$product_price')";
if ($db->register($query_transaction)){
    include "classes/class.phpmailer.php";
    include "classes/class.smtp.php";

    $mail = new PHPMailer; 
    $mail->IsSMTP(); 
    $mail->SMTPDebug = 1; 
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; 
    $mail->IsHTML(true);

    $mail->Username = "xxxxx@gmail.com";
    $mail->Password = "xxxxx";
    $mail->setFrom('xxxxx@gmail.com', 'Sadi');
    $mail->Subject = 'Alif sarmoya task';
    $mail->Body = 'u bought'.$product_name.' price: '.$product_price;
    $mail->addAddress($customer_email, 'alif capital'); 
    if(!$mail->Send()){
        echo "Mail not sent...Mailer Error: " . $mail->ErrorInfo;
    }else{
        echo "Mail has been sent";
    }
    // to errorhoro nishon bta....dar poyon
    // echo "<script>window.alert('Transaction data has been saved sucessfully')
    // window.location='product.php'</script>";
    }else{
    echo '<script>window.alert("Transaction could not success")
    window.location="index.php"</script>ERROR: '.mysqli_error($conn);
    // header('Location: index.php');
}

include 'inc/footer.php'; 
?> 

