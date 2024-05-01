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

<div class="container">
  <h2 class="my-5 h2 text-center">Checkout</h2>
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card">
        <form class="card-body" method="POST" action="charge.php">
          <div class="row">
            <div class="col-md-6 mb-2">
              <div class="md-form">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="md-form">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="md-form mb-5">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
          </div>
          <div class="md-form mb-5">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="youremail@example.com">
          </div>
          <hr class="my-4">
          <script
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="pk_test_51P8OJSP736g8Fma5G8lhVW0mB3LA9OtMFPRX8DVcCCE2RpO8Z7hCS5dRu5d0Wal3sdMcHOIaWgGwP5BCfr0LIyrY0016q3rHPu"
            data-currency="usd"
            data-amount="<?php echo $_SESSION['price'] * 100 ?>"
            data-label="Pay Now">
          </script>
        </form>
      </div>
    </div>
    <div class="col-md-4 offset-md-1 mt-4 mt-md-0 pt-4 pt-md-0">
      <div class="p-3">
        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
        <hr class="my-4">
        <div class="summary">
          <div class="d-flex justify-content-between mb-5">
            <h5 class="text-uppercase">Total price: <?php echo $_SESSION['price']?></h5>
            <span class="full-price fw-bold"></span>
            <input class="input-price" type="hidden" name="price">
          </div>
        </div>
      </div>
    </div>
  </div>
<?php require "../includes/footer.php"; ?>