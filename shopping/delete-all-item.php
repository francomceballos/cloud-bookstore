<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<div class="container">
<?php


    if(isset($_POST['delete'])) {

        $delete = $conn->prepare("DELETE FROM cart WHERE user_id = '$_SESSION[user_id]'");
        $delete->execute();
    }
?>

</div>
<?php require "../includes/footer.php"; ?>