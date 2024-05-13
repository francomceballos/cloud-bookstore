
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
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="<?php echo ADMINURL; ?>/styles/style.css" rel="stylesheet">
</head>
<body style="font-family: 'Fira Sans', sans-serif; background-color: #F7D1CD !important;">
<div id="wrapper">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="background-color: #330036 !important;">
        <div class="container">
            <a class="navbar-brand" href="<?php echo ADMINURL; ?>">ADMIN PANEL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <?php if(isset($_SESSION['admin_name'])): ?>
                    <ul class="navbar-nav side-nav me-auto mt-1 d-flex flex-wrap" style="background-color: #330036 !important;">
                        <li class="nav-item w-100 d-flex justify-content-center">
                            <a class="btn btn-light text-white w-75 mt-3 rounded-pill btn-lg" style="background-color: #64355C;" href="<?php echo ADMINURL; ?>/index.php">Home</a>
                        </li>
                        <li class="nav-item w-100 d-flex justify-content-center">
                            <a class="btn btn-light text-white w-75 mt-3 rounded-pill btn-lg" style="background-color: #64355C;" href="<?php echo ADMINURL; ?>/admins/admins.php">Admins</a>
                        </li>
                        <li class="nav-item w-100 d-flex justify-content-center">
                            <a class="btn btn-light text-white w-75 mt-3 rounded-pill btn-lg" style="background-color: #64355C;" href="<?php echo ADMINURL; ?>/categories-admins/show-categories.php">Categories</a>
                        </li>
                        <li class="nav-item w-100 d-flex justify-content-center">
                            <a class="btn btn-light text-white w-75 mt-3 rounded-pill btn-lg" style="background-color: #64355C;" href="<?php echo ADMINURL; ?>/products-admins/show-products.php">Products</a>
                        </li>
                        <li class="nav-item w-100 d-flex justify-content-center">
                            <a class="btn btn-light text-white w-75 mt-3 rounded-pill btn-lg" style="background-color: #64355C;" href="<?php echo ADMINURL; ?>/products-admins/show-orders.php">Orders</a>
                        </li>
                        <li class="nav-item w-100 d-flex justify-content-center">
                            <a class="btn btn-light text-white w-75 mt-3 rounded-pill btn-lg" style="background-color: #64355C;" href="<?php echo ADMINURL; ?>/users-admins/show-users.php">Users</a>
                        </li>
                    </ul>

                <?php endif; ?>
                <ul class="navbar-nav ms-auto">
                    <?php if(!isset($_SESSION['admin_name'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/bookstore/">Go to main page
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['admin_name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout-admins.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


