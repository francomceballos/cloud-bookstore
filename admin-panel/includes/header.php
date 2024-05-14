
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
</head>
<body style="font-family: 'Fira Sans', sans-serif; background-color: #F7D1CD !important;">
    <div id="wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="background-color: #330036 !important;">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo ADMINURL; ?>">ADMIN PANEL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <?php if(!isset($_SESSION['admin_name'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="http://localhost/bookstore/">Go to main page</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['admin_name']; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0;">
                                    <li><a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout-admins.php">Logout</a></li>
                                </ul>
                            </li>
                            <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="background-color: #330036; position: absolute; right: 0; top: 1; padding: 0.5rem 1rem;">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="offcanvas offcanvas-end text-light" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background-color: #330036 !important;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" style="color: white;" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <nav class="navbar navbar-light">
                    <ul class="navbar-nav">
                        <?php if(isset($_SESSION['admin_name'])): ?>
                            <li class="nav-item"><a class="btn btn-dark w-100 btn-lg mb-3" style="width: 100%; min-height: 45px;" href="<?php echo ADMINURL; ?>/index.php">Home</a></li>
                            <li class="nav-item"><a class="btn btn-dark w-100 btn-lg mb-3" style="width: 100%; min-height: 45px;" href="<?php echo ADMINURL; ?>/admins/admins.php">Admins</a></li>
                            <li class="nav-item"><a class="btn btn-dark w-100 btn-lg mb-3" style="width: 100%; min-height: 45px;" href="<?php echo ADMINURL; ?>/categories-admins/show-categories.php">Categories</a></li>
                            <li class="nav-item"><a class="btn btn-dark w-100 btn-lg mb-3" style="width: 100%; min-height: 45px;" href="<?php echo ADMINURL; ?>/products-admins/show-products.php">Products</a></li>
                            <li class="nav-item"><a class="btn btn-dark w-100 btn-lg mb-3" style="width: 100%; min-height: 45px;" href="<?php echo ADMINURL; ?>/products-admins/show-orders.php">Orders</a></li>
                            <li class="nav-item"><a class="btn btn-dark w-100 btn-lg mb-3" style="width: 100%; min-height: 45px;" href="<?php echo ADMINURL; ?>/users-admins/show-users.php">Users</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
</header>


