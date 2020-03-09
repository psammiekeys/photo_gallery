<?php include"include/header.php";

        include "admin/include/initial.php";

            if(!isset($_SESSION['id'])){
                header("location: index.php");
            }
?>

<body>

    <div class="header">
       <a href="logout.php"> <i style="font-size:2.5rem;" class="fa fa-power-off"></i></a>
        <h2 class="username"><i>Welcome <?php echo $_SESSION['usn']; ?></i></h2>
        <h2 class="title"><i>Gallery</i></h2>
        <h5 class="mini-title"><i>Explore our photos</i></h5>
    </div>

    <div class="gallery">
    <?php
        $sel1 = "SELECT * FROM images ORDER BY id DESC";
        $sql1 = mysqli_query($connection, $sel1);
        if (mysqli_num_rows($sql1) >0){
            while($fetch1 = mysqli_fetch_array($sql1)){

    ?>
        <div class="photo" >
            <a href="image.php?id=<?php echo $fetch1['id']; ?>">
                <img id="<?php echo $fetch1['id']; ?>" src="admin/img/<?php echo $fetch1['name'] ?>" style=" width:100%;">
               
    <div class="likes">
    <?php
            $sel2 = "SELECT * FROM likes WHERE image_id = '{$fetch1['id']}' AND user_id = '{$_SESSION['id']}'";
            $sql2 = mysqli_query($connection, $sel2);
            if(mysqli_num_rows($sql2) == 1){           
    ?>
        <a style='color: white;' href="unlike.php?image_id=<?php echo $fetch1['id']; ?>&user_id=<?php echo $_SESSION['id']; ?>">
        <i class="fa fa-thumbs-up">
        <?php
            $sel3 = "SELECT * FROM likes WHERE image_id = '{$fetch1['id']}'";
            $sql3 = mysqli_query($connection, $sel3);
            $likes = 0;
            if (mysqli_num_rows($sql3) > 0){
                while ($fetch3 = mysqli_fetch_array($sql3)){
                    $likes++;
                }
                echo $likes;
            }else {
                $likes = "";
            }
        ?>
        </i>
        </a>

        <?php
            }else {
        ?>
        <a style='color:white; opacity:0.5;' href="like.php?image_id=<?php echo $fetch1['id']; ?>&user_id=<?php echo $_SESSION['id']; ?>">
        <i class ="fa fa-thumbs-up">
       <?php
            $sel4 = "SELECT * FROM likes WHERE image_id = '{$fetch1['id']}'";
            $sql4 = mysqli_query($connection, $sel4);
            $likes1 = 0;
            if(mysqli_num_rows($sql4) > 0){
                while($fetch = mysqli_fetch_array($sql4)){
                    $likes1++;
                }
                echo $likes1;
            }else{
                $likes1 = "";
            }
       ?>
        </i>
    </a>
        
        <?php
            }
        ?>
        </div>
       
        </a>

        </div>
        <?php
            }         
             }else {
     
        ?>
        
        <div>
       <center><font style ='color:#999; font-size:5rem;'>No photos yet</font></center>
        </div>
     <?php } ?>
    </div>

</body>

<?php include"include/footer.php";?>