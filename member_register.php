<?php
include 'connection.php';
$conn = connect();
$pay = "";

if (isset($_POST['reg'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $lng = $_POST['lng'];
  $dept = $_POST['dept'];
  $exp = $_POST['exp'];
  $pay = $_POST['pay'];
  $pass1 = $_POST['pass1'];
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "image/".$filename;


  if (move_uploaded_file($tempname, $folder))  {
   $msg = "Image uploaded successfully";
  }else{
   $msg = "Failed to upload image";
  }


  $check_d = mysqli_query($conn,"SELECT * FROM req_members WHERE email = '$email'");

  if (mysqli_num_rows($check_d)==0) {
    $query = mysqli_query($conn, "INSERT INTO req_members(fname, lname,email,phone,language,dept, pre_exp,pay_phone,password,image)
    VALUES('$fname','$lname','$email','$phone','$lng','$dept','$exp','$pay','$pass1','$filename')");

     if ($query) {
        echo "<script>alert('Now you are the member of NSTUDS');</script>";
     }
  }
  else {
    echo "<script>alert('already exists as a member');</script>";
  }


}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="register.css">
   </head>
   <body>

     <form  method="post" enctype="multipart/form-data">
       <center> <h1 style="font-family:cursive;color:#eb0569;">NSTUDS Membership Form</h1> </center><br>
       <h3>First name :</h3>
        <input type="text" name="fname" placeholder="first name" required> <br>
        <h3>Last name :</h3>
        <input type="text" name="lname" placeholder="last name" required><br>
        <h3>Email Address :</h3>
        <input type="text" name="email" placeholder="student@gmail.com" required><br>
          <h3>Provide your phone number? :</h3>
        <input type="tel" name="phone" placeholder="phone number"><br>
        <h3>Upload an image file</h3>
        <input type="file" name="uploadfile" placeholder="Upload your Image"/><br>
        <h3>Select your department & Language experiance</h3>
        <select  name="lng">
          <option value="bangla">bangla</option>
          <option value="english">english</option>
        </select>

        <select  name="dept">
          <option value="CSTE">CSTE</option>
          <option value="ICE">ICE</option>
          <option value="SE">SE</option>
          <option value="ACCE">ACCE</option>
          <option value="EEE">EEE</option>
          </select><br>
           <h3>Do you have any debate experiance?</h3>
          <select  name="exp" style="padding-left: 11.5vw; padding-right:11.5vw; ">
          <option value="yes">yes</option>
          <option value="no">no</option>
        </select><br>
        <h3>if you have any bkash/nagad number? :</h3>
        <input type="tel" name="pay" placeholder="payment number" required><br>
        <h3>Password :</h3>
        <input type="password" name="pass1" placeholder="password"> <br><br>

        <input type="submit" name="reg" value="Register" required><br><br>

        <h3>***Already have an account?</h3>
        <a href="mlogin.php">Login in  here</a>


     </form>



   </body>
 </html>
