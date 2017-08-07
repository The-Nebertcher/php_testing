<?php

  require 'db_connect.php';

  if (isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['uname']) and isset($_POST['pwd']) and isset ($_POST['pwd2']) and !empty($_POST['fname']) and !empty($_POST['lname']) and !empty($_POST['uname']) and !empty($_POST['pwd']) and !empty($_POST['pwd2'])) {

  $fname =  mysqli_real_escape_string($connection, $_POST['fname']);
  $lname =  mysqli_real_escape_string($connection, $_POST['lname']);
  $uname =  mysqli_real_escape_string($connection, $_POST['uname']);
  $pwd =    mysqli_real_escape_string($connection, $_POST['pwd']);
  $pwd2 =   mysqli_real_escape_string($connection, $_POST['pwd2']);
  $pwd = md5($pwd);
  $pwd2 = md5($pwd2);

  if ($pwd !== $pwd2){
    echo 'Passwords don\'t match.';
    die();
  }

  $check = "SELECT * FROM users WHERE uname = '$uname'";
  $res = mysqli_query($connection, $check);
  $row = mysqli_fetch_assoc($res);

  if (mysqli_num_rows($res) >0) {
    echo 'That username is already in use.';
    die(); //Might not need this
  } else {

  }

  $sql = "INSERT INTO users (fname, lname, uname, pwd) VALUES ('$fname', '$lname', '$uname', '$pwd')";

  if (!mysqli_query($connection, $sql)) {

    echo 'There was an error.';
    die();
    } else {
          echo 'Signup succesful!';
    }
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
    <title>Register</title>
  </head>
  <body>
  <h1>Sign up</h1>
  <form action="signup.php" method="POST">

  <input type="text" name="fname" placeholder="First Name"><br>
  <input type="text" name="lname" placeholder="Last Name"><br>
  <input type="text" name="uname" placeholder="Username"><br>
  <input type="password" name="pwd" placeholder="Password"><br>
  <input type="password" name="pwd2" placeholder="Confirm Password"><br>
  <input type="submit" name="submit" value="Register"><br>


</body>
</html>
