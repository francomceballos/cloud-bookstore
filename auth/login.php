<?php require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>

<?php

    if(isset($_SESSION['username'])) {
        echo '<script> alert("You are already logged in") </script>';
        header('location: '.APPURL. "");
        
    }
    if(isset($_POST['submit'])) {
       if(empty($_POST['email']) OR empty($_POST['password'])) {
           echo '<script> alert("All fields are required") </script>';
       } else {
           $email = $_POST['email'];
           $password = $_POST['password'];

           $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
           $login->execute();

           $fetch = $login->fetch(PDO::FETCH_ASSOC);

           if($login->rowCount() > 0) {
               if(password_verify($password, $fetch['mypassword'])) {
                   $_SESSION['username'] = $fetch['username'];
                   $_SESSION['user_id'] = $fetch['id'];
                   header('location: '.APPURL. "");
               } else {
                   echo '<script> alert("Incorrect password") </script>';
               }
           }else {
               echo '<script> alert("User does not exist") </script>';
           }
       }
    }

?>
<div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <form class="form-control mt-5 border  rounded-4 shadow" method="POST" action="login.php">
                    <h3 class="text-center mt-3">Login</h3>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label"><h6>Email</h6></label>
                        <input type="email" name="email" class="form-control" placeholder=" Please insert your email" id="inputEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label"><h6>Password</h6></label>
                        <input type="password" name="password" class="form-control" placeholder="Please insert your password" id="inputPassword" required>
                    </div>
                    <div class="d-flex justify-content-center mb-3 mt-5">
                        <button class="w-50 btn btn-dark" style="background-color: #384E77; margin-bottom: 5px; margin-top: 5px" name="submit" type="submit">Login</button>
                    </div>
            </div>
        </div>
</div>
<?php require '../includes/footer.php'; ?>