<?php
include "../include/connection.php";
if (isset($_POST['register'])) {
  $user_Name = $_POST['user_Name'];
  $email = $_POST['email'];
  //password encryption so that the password on the databse remains anonymous
  $password = sha1($_POST['password']);
  $c_Password = sha1($_POST['c_Password']);

  if ($password != $c_Password) {
    //user prompt
    echo "<script>alert('Passwords don't match'); window.location.replace('http://localhost/KickTrack/pages/register.php');</script>";
  } else {
    $sql = "INSERT INTO `sign_in`(`user_Name`, `email`, `password`) VALUES ('$user_Name','$email','$password')";
    $run = mysqli_query($connection, $sql);

    if ($run) {
      echo "<script>alert('You are registered now!'); window.location.replace('http://localhost/KickTrack/signin/signin.php');</script>";
    } else {
      echo "<script>alert('Failed to register.'); window.location.replace('http://localhost/KickTrack/pages/register.php');</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Register</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/signin.css">
</head>

<!-- HTML for the register page with forms -->

<body>
  <div class="drop-shadow">
    <div>
      <h1>KickTrack</h1>
    </div>

    <form method="POST">
      <div class="form-item">
        <label for="username">Username</label>
        <input type="text" name="user_Name" placeholder="Enter your username" autofocus />
      </div>

      <div class="form-item">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email" />
      </div>

      <div class="form-item">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
      </div>

      <div class="form-item">
        <label for="password">Confirm Password</label>
        <input type="password" name="c_Password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
      </div>

      <div>
        <button name="register">Sign up</button>
      </div>
    </form>

    <p>Already have an account? <a href="signin.php">Sign in instead</a></p>
  </div>
</body>

</html>