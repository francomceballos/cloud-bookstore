<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

        $select = $conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
        $select->execute();
        $allProducts = $select->fetchAll(PDO::FETCH_OBJ);

        $zipname = 'bookstore.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        foreach ($allProducts as $product) {
            $zip->addFile("books/".$product->product_file);
        }
        $zip->close();

        ob_clean();
        ob_end_flush();
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: application/zip;\n');
        header("Content-Transfer-Encoding: Binary");
        header("Content-Disposition: attachment; filename=\"".basename($zipname)."\"");
        readfile($zipname);
        unlink($zipname);

        $select = $conn->query("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
        $select->execute();
