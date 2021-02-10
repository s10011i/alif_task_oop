
<?php include 'inc/header.php'; ?>  

    <section class="main-container">
        <div class="main-wrapper">
            <h2>Home</h2>
            <?php
            if (isset($_SESSION['email'])){
                header('Location: products.php');
                // echo $_SESSION['id'];
                // echo $_SESSION['email'];
                
            }
             ?>

        </div>
    </section>

<?php include 'inc/footer.php'; ?> 
