<!-- From lines 11-18 its adding records to the table and saving it to the database -->

<?php
session_start();
include "../include/connection.php";

if (!isset($_SESSION['email'])) {
  header("Location:../signin/signin.php");
}

if (isset($_POST['add']) && $_POST['item_Name'] != "") {
  $item_Name = $_POST['item_Name'];
  $quantity = $_POST['quantity'];
  $unit_Price = $_POST['unit_Price'];
  $purchase_Date = $_POST['purchase_Date'];

  $sql = "INSERT INTO `purchase_detail`(`item_Name`, `quantity`, `unit_Price`, `purchase_Date`) VALUES ('$item_Name','$quantity','$unit_Price','$purchase_Date')";
  $run = mysqli_query($connection, $sql);

  if ($run) {
    echo "<script>alert('Purchase added!'); window.location.replace('http://localhost/KickTrack/pages/purchaseDetails.php');</script>";
  } else {
    echo "<script>alert('Failed to add purchase.'); window.location.replace('http://localhost/KickTrack/pages/purchaseDetails.php');</script>";
  }
}
//From lines 27-42 its updating records by using the SELECT statement to the table and saving it to the database
$id = isset($_GET['id']) ? $_GET['id'] : "";
$sql = "SELECT * FROM `purchase_detail` WHERE id='$id'";
$run = mysqli_query($connection, $sql);

if (mysqli_num_rows($run) > 0) {
  $row = mysqli_fetch_assoc($run);
}

if (isset($_POST['update'])) {
  $item_Name = $_POST['item_Name'];
  $quantity = $_POST['quantity'];
  $unit_Price = $_POST['unit_Price'];
  $purchase_Date = $_POST['purchase_Date'];

  $update = "UPDATE `purchase_detail` SET `item_Name`='$item_Name',`quantity`='$quantity',`unit_Price`='$unit_Price',`purchase_Date`='$purchase_Date' WHERE id='$id'";
  $result = mysqli_query($connection, $update);

  if ($result) {
    echo "<script>alert('Purchase updated!'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  } else {
    echo "<script>alert('Failed to update purchase.'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Purchase Details</title>

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
    <h6>Purchase Details</h6>
    <h6>
      <?php echo isset($_GET['id']) ? "Update ID: " . $_GET['id'] : ""; ?>
    </h6>
    <form method="POST" class="drop-shadow">
      <div class="form-item">
        <label>Item Name</label>
        <input type="text" placeholder="Item Name" required="required"
          value="<?php echo isset($row['item_Name']) ? $row['item_Name'] : ""; ?>" name="item_Name" />
      </div>

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
        <label>Purchase Date</label>
        <input type="date" value="<?php echo isset($row['purchase_Date']) ? $row['purchase_Date'] : ""; ?>"
          name="purchase_Date" required="required" />
      </div>

      <div class="form-item">
        <button type="submit" name="<?php echo isset($_GET['id']) ? "update" : "add"; ?>">
          <?php echo isset($_GET['id']) ? "Update Purchase" : "Add Purchase"; ?>
        </button>
      </div>

    </form>
  </div>
</body>

</html>