<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php 

  if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: cart.php');
    exit;
  }


  if(!isset($_SESSION['username'])) {
    header("location: ".APPURL."");
  }


?>

<div class="container mt-5 mb-5">
  <h2 class="my-5 h2 text-center">Checkout</h2>
  <form class="card-body row" method="POST" action="charge.php">
    <div class="col-md-10 mb-4">
      <div class="card rounded-4 shadow">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="md-form mb-4">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control validate" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="md-form mb-4">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control validate" required>
              </div>
            </div>
          </div>
          <div class="md-form mb-4">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control validate" placeholder="Username" aria-describedby="basic-addon1" required>
          </div>
          <div class="md-form mb-4">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control validate" placeholder="youremail@example.com">
          </div>
          <div class="d-flex justify-content-center mb-4 mt-4 pt-1 pb-1 ">
            <script
              src="https://checkout.stripe.com/checkout.js"
              class="stripe-button"
              data-allow-remember-me="true"
              data-key="pk_test_51P8OJSP736g8Fma5G8lhVW0mB3LA9OtMFPRX8DVcCCE2RpO8Z7hCS5dRu5d0Wal3sdMcHOIaWgGwP5BCfr0LIyrY0016q3rHPu"
              data-currency="usd"
              data-amount="<?php echo $_SESSION['price'] * 100?>"
              data-name="Stripe Payment">
            </script>
          </div>
        </div>      
      </div>
    </div>
    <div class="col-md-2">
      <div class="p-3">
        <h1 class="fw-bold mb-5 mt-2 pt-1">Summary</h1>
        <hr class="my-4">
        <div class="summary">
          <div class="">
            <h3 class="text-uppercase text-center"> Total price:</h3>
            <h3 class="text-uppercase text-center fw-bold"><?php echo $_SESSION['price']?>$</h3>
            <input class="input-price" type="hidden" name="price" value="<?php echo $_SESSION['price'] * 100?>">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<?php require "../includes/footer.php"; ?>