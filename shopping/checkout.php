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
    <div class="col-md-10 mb-4">
      <div class="card rounded-4 shadow">
        <form class="card-body" method="POST" action="charge.php">
          <div class="row">
            <div class="col-md-6">
              <div class="md-form mb-4">
                <input type="text" id="first_name" name="first_name" class="form-control validate" required>
                <label for="first_name">First Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="md-form mb-4">
                <input type="text" id="last_name" name="last_name" class="form-control validate" required>
                <label for="last_name">Last Name</label>
              </div>
            </div>
          </div>
          <div class="md-form mb-4">
            <input type="text" id="username" name="username" class="form-control validate" placeholder="Username" aria-describedby="basic-addon1" required>
            <label for="username">Username</label>
          </div>
          <div class="md-form mb-4">
            <input type="text" id="email" name="email" class="form-control validate" placeholder="youremail@example.com">
            <label for="email">Email</label>
          </div>
          <hr class="my-4">
          <button class="btn btn-outline-secondary btn-block rounded-4" type="submit">Proceed to Payment</button>
          <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-allow-remember-me="true"
                data-key="pk_test_51P8OJSP736g8Fma5G8lhVW0mB3LA9OtMFPRX8DVcCCE2RpO8Z7hCS5dRu5d0Wal3sdMcHOIaWgGwP5BCfr0LIyrY0016q3rHPu"
                data-currency="usd"
                data-label="pay now"
                data-name="Stripe Payment"
              >
              </script>
        </form>
      </div>
    </div>
    <div class="col-md-2">
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
</div>
<?php require "../includes/footer.php"; ?>