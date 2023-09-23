<?php
require 'profile.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <br><br>
    <form  method="post">
      <input type="text" name="search" placeholder="Search here"   style=" margin-left: 30%;padding-left:15vw;padding-right:10vw; padding-top:2vh;padding-bottom:2vh; border-radius: 10px;"required>
    </form><br><br>
    <div class="" style="background-image:URL('oritrik.jpg');height:50vh;background-size:cover;">


    <?php
    if(isset($_POST['search'])){


      $search =   $_POST['search'];
      $_SESSION['search'] = $search;
      $search = mysqli_real_escape_string($conn,$search);
      $q = mysqli_query($conn,"SELECT * FROM req_members WHERE fname LIKE '%$search%' or lname LIKE '%$search%' ");
      $ex = mysqli_query($conn,"SELECT * FROM executive WHERE fname LIKE '%$search%' or lname LIKE '%$search%' ");
      $pres = mysqli_query($conn,"SELECT * FROM president WHERE fname LIKE '%$search%' or lname LIKE '%$search%' ");
      $sub = mysqli_query($conn,"SELECT * FROM sub_executive WHERE fname LIKE '%$search%' or lname LIKE '%$search%' ");
       $i=1;
      if (mysqli_num_rows($q)>0) {
        while ($a = mysqli_fetch_assoc($q)) {$image = $a['image'];

          $semail = $a['email'];
          $suser = $a['fname'].' '.$a['lname'];?>


           <img src='image/<?php echo $image;  ?>' height='200' width='200' style='border: 6px solid white;margin-top:35vh;margin-left:30%;padding:0vh;border-radius:50%;'>
            <h3 style="margin-left: 30%">Name : <?php echo $a['fname'].' '.$a['lname']; ?></h3>
            <p style="margin-left: 30%">general member, NSTUDS</p>

            <?php
            echo $semail;
              $cDebate = mysqli_query($conn,"SELECT dname,p1,p2,p3 FROM joined_debate WHERE p1='$semail' or p2='$semail' or p3='$semail'");
              if (mysqli_num_rows($cDebate)>0) {
                while ($p = mysqli_fetch_assoc($cDebate)) {
                   echo '<p style="margin-left: 30%">'.$i.') '.$p['dname'].'</p><br>';
                   $i++;

                }
              }
              $total=mysqli_num_rows($cDebate);

             echo "<h3 style='margin-left: 30%''>total:".$total." </h3>";
             ?>



    <?php

  $i++;}
      }
      elseif (mysqli_num_rows($ex)>0) {
        while ($a = mysqli_fetch_assoc($ex)) {$image = $a['image'];

          $semail = $a['email'];
          $suser = $a['fname'].' '.$a['lname'];?>


           <img src='image/<?php echo $image;  ?>' height='200' width='200' style='border: 6px solid white;margin-top:35vh;margin-left:30%;padding:0vh;border-radius:50%;'>
            <h3 style="margin-left: 30%">Name : <?php echo $a['fname'].' '.$a['lname']; ?></h3>
            <p style="margin-left: 30%">executive, NSTUDS</p>

            <?php
            echo $semail;
              $cDebate = mysqli_query($conn,"SELECT dname,p1,p2,p3 FROM joined_debate WHERE p1='$semail' or p2='$semail' or p3='$semail'");
             echo "<h3 style='margin-left: 30%''>Joined Debate List:</h3>";
             $j=1;
              if (mysqli_num_rows($cDebate)>0) {
                while ($p = mysqli_fetch_assoc($cDebate)) {
                   echo '<p style="margin-left: 30%">'.$j.') '.$p['dname'].'</p><br>';
                 $j++;
                }
              }
              $total=mysqli_num_rows($cDebate);
             echo "<h3 style='margin-left: 30%''>total:".$total." </h3>";


             ?>



    <?php

  $i++;}
      }
      elseif (mysqli_num_rows($sub)>0) {
        while ($a = mysqli_fetch_assoc($sub)) {$image = $a['image'];

          $semail = $a['email'];
          $suser = $a['fname'].' '.$a['lname'];?>


           <img src='image/<?php echo $image;  ?>' height='200' width='200' style='border: 6px solid white;margin-top:35vh;margin-left:30%;padding:0vh;border-radius:50%;'>
            <h3 style="margin-left: 30%">Name : <?php echo $a['fname'].' '.$a['lname']; ?></h3>
            <p style="margin-left: 30%">sub-executive, NSTUDS</p>

            <?php
            echo $semail;
              $cDebate = mysqli_query($conn,"SELECT dname,p1,p2,p3 FROM joined_debate WHERE p1='$semail' or p2='$semail' or p3='$semail'");
             echo "<h3 style='margin-left: 30%''>Joined Debate List:</h3>";
             $j=1;
              if (mysqli_num_rows($cDebate)>0) {
                while ($p = mysqli_fetch_assoc($cDebate)) {
                   echo '<p style="margin-left: 30%">'.$j.') '.$p['dname'].'</p><br>';
                 $j++;
                }
              }
              $total=mysqli_num_rows($cDebate);
             echo "<h3 style='margin-left: 30%''>total:".$total." </h3>";


             ?>



    <?php

  $i++;}
      }
      elseif (mysqli_num_rows($pres)>0) {
        while ($a = mysqli_fetch_assoc($pres)) {$image = $a['image'];

          $semail = $a['email'];
          $suser = $a['fname'].' '.$a['lname'];?>


           <img src='image/<?php echo $image;  ?>' height='200' width='200' style='border: 6px solid white;margin-top:35vh;margin-left:30%;padding:0vh;border-radius:50%;'>
            <h3 style="margin-left: 30%">Name : <?php echo $a['fname'].' '.$a['lname']; ?></h3>
            <p style="margin-left: 30%">president, NSTUDS</p>

            <?php
            echo $semail;
              $cDebate = mysqli_query($conn,"SELECT dname,p1,p2,p3 FROM joined_debate WHERE p1='$semail' or p2='$semail' or p3='$semail'");
             echo "<h3 style='margin-left: 30%''>Joined Debate List:</h3>";
             $j=1;
              if (mysqli_num_rows($cDebate)>0) {
                while ($p = mysqli_fetch_assoc($cDebate)) {
                   echo '<p style="margin-left: 30%">'.$j.') '.$p['dname'].'</p><br>';
                 $j++;
                }
              }
              $total=mysqli_num_rows($cDebate);
             echo "<h3 style='margin-left: 30%''>total:".$total." </h3>";


             ?>



    <?php

  $i++;}
      }

      

    }

     ?>
       </div>

  </body>
</html>
<script>
function refreshPage(){
    window.location.replace('search-profile.php')
}
</script>
