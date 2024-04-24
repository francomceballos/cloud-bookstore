<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

      <!-- Heading -->

      <h2 class="my-5 h2 text-center">Checkout</h2>

      <!--Grid row-->
      <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body" method="POST" action="charge.php">

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form">
                    <label for="firstName" class="">First name</label>
                    <input type="text" name="first_name" id="firstName" class="form-control" required>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <label for="lastName" class="">Last name</label>
                    <input type="text" name="last_name" id="lastName" class="form-control" required>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <div class="md-form mb-5">
                <label for="username" class="">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="basic-addon1" required>
              </div>

              <!--email-->
              <div class="md-form mb-5">
                <label for="email" class="">Email (optional)</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="youremail@example.com">
              </div>
            
                <hr class="mb-4">
                <script
                  src="https://checkout.stripe.com/checkout.js"
                  class="stripe-button"
                  data-key="pk_test_51P8OJSP736g8Fma5G8lhVW0mB3LA9OtMFPRX8DVcCCE2RpO8Z7hCS5dRu5d0Wal3sdMcHOIaWgGwP5BCfr0LIyrY0016q3rHPu"
                  data-currency="usd"
                  data-amount="<?php echo $_SESSION['price'] * 100 ?>"
                  data-label="Pay Now"
                  >
                </script>

            </form>

          </div>
         
        </div>

<?php require "../includes/footer.php"; ?>