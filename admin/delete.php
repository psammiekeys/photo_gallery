<?php include"include/header.php"; 
     include "include/initial.php";

     if(isset($_GET[id])){
         $id = $_GET['id'];
     }
     
     $del1 = "DELETE FROM images WHERE id = '$id' LIMIT 1";
     $sql1 = mysqli_query($connection, $del1);

     $del2 = "DELETE FROM likes WHERE image_id = '$id' LIMIT 1";
     $sql2 = mysqli_query($connection, $del2);
     header("location: index.php");
   ?>