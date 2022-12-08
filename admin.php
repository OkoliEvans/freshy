
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

 if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or 
  die('query failed');

  if($delete_query){
    $message[] = 'product deleted';
    header('location:admin.php');
  } else {
    $message[] = 'product cannot be deleted';
    header('location:admin.php');
  };
 };

 if(isset($_POST['update_product'])){
  $update_prod_id = $_POST['update_prod_id'];
  $update_prod_name = $_POST['update_prod_name'];
  $update_prod_price = $_POST['update_prod_price'];
  $update_prod_image = $_FILES['update_prod_image']['name'];
  $update_prod_image_tmp_name = $_POST['update_prod_image']['tmp_name'];
  $update_prod_image_folder = 'uploaded_img/'.$update_prod_image;

  $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_prod_name',
  price = '$update_prod_price', image = '$update_prod_image' WHERE id = '$update_prod_id' ");

  if($update_query){
    move_uploaded_file($update_prod_image_tmp_name, $update_prod_image_folder);
    $message[] = 'product updated successfully';
    header('location:admin.php');
  } else {
    $message[] = 'product update failed';
    header('location:admin.php');
  }

 }

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

        <thead>
          <th>product image</th>
          <th>product name</th>
          <th>product price</th>
          <th>action</th>
        </thead>

        <tbody>
          <?php

          $select_products = mysqli_query($conn, "SELECT * FROM `products`");
          if(mysqli_num_rows($select_products) > 0){
            while($row = mysqli_fetch_assoc($select_products)){
          ?>

              <tr>
                <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                <td><?php echo $row['name'] ?></td>
                <td>N<?php echo $row['price'] ?>/-</td>
                <td> 
                  <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" 
                  onclick="return confirm('are you sure you want to delete this?');">
                  <i class="fas fa-trash"></i>delete</a>
                  <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> 
                  <i class="fas fa-edit"></i>update</a>
                </td>
              </tr>

          <?php
               };
          }else{
            echo "<div class='empty'>store is empty, add products</div>";
          };
        ?>
        </tbody>

      </table>

    </section>

    <section class="edit-form">

        <?php
        
          if(isset($_GET['edit'])){
            $edit_id = $_GET['edit'];
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
            if(mysqli_num_rows($edit_query) > 0){
              while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">

            <input type="hidden" name="update_prod_id" value="<?php echo $fetch_edit['id']; ?>">

            <input type="text" class="box" required name="update_prod_name"
            value="<?php echo $fetch_edit['name']; ?>">

            <input type="number" min="0" class="box" required name="update_prod_price"
            value="<?php echo $fetch_edit['price']; ?>">

            <input type="file" class="box" required name="update_prod_image"
            accept="image/png, image/jpg, image/jpeg">
            <input type="submit" value="update product" name="update_product" class="update-btn">
            <input type="reset" value="cancel" id="close-edit" class="option-btn">
        </form>
        
        <?php
            };
          };
          echo "<script>document.querySelector('.edit-form').style.display = 'flex';</script>";
        };
      ?>

    </section>

    </div>



  <script src="index.js"></script>
  </body>
</html>