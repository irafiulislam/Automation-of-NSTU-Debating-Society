<?php

include 'connection.php';
$conn = connect();
session_start();
if (isset($_POST['login'])) {
  $uname = $_POST['uname'];

  $uname = trim($uname);
  $uname = mysqli_real_escape_string($conn,$uname);
  $uname = strip_tags($uname);


  $pass = $_POST['pass'];
  $pass = trim($pass);
  $pass = mysqli_real_escape_string($conn,$pass);
  $pass = strip_tags($pass);

  $teacher = mysqli_query($conn,"SELECT  email, password FROM req_members WHERE email='$uname' AND password='$pass'");
 $president  = mysqli_query($conn,"SELECT  email, password FROM president WHERE email='$uname' AND password='$pass'");
  $executive = mysqli_query($conn,"SELECT  email, password FROM executive WHERE email='$uname' AND password='$pass'");
  $sub_executive = mysqli_query($conn,"SELECT  email, password FROM sub_executive WHERE email='$uname' AND password='$pass'");

  if (mysqli_num_rows($teacher)==1) {
    $_SESSION['general'] = $uname;
    echo "<script> window.location.replace('profile.php')</script>";
 exit();
  }
  elseif (mysqli_num_rows($president)==1) {
    $_SESSION['president'] = $uname;
echo "<script> window.location.replace('profile.php')</script>";
exit();
  }
 elseif (mysqli_num_rows($executive)==1) {
 $_SESSION['executive'] = $uname;
    echo "<script> window.location.replace('profile.php')</script>";
  exit();
}
elseif (mysqli_num_rows($sub_executive)==1) {
  $_SESSION['sub_executive'] = $uname;
     echo "<script> window.location.replace('profile.php')</script>";
   exit();
}
else {
  echo "<script> alert('invalid Email or Password')</script>";
 exit();}

}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="css/login.css">
   </head>
   <body style="background:black;">
     <div class="login" style="background:pink; opacity:0.8; margin-left:38%;margin-top:20vh;width:30vw;height:auto">

     <form method="post" style="margin-left:10vw;" >
       <caption><h1 style="color:grey;font-family:cursive;">Log In</h1></caption>
       <br><br>
       <input type="text" name="uname" placeholder="username" style="padding:0.75vw;background:grey;border-radius:2px;"><br><br>
       <input type="password" name="pass" placeholder="12334" style="padding:0.75vw;background:grey;border-radius:2px;"><br><br>
       <input type="submit" name="login" value="Log In" style="margin:5%; padding:0.25vw;font-family:cursive; border-radius:2px;background:skyblue;">
     </form>

     <pre style="margin-left:15%;">***Don't you have any account?
       <a href="member_register.php">Create Account from here</a>
     </pre>

  </div>
   </body>
 </html>
