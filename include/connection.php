<!-- Making a connection which is referenced throughout some of the classes -->

<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";
$connection = mysqli_connect($server, $username, $password, $dbname);
?>