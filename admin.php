
<?php

 @include 'config.php';

 if(isset(  $_POST['add_prod'])){
  $prod_name = $_POST['prod_name'];
  $prod_price = $_POST['prod_price'];
  $prod_image = $_FILES['prod_image']['name'];
  $prod_image_tmp_name = $_FILES['prod_image']['tmp_name'];
  $prod_image_folder = 'uploaded_img/'.$prod_image;

  $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES
  ('$prod_name', '$prod_price', '$prod_image')") or die('query failed');

  if($insert_query){
    move_uploaded_file($prod_image_tmp_name, $prod_image_folder);
    $message[] = 'product added successfully';
  }else{
    $message[] = 'failed to add product!';
  }
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

    <title>admin</title>
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

    <section>
        <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
            <h3>add new product</h3>
            <input type="text" name="prod_name" placeholder="enter product name" class="box" required>
            <input type="number" name="prod_price" min="0" placeholder="enter product price" class="box" required>
            <input type="file" name="prod_image" accept="image/png, image/jpg, image/jpeg" placeholder="upload product image" class="box" required>
            <button type="submit" name="add_prod" class="btn">add product</button>

        </form>
    </section>

    <section class="display-product-table">

      <table>

        

      </table>

    </section>

    </div>



  <script src="index.js"></script>
  </body>
</html>