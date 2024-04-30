<?php require '../includes/header.php'; ?>
<?php require '../../config/config.php'; ?>


<?php

    if(!isset($_SESSION['admin_name'])) {
        header('location: '.ADMINURL. "");
        
    }

    if(isset($_POST['submit'])) {
       if(empty($_POST['admin_name']) OR empty($_POST['email']) OR empty($_POST['password'])) {
           echo '<script> alert("All fields are required") </script>';
       } else {
           $admin_name = $_POST['admin_name'];
           $email = $_POST['email'];
           $password = $_POST['password'];

           $insert = $conn->prepare ("INSERT INTO admins (admin_name, email, mypassword) VALUES (:admin_name, :email, :mypassword)");

           $insert->execute([
               'admin_name' => $admin_name,
               'email' => $email,
               'mypassword' => password_hash($password, PASSWORD_DEFAULT),
           ]);

           header('location:'.ADMINURL. "/admins/admins.php");
       }
    }
    
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="card rounded-4 shadow">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
              <form method="POST" action="create-admins.php">
                <div class="mb-4 mt-4">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="youremail@example.com" required>  
                </div>
                <div class="mb-4">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="admin_name" id="admin_name" placeholder="username" class="form-control" required>
                </div>
                <div class="mb-4">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" placeholder="password" class="form-control" required>
                </div>
                <div class="mb-4">
                  <button type="submit" name="submit" class="btn btn-primary btn-lg rounded-pill">Create</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php require '../includes/footer.php'; ?>