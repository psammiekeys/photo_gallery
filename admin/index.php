<?php include"include/header.php";
     include "include/initial.php";

     if(!isset($_SESSION['id'])){
         header("location:../index.php");
     }
?>
<body>

<div class="wrapper">
        <div class="banner-container">
           <h2 class="banner"><i>Admin</i></h2>
           <div class="actions">
           <form action="upload.php" method ="post" enctype ="multipart/form-data">
            <input class="input" type="text" placeholder="Custom image name" name="img" require>
            <input id="file" type="file" name="file" require>
            <button type ="submit" style="border:none;" name ="submit"><i id="post" class="fa fa-angle-double-right"></i></button>
            <a href="../logout.php"><i id="logout" class="fa fa-power-off"></i></a>
            </form>
           </div>
        </div>
        <div class="pictures">
           
                <?php
                    $sel = "SELECT * FROM images ORDER BY id DESC";
                    $sql = mysqli_query($connection, $sel);
                    if(mysqli_num_rows($sql) > 0){
                    while($fetch = mysqli_fetch_array($sql)){
                ?>
                    <div class= "container">
                    <div class="picture">
                        <a href="image.php?id=<?php echo $fetch['id'];?>" style="text-decoration:none;">
                            <img class="img" src="img/<?php echo $fetch['name']; ?>" alt= "image">
                            <span class="custom-name"><?php echo $fetch['custom_name']; ?></span>
                        </a>
                    </div>
                <div class="likes">
                <i id="like-list" class="fa fa-thumbs-up"> &nbsp;
                        <?php
                            $sel1 = "SELECT * FROM likes WHERE image_id = '{$fetch['id']}'";
                            $sql1 = mysqli_query($connection, $sel1);
                            if(mysqli_num_rows($sql1) > 0){
                                $likes = 0;
                                while($fetch = mysqli_fetch_array($sql1)){
                                $likes++;
                                }
                                echo $likes;
                                 }else{
                                     $likes = "";
                                 }
                            
                        ?>
            </i>
                </div>
                <div class="delete">
                    <a href="delete.php?id=<?php echo $fetch['id']; ?>">
                    <i id="delete-list" class="fa fa-times"></i></a>
                </div>
            </div>             
        
        <?php
          }
        }else{
        ?>

        <div class="container">
            <div class="picture">
                 <font style="font-size:1.5rem; padding:1rem; color:#999;">No images yet.</font>
            </div>
         </div>  
     <?php
         }
     ?>
     </div>
        <div class="members">
        <?php
        $sel2 = "SELECT * FROM users WHERE status = 0 ORDER BY id DESC";
        $sql2 = mysqli_query($connection, $sel2);
        if(mysqli_num_rows($sql2) > 0){
            while($fetch = mysqli_fetch_array($sql2)){
           
        ?>
            <div class="container">
                <div class="user">
                    <i id="user-list" class="fa fa-user"></i>
                    <span class="user-name"><?php echo $fetch['username']; ?></span>
                </div>
               <!-- <div class="delete"> -->
                   <!-- <i id="delete-list" class="fa fa-times"></i>-->
                    <!-- <i class="fa fa-check"></i> -->
            </div>
     <?php          
      }
        }else{
    ?>

        <div class="container">
            <div class="user">
                 <font style="font-size:1.5rem; padding:1rem; color:#999;">No user yet.</font>
           </div>
         </div>

     <?php
        }
     ?>

               
        </div>
    </div>    
</body>
<?php include"include/footer.php"; ?>