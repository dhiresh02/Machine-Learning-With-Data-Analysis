<!-- Establishing the connection, so if the record is deleted it would drop the record in the database -->
<!-- Deleting the table in the database for item details -->

<?php
include '../include/connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM `item_detail` WHERE id='$id'";
mysqli_query($connection, $sql);
header('location:../pages/search.php');
?>