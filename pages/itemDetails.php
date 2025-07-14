<!-- From lines 11-17 its adding records to the table and saving it to the database -->

<?php
session_start();
include "../include/connection.php";

if (!isset($_SESSION['email'])) {
  header("Location:../signin/signin.php");
}

if (isset($_POST['add']) && $_POST['item_Name'] != "") {
  $item_Name = $_POST['item_Name'];
  $unit_Price = $_POST['unit_Price'];
  $total_Stock = $_POST['total_Stock'];

  $sql = "INSERT INTO `item_detail`(`item_Name`, `unit_Price`, `total_Stock`) VALUES ('$item_Name','$unit_Price','$total_Stock')";
  $run = mysqli_query($connection, $sql);


  // lines 23 is alerting the user if the record is added and prompts the user 
  // if the record does not add to the database it prompts the user accordingly on line 25
  if ($run) {
    echo "<script>alert('Item added!'); window.location.replace('http://localhost/KickTrack/pages/itemDetails.php');</script>";
  } else {
    echo "<script>alert('Failed to add item.'); window.location.replace('http://localhost/KickTrack/pages/itemDetails.php');</script>";
  }
}

//From lines 30-45 its updating records by using the SELECT statement to the table and saving it to the database
$id = isset($_GET['id']) ? $_GET['id'] : "";
$sql = "SELECT * FROM `item_detail` WHERE id='$id'";
$run = mysqli_query($connection, $sql);

if (mysqli_num_rows($run) > 0) {
  $i = 1;
  $row = mysqli_fetch_assoc($run);
}

if (isset($_POST['update'])) {
  $item_Name = $_POST['item_Name'];
  $unit_Price = $_POST['unit_Price'];
  $total_Stock = $_POST['total_Stock'];

  $update = "UPDATE `item_Detail` SET `item_Name`='$item_Name',`unit_Price`='$unit_Price',`total_Stock`='$total_Stock' WHERE `id`='$id'";
  $result = mysqli_query($connection, $update);

  if ($result) {
    echo "<script>alert('Item updated!'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  } else {
    echo "<script>alert('Failed to update item.'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Items</title>

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/dbForm.css">
</head>

<body>
  <div>
    <?php include "../include/sidebar.php"; ?>
  </div>

  <div>
    <?php include "../include/header.php"; ?>
  </div>

  <div class="form-div">
    <h6>Item Details</h6>
    <h6>
      <?php echo isset($_GET['id']) ? "Update ID: " . $_GET['id'] : ""; ?>
    </h6>
    <form method="POST" class="drop-shadow">
      <div class="form-item">
        <label>Item Name</label>
        <input type="text" placeholder="Item Name" required="required" name="item_Name"
          value="<?php echo isset($row['item_Name']) ? $row['item_Name'] : ""; ?>" name="item_Name" />
      </div>

      <div class="form-item">
        <label>Unit Price</label>
        <input type="number" placeholder="Unit Price" required="required"
          value="<?php echo isset($row['unit_Price']) ? $row['unit_Price'] : ""; ?>" name="unit_Price" />
      </div>

      <div class="form-item">
        <label>Total Stock</label>
        <input type="number" placeholder="Total Stock" required="required"
          value="<?php echo isset($row['total_Stock']) ? $row['total_Stock'] : ""; ?>" name="total_Stock" />
      </div>

      <div class="form-item">
        <button type="submit" name="<?php echo isset($_GET['id']) ? "update" : "add"; ?>">
          <?php echo isset($_GET['id']) ? "Update Item" : "Add Item"; ?>
        </button>
      </div>
    </form>
  </div>
</body>

</html>