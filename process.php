<?php include "admin/include/initial.php"; ?>

<?php
    

    if (isset($_POST['signin'])) {
        $usn = trim(addslashes($_POST['usn']));
        $pwd = trim(addslashes(sha1($_POST['pwd'])));

        $select = "SELECT * FROM users WHERE username = '$usn' AND password = '$pwd' LIMIT 1";
        $sql = mysqli_query($connection, $select);
        if (mysqli_num_rows($sql) > 0){
            $fetch = mysqli_fetch_array($sql);
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['usn'] = $fetch['username'];
            $_SESSION['pwd'] = $fetch['password'];
            $_SESSION['status'] = $fetch['status'];

            if ($fetch['status'] == 1){
                header("location: admin/index.php");
            }else{
                header("location:gallery.php");
            }
             }else{
                 header("location:index.php?ms=<font style='color:orange; postion:relative; font-size:1.2rem; padding-top:1rem;'>invalid username!</font>");
             }
        } 
         if (isset($_POST['signup'])) {
            $usn = trim(addslashes($_POST['usn']));
            $pwd = trim(addslashes(sha1($_POST['pwd'])));
            $sel = "SELECT * FROM users WHERE username = '$usn' LIMIT 1";
            $sql1 = mysqli_query($connection, $sel);
            if (mysqli_num_rows($sql1) > 0) {
                header("location:index.php?msg=<font style='font-size:1.2rem; padding-top:1rem; color:orange;'>Username already exist.</font>");
            }else{
                $insert = "INSERT INTO users SET username = '$usn', password = '$pwd'";
                 mysqli_query($connection, $insert);
                 header("location:index.php?smg=<font style='color:green; position:relative; font-size:1.2rem;margin-bottom:1rem;'>Successful, login now.</font>");
            }
        }
        
    

?>