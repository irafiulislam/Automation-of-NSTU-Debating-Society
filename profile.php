<?php
 include 'connection.php';
 $conn = connect();
 session_start();


 if (isset($_SESSION['general'])) {
   $user = $_SESSION['general'];

 }
 elseif (isset($_SESSION['president'])) {
   $user = $_SESSION['president'];
 }
 elseif (isset($_SESSION['executive'])) {
   $user = $_SESSION['executive'];
 }
 elseif (isset($_SESSION['sub_executive'])) {
   $user = $_SESSION['sub_executive'];
 }
 else {
   echo "<script> window.location.replace('home.php')</script>";
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="profile.css">
  </head>
  <body style="background:#e8eced;">
    <div class="bar" style="height: 100%;  position: fixed;  width: 13vw; padding: 0; margin-top: 0;background: black;">
      <nav>
        <ul>
          <li class="img"> <a href="#"> <?php
          if (isset($_SESSION['general'])) {
            $user = $_SESSION['general'];
            $q = mysqli_query($conn,"SELECT email, image FROM req_members WHERE email = '$user'");
            if (mysqli_num_rows($q)>0) {
              while ($a = mysqli_fetch_assoc($q)) {
                $image = $a['image'];
                ?>

                 <img src='image/<?php echo $image; ?>' height='100' width='100' style="border-radius:50%;" >
            <?php  }
            }
          }
          elseif (isset($_SESSION['president'])) {
            $user = $_SESSION['president'];
            $q = mysqli_query($conn,"SELECT email, image FROM president WHERE email = '$user'");
            if (mysqli_num_rows($q)>0) {
              while ($a = mysqli_fetch_assoc($q)) {
                $image = $a['image'];
                ?>

                 <img src='image/<?php echo $image; ?>' height='100' width='100' style="border-radius:50%;" >
            <?php  }
            }
          }
          elseif (isset($_SESSION['executive'])) {
            $user = $_SESSION['executive'];
            $q = mysqli_query($conn,"SELECT email, image FROM executive WHERE email = '$user'");
            if (mysqli_num_rows($q)>0) {
              while ($a = mysqli_fetch_assoc($q)) {
                $image = $a['image'];
                ?>

                 <img src='image/<?php echo $image; ?>' height='100' width='100' style="border-radius:50%;" >
            <?php  }
            }
          }

           ?>

           </a> </li>
           <li  > <a href="#" > <?php
           if (isset($_SESSION['general'])) {
             $user = $_SESSION['general'];

             $q = mysqli_query($conn,"SELECT fname, lname, email, image FROM  req_members WHERE email = '$user'");

             if (mysqli_num_rows($q)>0) {
               while ($a = mysqli_fetch_assoc($q)) {
                 $name = $a['fname'].' '.$a['lname'];
                 echo $name;
                 $e = mysqli_query($conn,"SELECT email FROM req_members WHERE email = '$user'");
                 if (mysqli_num_rows($e)==1) {
                   echo '<p style="font-size:0.87vw;color:gold; font-family:cursive;">general member, NSTU Debating Society</p>';
                 }



                 ?>


             <?php  }
             }
           }
           elseif (isset($_SESSION['president'])) {
             $user = $_SESSION['president'];
             $q = mysqli_query($conn,"SELECT fname, lname, email, image FROM president WHERE email = '$user'");

             if (mysqli_num_rows($q)>0) {
               while ($a = mysqli_fetch_assoc($q)) {
                 $name = $a['fname'].' '.$a['lname'];
                 echo $name;
                 echo '<p style="font-size:0.87vw;color:gold; font-family:cursive;">president, NSTU Debating Society</p>';
                 ?>


             <?php  }
             }
           }
           if (isset($_SESSION['executive'])) {
             $user = $_SESSION['executive'];
             $q = mysqli_query($conn,"SELECT fname, lname, email, image FROM executive WHERE email = '$user'");
             if (mysqli_num_rows($q)>0) {
               while ($a = mysqli_fetch_assoc($q)) {
                 $name = $a['fname'].' '.$a['lname'];

                 echo $name;
                 echo '<p style="font-size:0.87vw;color:gold; font-family:cursive;">executive, NSTU Debating Society</p>';
                 ?>


             <?php  }
             }
           }

            ?>

            </a> </li>


          <li class="add"> <a href="home.php"> Home </a> </li>
          <li> <a href="search-profile.php">Find others</a> </li>
         <?php if(isset($_SESSION['president'])){?>


         <li> <a href="addExecutive.php">add Executive</a> </li>
         <li> <a href="add-sub-executive.php">add Sub-Executive</a> </li>

         <li> <a href="event.php">Create Event</a> </li>





       <?php } ?>

       <?php if(isset($_SESSION['executive'])||isset($_SESSION['general'])){?>
         <li> <a href="participant.php">Upcoming Debates</a> </li>
     <?php  } ?>

         <?php if (isset( $_SESSION['executive'])) {?>
          <li> <a href="makeTeam.php">Create Team</a> </li>
        <?php } ?>

         <li> <a href="view-team-list.php">Team list</a> </li>
         <li> <a href="attended-debate.php">previous debate</a> </li>
         <li> <a href="winner.php">Winners</a> </li>
         <li> <a href="#"><form  method="post">
           <input type="submit" name="logout" value="LogOut">
         </form> </a> </li>

         <?php
         if (isset($_POST['logout'])) {
           session_destroy();
         }

          ?>

        </ul>
      </nav>
    </div>
  </body>
</html>
