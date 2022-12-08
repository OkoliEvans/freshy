<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

  if(mysqli_num_rows($select_cart) > 0) {
    $message[] = 'product already added to cart';
  } else {
    $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity)
    VALUES('$product_name','$product_price','$product_image','$product_quantity')");
    $message[] = 'item added to cart';
  };
  
};

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./scss/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <title>freshy:products</title>
  </head>
  <body>

      
    <?php
    
    if(isset($message)) {
      foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span>
        <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i></div>';
      }
    };
  
  ?>

  <?php include 'header.php'; ?>

  <div class="container">

    <section class="products">

      <h1 class="heading">most popular dishes</h1>

      <div class="box-container">

        <?php
        
        $select_products = mysqli_query($conn, "SELECT * FROM `products`");
        if(mysqli_num_rows($select_products) > 0) {
          while($fetch_product = mysqli_fetch_assoc($select_products)){
        ?>

        <form action="" method="post">
          <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">N<?php echo $fetch_product['price']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="cart-btn btn" value="add to cart" name="add_to_cart">
          </div>
        </form>

        <?php
            };
          };
        ?>

      </div>

    </section>

  </div>
  
  <!-- Footer -->
  <div> 
    <section class="footer" id="footer">
      <div class="box-container">
        <div class="box location">
          <h3>Available locations</h3>
          <p>Awka</p>
          <p>Onitsha</p>
        </div>

        <div class="box">
          <h3>Links</h3>
          <a href="#">home</a>
          <a href="#about">about</a>
          <a href="vendor.html">vendor</a>
          <a href="#review">reviews</a>
          <a href="#order">order</a>
        </div>

        <div class="box">
          <h3>Contact info</h3>
          <a href=""><i class="fa-solid fa-phone-volume"></i> 0703-759-8977</a>
          <a href="mailto:hello@freshy.com"><i class="fa-solid fa-envelope"></i> hello@freshy.com</a>
        </div>

        <div class="box">
          <h3>Follow us</h3>
          <div class="follow">
            <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-tiktok"></i></a>
          </div>
          <div class="app-download">
            <h4>Download app</h4>
            <div class="app-img">
             <a href=""><img src="./assets/Google-Play-vs-Apple-Store-2.png" alt=""></a> 
            </div>
          </div>
        </div>
      </div>

      <div class="credit">copyright &copy; 2022, <span>Freshy</span></div>
    </section>
  </div>

  <script src="index.js"></script>
  </body>
</html>
