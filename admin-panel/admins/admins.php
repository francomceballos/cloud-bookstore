<?php  require '../includes/header.php'; ?>
<?php  require '../../config/config.php'; ?>

<?php

    $select = $conn->query("SELECT * FROM admins");
    $select->execute();

    $admins = $select->fetchAll(PDO::FETCH_OBJ);


?>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card rounded-4 shadow">
                    <div class="card-body">
                        <h3 class="card-title mb-5 d-inline">Admins</h3>
                        <a href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 float-end btn-lg rounded-pill">Create Admins</a>
                        <table class="table mb-5 table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Admin Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($admins as $admin): ?>
                                <tr>
                                    <th scope="row"><?php echo $admin->id; ?></th>
                                    <td><?php echo $admin->admin_name; ?></td>
                                    <td><?php echo $admin->email; ?></td>
                                </tr>
                            <?php endforeach; ?>    
                            </tbody>
                          
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php  require '../includes/footer.php'; ?>