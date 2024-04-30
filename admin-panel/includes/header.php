
<?php

    session_start();

    define("ADMINURL", "http://localhost/bookstore/admin-panel");

    $conn = mysqli_connect("localhost","root","","bookstore");

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <link href="<?php echo ADMINURL; ?>/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">ADMIN PANEL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
      <?php if(isset($_SESSION['admin_name'])): ?>
        <ul class="navbar-nav side-nav">
          <?php $menuItems = [
            ['href' => ADMINURL . '/index.php', 'label' => 'Home'],
            ['href' => ADMINURL . '/admins/admins.php', 'label' => 'Admins'],
            ['href' => ADMINURL . '/categories-admins/show-categories.php', 'label' => 'Categories'],
            ['href' => ADMINURL . '/products-admins/show-products.php', 'label' => 'Products'],
          ]; ?>
          <?php foreach ($menuItems as $item): ?>
            <li class="nav-item">
              <a class="nav-link text-white" style="margin-left: 20px;" href="<?php echo $item['href']; ?>"><?php echo $item['label']; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>

      <?php endif; ?>
        <ul class="navbar-nav ms-auto">
        <?php if(!isset($_SESSION['admin_name'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/login-admins.php">login
              <span class="sr-only">(current)</span>
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['admin_name']; ?>
            </a>
            <div class="dropdown-menu dropdown-animated" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout-admins.php">Logout</a>
            </div><!-- dropdown-menu -->
          </li><!-- nav-item -->
        <?php endif; ?>                           
        </ul>
      </div>
    </div>
    </nav>


