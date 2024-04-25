<?php require 'includes/header.php'; ?>   
<?php require 'config/config.php'; ?>
<?php

        $rows = $conn->query("SELECT * FROM products WHERE status = 1");
        $rows->execute();

        $allRows = $rows->fetchAll(PDO::FETCH_OBJ);
 ?>
 <div class="container">
        <div class="row mt-5">
        <?php foreach ($allRows as $product): ?>
            <div class="col-md-3 offset-md-0 offset-sm-1">
                <div class="card shadow rounded mb-5">
                    <img 
                        height="200px" 
                        src="<?php echo APPURL; ?>/images/<?php echo $product->image; ?>" 
                        class="card-img-top" 
                    >
                    <div class="card-body">
                        <h5 class="d-inline"><b><?php echo $product->name; ?></b></h5>
                        <h5 class="d-inline text-muted">
                            <div>(<?php echo $product->price; ?>$/item)</div>
                        </h5>
                        <p><?php echo substr($product->description, 0, 100) . '...'; ?></p>
                        <a 
                            href="<?php echo APPURL; ?>/shopping/single.php?id=<?php echo $product->id; ?>" 
                            class="btn btn-primary w-100 rounded my-2"
                        >
                            More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        <br>
        <?php endforeach; ?>
        </div>
        </div>
        <?php require 'includes/footer.php'; ?>
