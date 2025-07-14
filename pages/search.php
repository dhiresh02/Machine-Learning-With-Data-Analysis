<?php
session_start();
include "../include/connection.php";

if (!isset($_SESSION['email'])) {
  header("Location:../signin/signin.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Search</title>

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/dbTable.css">
</head>

<body>
  <div class="sidebar">
    <?php include "../include/sidebar.php"; ?>
  </div>

  <div class="header">
    <?php include "../include/header.php"; ?>
  </div>

  <!-- This section was utilised from w3school lines 35-49 -->
  <!--https://www.w3schools.com/howto/howto_js_tabs.asp-->
  <!--Parts of the code was used and adapted to allow for the tab swtich to work with my project-->

  <div class="table-div">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <button class="nav-link active" onclick="tabSwitch(event, 'item')">Item Details</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" onclick="tabSwitch(event, 'sale')">Sale Details</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" onclick="tabSwitch(event, 'purchase')">Purchase Details</button>
      </li>
      <li class="nav-item">
        <button class="nav-link" onclick="tabSwitch(event, 'company')">Company Detail</button>
      </li>
    </ul>

    <div id="item" class="tab-pane">
      <div class="card">
        <div class="table-responsive pt-0">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Unit Price</th>
                <th>Total Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               <!-- Selects statements that is querying the database -->
               <!-- Fetching the data from the database and its allowing the user to edit which will redirect them to the corrosponding page or deleting the record -->
              <?php
              include "../include/connection.php";
              $sql = "SELECT * FROM `item_detail`";
              $run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_assoc($run)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['id'] ?>
                    </td>
                    <td>
                      <?php echo $row['item_Name'] ?>
                    </td>
                    <td>
                      <?php echo $row['unit_Price'] ?>
                    </td>
                    <td>
                      <?php echo $row['total_Stock'] ?>
                    </td>
                    <td>
                      <!-- The same reference was used and adapted to fit my project for the buttons to work -->
                      <!-- https://www.w3schools.com/howto/howto_js_tabs.asp -->
                      <button class="action-button"
                        onclick="window.location.href='itemDetails.php?id=<?php echo $row['id']; ?>'">Edit</button>
                      <button class="action-button"
                        onclick="window.location.href='../delete/deleteItem.php?id=<?php echo $row['id']; ?>'">Delete</button>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div id="sale" class="tab-pane tab-hide">
      <div class="card">
        <div class="table-responsive pt-0">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Item ID</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Sale Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "../include/connection.php";
              $sql = "SELECT * FROM `sale_detail`";
              $run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_assoc($run)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['id'] ?>
                    </td>
                    <td>
                      <?php echo $row['item_Id'] ?>
                    </td>
                    <td>
                      <?php echo $row['quantity'] ?>
                    </td>
                    <td>
                      <?php echo $row['unit_Price'] ?>
                    </td>
                    <td>
                      <?php echo $row['sale_Date'] ?>
                    </td>
                    <td>
                      <button class="action-button"
                        onclick="window.location.href='saleDetails.php?id=<?php echo $row['id']; ?>'">Edit</button>
                      <button class="action-button"
                        onclick="window.location.href='../delete/deleteSale.php?id=<?php echo $row['id']; ?>'">Delete</button>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div id="purchase" class="tab-pane tab-hide">
      <div class="card">
        <div class="table-responsive pt-0">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Purchase Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "../include/connection.php";
              $sql = "SELECT * FROM `purchase_detail`";
              $run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_assoc($run)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['id'] ?>
                    </td>
                    <td>
                      <?php echo $row['item_Name'] ?>
                    </td>
                    <td>
                      <?php echo $row['quantity'] ?>
                    </td>
                    <td>
                      <?php echo $row['unit_Price'] ?>
                    </td>
                    <td>
                      <?php echo $row['purchase_Date'] ?>
                    </td>
                    <td>
                      <button class="action-button"
                        onclick="window.location.href='purchaseDetails.php?id=<?php echo $row['id']; ?>'">Edit</button>
                      <button class="action-button"
                        onclick="window.location.href='../delete/deletePurchase.php?id=<?php echo $row['id']; ?>'">Delete</button>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div id="company" class="tab-pane tab-hide">
      <div class="card">
        <div class="table-responsive pt-0">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>city</th>
                <th>Shoe Brand</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "../include/connection.php";
              $sql = "SELECT * FROM `company_detail`";
              $run = mysqli_query($connection, $sql);
              if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_assoc($run)) {
                  ?>
                  <tr>
                    <td>
                      <?php echo $row['id'] ?>
                    </td>
                    <td>
                      <?php echo $row['name_Full'] ?>
                    </td>
                    <td>
                      <?php echo $row['city'] ?>
                    </td>
                    <td>
                      <?php echo $row['shoes_Brand'] ?>
                    </td>
                    <td>
                      <button class="action-button"
                        onclick="window.location.href='companyDetails.php?id=<?php echo $row['id']; ?>'">Edit</button>
                      <button class="action-button"
                        onclick="window.location.href='../delete/deleteCompany.php?id=<?php echo $row['id']; ?>'">Delete</button>
                    </td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    // In addition to the reference that i explained before on line 31-33 from lines 275 to 293 was also used and adpated
    // https://www.w3schools.com/howto/howto_js_tabs.asp
    // Parts of the code was used and adapted to allow for the tab switch to work with my project

    function tabSwitch(evt, column) {
      var i, tabTable, tabButton;

      
      tabTable = document.getElementsByClassName("tab-pane");
      for (i = 0; i < tabTable.length; i++) {
        tabTable[i].classList.add("tab-hide");
      }

  
      tabButton = document.getElementsByClassName("nav-link");
      for (i = 0; i < tabButton.length; i++) {
        tabButton[i].classList.remove("active");
      }

 
      document.getElementById(column).classList.remove("tab-hide");
      evt.currentTarget.classList.add("active");
    }
  </script>
</body>

</html>