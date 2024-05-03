 <?php require '../includes/header.php'; ?>
 <?php require '../config/config.php'; ?>

<?php

    if(isset($_SESSION['username'])) {
        echo '<script> alert("You are already logged in") </script>';
        header('location: '.APPURL. "");
        
    }
    if(isset($_POST['submit'])) {
       if(empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password'])) {
           echo '<script> alert("All fields are required") </script>';
       } else {
           $username = $_POST['username'];
           $email = $_POST['email'];
           $password = $_POST['password'];

           $insert = $conn->prepare ("INSERT INTO users (username, email, mypassword) VALUES (:username, :email, :mypassword)");

           $insert->execute([
               'username' => $username,
               'email' => $email,
               'mypassword' => password_hash($password, PASSWORD_DEFAULT),
           ]);

           header('location:login.php');
       }
    }
    
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow p-3 mb-5 bg-white rounded-4 mt-5">
        <form action="register.php" method="POST" class="mt-3">
          <h4 class="text-center mt-3">Register</h4>
          <div class="form-group mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group mb-3">
            <button type="submit" class="w-100 btn btn-lg btn-dark rounded-pill" style="background-color: #0D0630" name="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require '../includes/footer.php'; ?>