<!-- *note all pages have similar features and function therefore the comments would be similar -->
<!-- From lines 11-17 its adding records to the table and saving it to the database -->

<?php
session_start();
include "../include/connection.php";

if (!isset($_SESSION['email'])) {
  header("Location:../signin/signin.php");
}

if (isset($_POST['add'])) {
  $name_Full = $_POST['name_Full'];
  $city = $_POST['city'];
  $shoes_Brand = $_POST['shoes_Brand'];

  $sql = "INSERT INTO `company_detail`(`name_Full`, `city`, `shoes_Brand`) VALUES ('$name_Full','$city','$shoes_Brand')";
  $run = mysqli_query($connection, $sql);

  // lines 23 is alerting the user if the record is added and prompts the user 
  // if the record does not add to the database it prompts the user accordingly on line 25

  if ($run) {
    echo "<script>alert('Company added!'); window.location.replace('http://localhost/KickTrack/pages/companyDetails.php');</script>";
  } else {
    echo "<script>alert('Failed to add company.'); window.location.replace('http://localhost/KickTrack/pages/companyDetails.php');</script>";
  }
}
//From lines 31-45 its updating records by using the SELECT statement to the table and saving it to the database


$id = isset($_GET['id']) ? $_GET['id'] : "";
$sql = "SELECT * FROM `company_detail` WHERE id='$id'";
$run = mysqli_query($connection, $sql);

if (mysqli_num_rows($run) > 0) {
  $row = mysqli_fetch_assoc($run);
}

if (isset($_POST['update'])) {
  $name_Full = $_POST['name_Full'];
  $city = $_POST['city'];
  $shoes_Brand = $_POST['shoes_Brand'];

  $sql = "UPDATE `company_detail` SET `name_Full`='$name_Full',`city`='$city',`shoes_Brand`='$shoes_Brand' WHERE id='$id'";
  $result = mysqli_query($connection, $sql);

//user prompts for updates for records

  if ($result) {
    echo "<script>alert('Company updated!'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  } else {
    echo "<script>alert('Failed to update company.'); window.location.replace('http://localhost/KickTrack/pages/search.php');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Company Details</title>

  <!-- Bootstrap CSS was taken from w3schools and the same bootstrap is utilised throughout the website -->
  <!-- https://www.w3schools.com/bootstrap4/bootstrap_get_started.asp -->

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

<!-- The coding for the forms displayed to the user is shown below for the company details  -->

  <div class="form-div">
    <h6>Company Details</h6>
    <h6>
      <?php echo isset($_GET['id']) ? "Update ID: " . $_GET['id'] : ""; ?>
    </h6>
    <form method="POST" class="drop-shadow">
      <div class="form-item">
        <label>Full Name</label>
        <input type="text" placeholder="Full Name" required="required"
          value="<?php echo isset($row['name_Full']) ? $row['name_Full'] : ""; ?>" name="name_Full" />
      </div>

      <div class="form-item">
        <label>City</label>
        <input type="text" placeholder="City" required="required"
          value="<?php echo isset($row['city']) ? $row['city'] : ""; ?>" name="city" />
      </div>

      <div class="form-item">
        <label>Shoe Brand</label>
        <input type="text" placeholder="Shoe Brand" required="required"
          value="<?php echo isset($row['shoes_Brand']) ? $row['shoes_Brand'] : ""; ?>" name="shoes_Brand" />
      </div class="form-item">

      <!-- Form button is 'Update' and user would select this and it would update the database-->
      <div class="form-item">
        <button type="submit" name="<?php echo isset($_GET['id']) ? "update" : "add"; ?>">
          <?php echo isset($_GET['id']) ? "Update Company" : "Add Company"; ?>
        </button>
      </div>
    </form>
  </div>
</body>

</html>