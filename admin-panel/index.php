
<?php require 'includes/header.php'; ?>
<?php require '../config/config.php'; ?>

<?php
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
              <p class="card-text">number of products: 8</p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card rounded-4 shadow">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: 4</p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card rounded-4 shadow">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: 3</p>
              
            </div>
          </div>
        </div>
      </div>
  
          
<?php require 'includes/footer.php'; ?>
