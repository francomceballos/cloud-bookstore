<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>


<?php


    if(isset($_POST['update'])) {

        $id = $_POST['id'];
        $prod_amount = $_POST['prod_amount'];

        $update = $conn->prepare("UPDATE cart SET prod_amount = '$prod_amount' WHERE id = '$id'");
        $update->execute();
    }
?>




<?php require "../includes/footer.php"; ?>