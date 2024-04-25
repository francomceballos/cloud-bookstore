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
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="form-control mt-5" method="POST" action="login.php">
                    <h4 class="text-center mt-3">Login</h4>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" required>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" name="submit" type="submit">Login</button>
                </form>
            </div>
        </div>
</div>
<?php require '../includes/footer.php'; ?>