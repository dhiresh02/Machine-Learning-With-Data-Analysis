<?php
include '../include/connection.php';
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = sha1($_POST['password']);
  $sql = "SELECT * FROM `sign_in` WHERE email='$email' and password='$password'";
  $run = mysqli_query($connection, $sql);
  session_start();
  $_SESSION['email'] = $email;

  if (mysqli_num_rows($run) > 0) {
    header('Location:../pages/itemDetails.php');
  } else {
    echo "<script>Invalid User</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Sign In</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/signin.css">
</head>

<!-- HTML for the sign in page with forms -->
<body>
  <div class="drop-shadow">
    <div>
      <h1>KickTrack</h1>
    </div>

    <form method="POST">
      <div class="form-item">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" autofocus />
      </div>

      <div class="form-item">
        <label>Password</label>
        <input type="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
      </div>

      <div class="form-item">
        <button name="login">Sign in</button>
      </div>
    </form>

    <p>New on our platform? <a href="register.php">Create an account</a></p>
  </div>
</body>

</html>