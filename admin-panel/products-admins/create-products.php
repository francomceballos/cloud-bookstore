<?php require "../includes/header.php"; ?>  
<?php require "../../config/config.php"; ?> 

<?php

      if(isset($_POST['submit'])) {
        if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price']) || empty($_POST['category_id']) || empty($_POST['category'])) {
          echo "<script>alert('one or more inputs are empty');</script>";
        } else {

          $name = $_POST['name'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $category = $_POST['category'];
          $image = $_FILES['image']['name'];
          $file = $_FILES['file']['name'];
          $category_id = $_POST['category_id'];
          $dir_img = "../../images/" . basename($image);
          $dir_fil = "../../books/" . basename($file);

          $insert = $conn->prepare("INSERT INTO products (name, description, price, category, image, file, category_id) VALUES 
          (:name, :description, :price, :category, :image , :file, :category_id)");
          $insert->execute([
            ":name" => $name,
            ":description" => $description,
            ":price" => $price,
            ":category" => $category,
            ":image" => $image,
            ":file" => $file,
            ":category_id" => $category_id
          ]);

          if(move_uploaded_file($_FILES['image']['tmp_name'], $dir_img) && move_uploaded_file($_FILES['file']['tmp_name'], $dir_fil)) {
            header("location: ".ADMINURL."/products-admins/show-products.php");
          } else {
            echo "<script>alert('image upload failed');</script>";
          }
        }
      }
?>


    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card rounded-4 shadow">
            <div class="card-body">
              <h3 class="card-title mb-5 d-inline">Create Products</h3>
              <form method="POST" action="create-products.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label><h6>Product Name</h6></label>

                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label><h6>Product Price</label>

                    <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><h6>Product Description</h6></label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1"><h6>Select Category</h6></label>
                    <select name="category" class="form-control" id="exampleFormControlSelect1">
                      <option>--select category--</option>           
                      <option value="Programming">Programming</option>
                      <option value="Design">Design</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlSelect1"><h6>Select Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                      <option>--select category--</option>           
                      <option value="1">Programming</option>
                      <option value="2">Design</option>
                    </select>
                  </div>

                <div class="form-outline mb-4 mt-4">
                    <label><h6>Product Image</h6></label>

                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label><h6>Product File</h6></label>
                    <input type="file" name="file" id="form2Example1" class="form-control" placeholder="file" />
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>


<?php require "../includes/footer.php"; ?>