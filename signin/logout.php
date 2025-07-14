<!-- simply destroying the connection after the user logs out  -->

<?php 
session_start();
session_destroy();
header("location:signin.php");
?>