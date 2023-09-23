<?php
require 'profile.php';
/*include 'connection.php';
$conn=connect();
session_start();*/
if (isset($_SESSION['executive'])) {
  $user = $_SESSION['executive'];
}
elseif (isset($_SESSION['general'])) {
  $user = $_SESSION['general'];
}
else{
  echo "<script> window.location.replace('profile.php')</script>";
}
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>



     <?php



       $d = mysqli_query($conn,"SELECT * FROM event ");
       $i=0;
        if (mysqli_num_rows($d)>0) {
          while ($a = mysqli_fetch_assoc($d)) {
            $debate = $a['event'];?>


           <form  method="post" style="margin-left:20vw;padding-top:5vh;">
             <h1 style="color: blue;"> <?php echo $debate ?></h1> is going on...please register to join !
             <input type="submit" name="join<?php echo $i;?>" value="join" style="padding:0.25vw; background:black;color:white"> <br>
           </form>





    <?php
      if (isset($_POST["join$i"])) {

       $check = mysqli_query($conn,"SELECT * FROM req_members WHERE email = '$user'");
       if (mysqli_num_rows($check)>0) {
          while ($c = mysqli_fetch_assoc($check) ) {
           $name = $c['fname'].' '.$c['lname'];
           $dept = $c['dept'];
           $phone = $c['phone'];

           $ifd = mysqli_query($conn,"SELECT * FROM participant WHERE email = '$user'");

           if (mysqli_num_rows($ifd)==0) {
             $participant = mysqli_query($conn,"INSERT INTO participant(name,email,phone,debate,dept) VALUES('$name',
             '$user','$phone','$debate','$dept')");
             if ($participant){
               echo '<script>alert("Sucessfully Joined")</script>';
             }
           }
           else {
             echo " You have registered already !";
           }


          }
       }
      }

    $i++; }
      }


      ?>


   </body>
 </html>
