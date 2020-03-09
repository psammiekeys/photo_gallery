<?php
    require_once("admin/include/initial.php");
?>
<?php
    if(isset($_GET['image_id']) && isset($_GET['user_id'])){
        $image_id = $_GET['image_id'];
        $user_id = $_GET['user_id'];

        $del = "DELETE FROM likes WHERE image_id = '$image_id' AND user_id = '$user_id'";
        mysqli_query($connection, $del);
        header("location: gallery.php#{$image_id}");
    }
?>