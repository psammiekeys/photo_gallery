<?php
    $connection = mysqli_connect("localhost", "root", "", "photo_gallery");
    if (!$connection) {
        die("connnection fail:".mysqli_error());
    }
?>