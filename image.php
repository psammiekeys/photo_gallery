<?php include"include/header.php"; 

    include "admin/include/initial.php";

    if(!isset($_SESSION['id'])){
        header("location: index.php");
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
?>
<body>

<div class="img-wrapper">
        <div class="img-container">
        <?php
            $sel = "SELECT * FROM images WHERE id = '$id'";
            $sql = mysqli_query($connection, $sel);
            $fetch = mysqli_fetch_array($sql);
        ?>
           <h2 class="img-banner"><img src="admin/img/<?php echo $fetch['name']; ?>" style=" width:100%;"></h2>
           
           <div class="actions">
                <h5 class="img-name"><?php echo $fetch['custom_name']; ?></h5>
                <a href="gallery.php"><i style="position:relative; left:2.5rem;" id="previous" class="fa fa-angle-double-left"></i></a>
                
           </div>
        </div>
        <div class="members">

        <?php
            $sel1 = "SELECT * FROM likes WHERE image_id = '$id'";
            $sql1 = mysqli_query($connection, $sel1);
            while($fetch1 = mysqli_fetch_array($sql1)){
        ?>
            <div class="picture">
            <i style="font-size:2.5rem; position:relative; top:1rem; color:royalblue;" class ="fa fa-user"></i>
                <span style="position:relative; top:.4rem;" class="custom-name">
                    <?php
                        $sel2 = "SELECT * FROM users WHERE id = '{$fetch1['user_id']}'";
                        $sql2 = mysqli_query($connection, $sel2);
                        $fetch = mysqli_fetch_array($sql2);
                        echo $fetch['username'];
                    ?>
                </span>

            </div>
            <div class="delete">
                <i id="like-list" class="fa fa-thumbs-up thumbs"></i>
            </div>
            <?php
             }
            ?> 
        </div>
    </div>

    
</body>
<?php include"include/footer.php"; ?>