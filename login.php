<?php
session_start();
require 'db_connect.php';
error_reporting(0);


if (isset($_POST['uname']) and isset($_POST['pwd']) and !empty($_POST['uname']) and !empty($_POST['pwd']));


  $uname = mysqli_real_escape_string($connection, $_POST['uname']);
  $pwd = mysqli_real_escape_string($connection, md5($_POST['pwd']));
  $sql = "SELECT * FROM users WHERE uname = '$uname' AND pwd = '$pwd'";
  $res = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($res);
  $id = $row['id'];


  if (mysqli_num_rows($res) >0) {

    $_SESSION['id'] = $id;
    header ("Location: dashboard.php");
    exit();



        } else {
            echo 'Incorrect password.';
          }



 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <title>Login</title>
  </head>
  <body>
  <h1>Login</h1>
  <form action="login.php" method="POST">
<input type="text" name="uname" placeholder="Username"><br>
<input type="password" name="pwd" placeholder="Password"><br><br>
<input type="submit" name="submit">



 </body>
 </html>
