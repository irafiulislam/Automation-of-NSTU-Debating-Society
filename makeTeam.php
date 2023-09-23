<?php
require 'profile.php';

if (isset($_SESSION['executive'])) {
  $user = $_SESSION['executive'];
}

else {
  echo "<script> window.location.replace('profile.php')</script>";
}

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="makeTeam.css">
   </head>
   <body>
     <div class="form">


<form  method="post">


     <select  name="dbt" >
       <?php

         $d = mysqli_query($conn,"SELECT * FROM event");
          if (mysqli_num_rows($d)>0) {
            while ($a = mysqli_fetch_assoc($d)) {
              $debate = $a['event']; ?>
            <option value="<?php echo $debate; ?>"><?php echo $debate; ?></option>


          <?php
         }
        }



        ?>
     </select>
     <?php
      $s = mysqli_query($conn,"SELECT * FROM participant order by RAND() LIMIT 3");
      $i=1;

      if (mysqli_num_rows($s)>0) {
        while ($a = mysqli_fetch_assoc($s)) {
        //  echo $a['email'].$i.'<br>';

        echo "<div style='box-border:1px solid grey; color:blue; padding:2vh;'>";

          if ($i==1){
            $p1 = $a['email'];
            echo 'Participant 01 :'.$p1;

          }
          elseif($i==2){
            $p2 = $a['email'];
            echo 'Participant 02 :'.$p2;
          }
          elseif ($i==3) {
          $p3 =  $a['email'];
          echo 'Participant 03 :'.$p3;

          }

        echo "</div>";


          $i++;
        }

      }


      ?>

      <input type="text" name="tname" placeholder="team name"><br>

      <input type="submit" name="create" value="CREATE">

     <?php
     if (isset($_POST['create'])) {
       $tname = $_POST['tname'];
       $dbt = $_POST['dbt'];

      // $toC = mysqli_query($conn,"SELECT * FROM participant WHERE email NOT IN(SELECT p1,p2,p3 FROM create_team)");


       //if (mysqli_num_rows($toC)==0) {
         $team = mysqli_query($conn,"INSERT INTO create_team(tname,p1,p2,p3,dname,created_by)VALUES('$tname','$p1','$p2','$p3','$dbt',
         '$user')");
         if ($team) {
           $j1 = $p1;
//           echo $j1;
           $joined = mysqli_query($conn,"INSERT INTO joined_debate(tname,p1,p2,p3,dname)VALUES('$tname','$p1','$p2','$p3','$dbt')");
          // $delete = mysqli_query($conn,"DELETE participant WHERE create_team.p1=participant.email,create_team.p2=participant.email AND create_team.p3=participant.email");


         }

       //}
      /* else {
         echo "already in a team";
 }
 */




     }
      ?>
    </form>
    </div>
   </body>
 </html>
