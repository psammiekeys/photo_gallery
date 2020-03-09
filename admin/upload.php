<?php 

        include "include/initial.php";

?>
<?php
        if(isset($_POST['submit'])) {
        if(isset($_FILES['file']) && isset($_POST['img'])){
            $img = $_FILES['file']['name'];
            $name = trim(addslashes($_POST['img']));
            $temp_name = $_FILES['file']['tmp_name'];
            $temp = move_uploaded_file($temp_name, "img/". $img);

            $sql = "INSERT INTO images SET name = '$img', custom_name = '$name'";
            mysqli_query($connection, $sql);
        }
        header("location: index.php");
        }
?>



