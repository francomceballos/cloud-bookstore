<?php include '../includes/header.php'; ?>
<?php include '../../config/config.php'; ?>


<?php

    if(isset($_SESSION['admin_name'])) {
        header('location: '.ADMINURL. "");
    }

    if(isset($_POST['submit'])) {
       if(empty($_POST['email']) OR empty($_POST['password'])) {
           echo '<script> alert("All fields are required") </script>';
       } else {

           $email = $_POST['email'];
           $password = $_POST['password'];

           $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
           $login->execute();

           $fetch = $login->fetch(PDO::FETCH_ASSOC);

           if($login->rowCount() > 0) {
               if(password_verify($password, $fetch['mypassword'])) {
                   $_SESSION['admin_name'] = $fetch['admin_name'];
                   $_SESSION['admin_id'] = $fetch['id'];

                   header('location: '.ADMINURL. "");
               } else {
                   echo '<script> alert("Incorrect password") </script>';
               }
           }else {
               echo '<script> alert("User does not exist") </script>';
           }
       }
    }

?>



<div class="container-fluid"> 
  <div class="row">
    <div class="col">
      <div class="card rounded-4 shadow">
        <div class="card-body">
          <h5 class=" mt-5 text-center mb-4">Login</h5>
          <form method="POST" action="login-admins.php" class="p-4">
            <div class="form-outline mb-4">
              <input 
                type="email" 
                class="form-control" 
                id="email" 
                name="email" 
                placeholder="Email" 
                required
              >
            </div>
            <div class="form-outline mb-4">
              <input 
                type="password" 
                class="form-control" 
                id="password" 
                name="password" 
                placeholder="Password" 
                required
              >
            </div>
            <button 
              type="submit" 
              name="submit" 
              class="btn btn-primary w-100 mb-4"
            >
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php include '../includes/footer.php'; ?>