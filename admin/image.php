<?php include"include/header.php"; 
     include "include/initial.php";

     if(!isset($_SESSION['id'])) {
        header("location:../index.php");
    }

    

     if(isset($_GET['id'])){
         $id = $_GET['id'];
     }
?>
<body>

<div class="img-wrapper">
     <?php
        $sel1 = "SELECT * FROM images WHERE id = '$id'";
        $sql = mysqli_query($connection, $sel1); 
        if(mysqli_num_rows($sql) > 0){
            while($fetch = mysqli_fetch_array($sql)){

     ?>
        <div class="img-container">
           <h2 class="img-banner"><img src="img/<?php echo $fetch['name'] ?>" alt = "image" style=" width:100%;"></h2>
           
           <div class="actions">
               <h5 class="img-name"><?php echo $fetch['custom_name'] ?></h5>
              <a href="index.php"> <i style="position:relative; left:1.5rem;" id="previous" class="fa fa-angle-double-left"></i></a>
                <a href="index.php#<?php echo $fetch['id'] ?>" ></a>
           </div>
        </div>
        <?php
        //     }
        // }
        ?>
        <div class="members">
        <?php
            $sel2 = "SELECT * FROM likes WHERE image_id = '$id'";
            $sql2 = mysqli_query($connection, $sel2);
           while( $fetch1 = mysqli_fetch_array($sql2)){

          

        ?>

            <div class="user">
                <i id="user-list" class="fa fa-user"></i>
                <span class="user-name">
               
                <?php
                    $sql3 = "SELECT * FROM users WHERE id = '{$fetch1['user_id']}'";
                    $query3 = mysqli_query($connection, $sql3);
                    $fetch3 = mysqli_fetch_array($query3);
                    echo $fetch3['username'];
                ?>

</span>
            </div>
            <div class="delete">
                <i id="like-list" class="fa fa-thumbs-up"></i>
            </div>
     
        <?php
             }
            }
            }
        ?>
           </div>
    </div>

    
</body>



                <!-- </span>
            </div>
            

            <div class="picture">
                <img class="img" src="img/Tulips.jpg">
                <!-- <i class="fa fa-user"></i> -->
               <!-- <span class="custom-name">Browseowse</span>
            </div>
            <div class="delete">
                <i id="like-list" class="fa fa-thumbs-up"> &nbsp;5</i>
            </div>
        </div>
    </div> -->

    
</body>
<?php include"include/footer.php"; ?>