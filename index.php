<?php include"include/header.php";
     include "admin/include/initial.php";
?>

<?php
        if(isset($_SESSION['id'])) {
            if($_SESSION['status'] == 1) {
                header("location: admin/index.php");
            } else {
                header("location: gallery.php");
            }
        }
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
        }else{
            $msg = "";
        }

        if(isset($_GET['smg'])){
            $smg = $_GET['smg'];
        }else{
            $smg = "";
        }
        
        if(isset($_GET['ms'])){
            $ms = $_GET['ms'];
        }else{
            $ms = "";
        }
?>

<body>

    <div class="wrapper">
        <div class="banner-container">
           <h2 class="banner"><i>Gallery</i></h2>
           <!-- <i class="fa fa-angle-double-right"></i>
           <i class="fa fa-power-off"></i>
           <i class="fa fa-thumbs-up"></i>
           <i class="fa fa-times"></i>
           <i class="fa fa-user"></i>
           <i class="fa fa-ban"></i>
           <i class="fa fa-check"></i>
           <img src="admin/img/browse.png"> -->
        </div>
        <div class="account">
            <form action="process.php" method="post">
                <div class="signs signup">
                    <div class="field">
                        <?php echo $smg;
                            echo $msg;
                        ?>
                        <input class="input" type="text" placeholder="Username" name="usn"require>
                    </div>
                    <div class="field">
                        <input class="input" type="password" placeholder="Password" name="pwd"require>
                    </div>
                    <div class="field">
                        <button class="btn" type="submit" name="signup">Sign Up</button>
                    </div>
                </div>   
            </form>
            <form action="process.php" method="post">            
                <div class="signs signin">
                    <div class="field">
                        <?php echo $ms; ?>
                        <input class="input" type="text" placeholder="Username" name="usn" require>
                    </div>
                    <div class="field">
                        <input class="input" type="password" placeholder="Password" name="pwd" require>
                    </div>
                    <div class="field">
                        <button class="btn" type="submit" name="signin">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

<?php include"include/footer.php";?>