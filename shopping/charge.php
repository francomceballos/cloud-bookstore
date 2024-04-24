<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php require "../vendor/autoload.php"; ?>
<?php


    if(isset($_POST['email'])) {


        \Stripe\Stripe::setApiKey($secretKey);

        $charge = \Stripe\Charge::create([
            'source' => $_POST['stripeToken'],
            'amount' => $_SESSION['price'] * 100,
            'currency' => 'usd',
        ]);

        if(empty($_POST['email']) OR empty($_POST['username']) OR empty($_POST['first_name']) OR empty($_POST['last_name'])) {
            echo '<script> alert("All fields are required") </script>';
        } else {

            $email = $_POST['email'];
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $token = $_POST['stripeToken'];
            $price = $_SESSION['price'];
            $user_id = $_SESSION['user_id'];


            $insert = $conn->prepare("INSERT INTO orders ( email, username, first_name, last_name, token, price, user_id) 
            VALUES (:username, :email, :first_name, :last_name, :token, :price, :user_id)");

            $insert->execute([
                ":email" => $email,
                ":username" => $username,
                ":first_name" => $first_name,
                ":last_name" => $last_name,
                ":token" => $token,
                ":price" => $price,
                ":user_id" => $user_id
            ]);

        }
    }





  echo "payment success";