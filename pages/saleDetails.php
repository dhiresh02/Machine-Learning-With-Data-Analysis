<!-- From lines 11-18 its adding records to the table and saving it to the database -->

<?php
session_start();
include "../include/connection.php";

if (!isset($_SESSION['email'])) {
  header("Location:../signin/signin.php");
}

if (isset($_POST['add']) && $_POST['item_Id'] != "") {
  $item_Id = $_POST['item_Id'];
  $quantity = $_POST['quantity'];
  $unit_Price = $_POST['unit_Price'];
  $sale_Date = $_POST['sale_Date'];

  $sql = "INSERT INTO `sale_detail`(`item_Id`, `quantity`, `unit_Price`, `sale_Date`) VALUES ('$item_Id','$quantity','$unit_Price','$sale_Date')";
  $run = mysqli_query($connection, $sql);

  if ($run) {
    echo "<script>alert('Sale added!'); window.location.replace('http://localhost/KickTrack/pages/saleDetails.php');</script>";
  } else {
    echo "<script>alert('Failed to add sale.'); window.location.replace('http://localhost/KickTrack/pages/saleDetails.php');</script>";
  }
}

$id = isset($_GET['id']) ? $_GET['id'] : "";
$sql = "SELECT * FROM `sale_detail` WHERE id='$id'";
$run = mysqli_query($connection, $sql);

if (mysqli_num_rows($run) > 0) {
  $i = 1;
  $row = mysqli_fetch_assoc($run);
}
//From lines 36-43 its updating records by using the SELECT statement to the table and saving it to the database
if (isset($_POST['update'])) {
  $item_Id = $_POST['item_Id'];
  $quantity = $_POST['quantity'];
  $unit_Price = $_POST['unit_Price'];
  $sale_Date = $_POST['sale_Date'];

  $update = "UPDATE `sale_detail` SET `item_Id`='$item_Id',`quantity`='$quantity',`unit_Price`='$unit_Price',`sale_Date`='$sale_Date' WHERE id='$id'";
  $result = mysqli_query($connection, $update);

  if ($result) {
    echo "<script>alert('Sale updated!'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  } else {
    echo "<script>alert('Failed to update sale.'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Sale</title>


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
    <h6>Sale Details</h6>
    <h6>
      <?php echo isset($_GET['id']) ? "Update ID: " . $_GET['id'] : ""; ?>
    </h6>
    <form method="POST" class="drop-shadow">
      <div class="form-item">
        <label>Item ID</label>
        <input type="number" placeholder="Item ID" required="required"
          value="<?php echo isset($row['item_Id']) ? $row['item_Id'] : ""; ?>" name="item_Id" />
      </div class="form-item">

      <div class="form-item">
        <label>Quantity</label>
        <input type="number" placeholder="Quantity" required="required"
          value="<?php echo isset($row['quantity']) ? $row['quantity'] : ""; ?>" name="quantity" />
      </div>

      <div class="form-item">
        <label>Unit Price</label>
        <input type="number" placeholder="Unit Price" required="required"
          value="<?php echo isset($row['unit_Price']) ? $row['unit_Price'] : ""; ?>" name="unit_Price" />
      </div>

      <div class="form-item">
        <label>Sale Date</label>
        <input type="date" required="required" value="<?php echo isset($row['sale_Date']) ? $row['sale_Date'] : ""; ?>"
          name="sale_Date" />
      </div>
<!-- Form button is 'Update' and user would select this and it would update the database-->
      <div class="form-item">
        <button type="submit" name="<?php echo isset($_GET['id']) ? "update" : "add"; ?>">
          <?php echo isset($_GET['id']) ? "Update Sale" : "Add Sale"; ?>
        </button>
      </div>
    </form>
  </div>
</body>

</html>