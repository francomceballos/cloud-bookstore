
<?php require 'includes/header.php'; ?>
<?php require '../config/config.php'; ?>


<?php

    $products = $conn->query("SELECT COUNT(*) as products_count FROM products");
    $products-> execute();
    $allProducts = $products->fetch(PDO::FETCH_OBJ);


    $categories = $conn->query("SELECT COUNT(*) as categories_count FROM categories");
    $categories-> execute();
    $allCategories = $categories->fetch(PDO::FETCH_OBJ);


    $admins = $conn->query("SELECT COUNT(*) as admins_count FROM admins");
    $admins-> execute();
    $allAdmins = $admins->fetch(PDO::FETCH_OBJ);



    if(!isset($_SESSION['admin_name'])) {
      header('location: '.ADMINURL. "/admins/login-admins.php");
      
  }

?>


    <!-- admin-panel/index.html -->
    <div class="container-fluid">
            
      <div class="row">
        <div class="col-md-4">
          <div class="card rounded-4 shadow">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <p class="card-text">number of products: <?php echo $allProducts->products_count ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card rounded-4 shadow">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $allCategories->categories_count ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card rounded-4 shadow">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $allAdmins->admins_count ?></p>
              
            </div>
          </div>
        </div>
      </div>
  
          
<?php require 'includes/footer.php'; ?>
