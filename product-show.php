<?php include 'inc/header.php';?>

<section class="main-container">
    <div class="main-wrapper">
        <h2 style="color:#6cb2eb">Products Page</h2>
            <?php foreach($_SESSION['goods'] as $product):?>
                <div>
                    <img src="product-images/<?=$product['product_name']; ?>.jpg" alt="">
                    <h3><?=$product['product_name']; ?></h3>
                    <h4>Price:<?php echo $product['price']; ?></h4>
                    <a href="purchase.php?id=<?php echo $product['id']; ?>"><button>Purchase</button></a>
                </div>
                <hr>
            <?php endforeach;?>
    </div>
</section>

<?php include 'inc/footer.php'; ?> 