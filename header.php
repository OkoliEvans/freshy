<header class="header">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="flex">

            <i class="fas fa-utensils" id="logo" class="p-30" ></i>
            <span class="logo-text"><a href="#">Freshy</a></span>
       
        <nav class="navBar">
            <a href="products.php">products</a>
            <a href="admin.php">vendor</a>
            
        </nav>

        <?php
        
        $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);
        
        ?>

        <a href="cart.php" class="cart"><i class="fas fa-shopping-cart"></i><span><?php echo $row_count; ?></span></a>

        <div id="menu-btn" class="fas fa-bars"></div>

    </div>

    <script src="index.js"></script>
</header>