<?php require '../includes/header.php'; ?>
<?php require '../config/config.php'; ?>

<?php


    $select = $conn->query("SELECT * FROM categories");
    $select->execute();
    $allCategories = $select->fetchAll(PDO::FETCH_OBJ);



?>

    <div class="container">  
        <div class="row mt-5">
            <div class="row">
                <?php foreach ($allCategories as $category): ?>
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mb-4">
                        <div class="card h-100 shadow rounded-4" >
                            <img 
                                src="../images/<?php echo $category->image; ?>" 
                                class="card-img-top h-100" 
                                style="object-fit: cover;" 
                                height="213px" 
                                alt="<?php echo $category->name; ?> image">
                            <div class="card-body d-flex flex-column" >
                                <h5 class="card-title"><b><?php echo $category->name; ?></b> </h5>
                                <p class="card-text"><?php echo substr($category->description , 0 , 300) . ' ...'; ?></p> 
                                <a 
                                    href="<?php echo APPURL; ?>/categories/single-category.php?id=<?php echo $category->id; ?>" 
                                    class="btn btn-primary w-100 rounded my-2">
                                    Discover Products
                                </a>      
                            </div>
                        </div>          
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


<?php require '../includes/footer.php'; ?>