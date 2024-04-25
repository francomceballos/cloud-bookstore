<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<div class="container">
<?php


    if(isset($_POST['delete'])) {

        $id = $_POST['id'];

        $delete = $conn->prepare("DELETE FROM cart WHERE id = '$id'");
        $delete->execute();
    }
?>



</div>
<?php require "../includes/footer.php"; ?>