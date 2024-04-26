<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../vendor/autoload.php"; ?>
<div class="container">
<?php



    /* at the top of 'check.php' */
    if ($_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
        /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
        die( header( 'location: '.APPURL.'' ));
    }

    if(!isset($_SESSION['username'])) {
        header('location: '.APPURL. "");
    }


if (isset($_POST['email'])) {
    if (empty($_POST['email']) || empty($_POST['username']) ||
        empty($_POST['first_name']) || empty($_POST['last_name'])) {
        echo '<script> alert("All fields are required") </script>';
        return;
    }

    \Stripe\Stripe::setApiKey($secretKey);

    $charge = \Stripe\Charge::create([
        'source' => $_POST['stripeToken'],
        'amount' => $_SESSION['price'] * 100,
        'currency' => 'usd',
    ]);

    $data = [
        ':email' => $_POST['email'],
        ':username' => $_POST['username'],
        ':first_name' => $_POST['first_name'],
        ':last_name' => $_POST['last_name'],
        ':token' => $_POST['stripeToken'],
        ':price' => $_SESSION['price'],
        ':user_id' => $_SESSION['user_id'],
    ];

    $insert = $conn->prepare(
        "INSERT INTO orders (email, username, first_name, last_name, token, price, user_id) 
        VALUES (:username, :email, :first_name, :last_name, :token, :price, :user_id)"
    );

    $insert->execute($data);

    header("location: " . APPURL . "/download.php");
}

