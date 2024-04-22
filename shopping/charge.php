<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../vendor/autoload.php"; ?>
<?php

    \Stripe\Stripe::setApiKey($secretKey);

    $charge = \Stripe\Charge::create([
        'source' => $_POST['stripeToken'],
        'amount' => $_SESSION['price'] * 100,
        'currency' => 'usd',
    ]);


  echo 'Payment Successful';