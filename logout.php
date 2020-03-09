<?php
     include "admin/include/initial.php";
?>
<?php
     unset($_SESSION['id']);
     header("location:index.php?ms=<font style='color:green; font-size:1.2rem; padding-top:1rem;'>logged-out successfully</font>")

?>