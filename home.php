<?php
include 'connection.php';
$conn = connect();
session_start();

 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
  
     <link rel="stylesheet" href="home.css">
   </head>
   <body style="background:#c9106d;">
     <div class="first">
       <div class="inFa">
         <nav style="position:fixed; width:100%; height:10vh;margin:0;padding:0;">
         <a href="#" style=""> <img src="nstuds.jpg" style="height:7vh; margin-left:0;margin-top: 2vh;" alt=""> </a>
         <a href="#" style="margin-left:25%;">Home</a>

         <a href="#gallery">Gallery</a>
         <a href="#event">Events</a>
          <a href="#about">About Us</a>

         <a href="mlogin.php">Login</a>
       </nav>




       </div>

       <div class="extra" style="height:10vh;  margin-top:0vh;">
         <h1 style="margin-top:-45vh;margin-left:50vw;font-family:cursive;font-size:10vh;font-size: 80px;
  color: #fff;
  text-align: center;
  animation: glow 1s ease-in-out infinite alternate;"> "মেতে উঠো যুক্তির লড়াইয়ে" </h1>
       </div>



     </div>
     <div class="second" id="event" style="background:black;height:20vh;"><br><br>
       <center><h1 style="color:#c9106d;">Upcoming Events !</h1> </center><br><br>
       <?php
       $event = mysqli_query($conn,"SELECT * FROM event");
       if (mysqli_num_rows($event)>0) {
         while ($a=mysqli_fetch_assoc($event)) {?>
          <div class="" style="background:grey;opacity:0.9;height:10vh;width:25vw;margin-left: 3.2vw;;margin-right: 1.5vw;padding-left:2vw;float:left;">
            <?php echo '<h1 style="color:pink;">'.$a['event'].'</h1>'; ?>
            <p style="color:gold; font-weight:bold;">This is going to held on <?php echo $a['held_at']; ?>.</p>
          </div>
        <?php }
       }
        ?>
     </div>
     <div class="third" id="gallery" style="background:black; margin-top:20vh;height:auto;">
          <br><br><br><br>
        <center><h1 style="color:#c9106d;">Gallery</h1> </center>

      <?php $g=mysqli_query($conn,"SELECT * FROM gallery");
      if(mysqli_num_rows($g)>0){
        while($h = mysqli_fetch_assoc($g)){    $image = $h['image'];?>

          <img src='image/<?php echo $image; ?>' height='200' width='195' style="border-radius:2px;margin-left: 0.95vw;margin-top:2vh;" >
      <?php  }
      } ?>
     </div>

     <div class="fourth" id="about" style="background:black; margin-top:4vh;height:120vh;width:100%;">
       <br><br><br><br>
     <center><h1 style="color:#c9106d;">About Us</h1> </center>
     <br>
        <center><h2 style="color:pink;"><u>President</h1></u> </center>
          <hr>

        <?php

        $pres = mysqli_query($conn,"SELECT * FROM president");

        if (mysqli_num_rows($pres)>0) {
          while ($p = mysqli_fetch_assoc($pres)) {
            $image = $p['image'];
            $pre = $p['fname'].' '.$p['lname'];
            ?>
            <img src='image/<?php echo $image; ?>' height='200' width='195' style="border-radius:50%;margin-left: 43vw;margin-top:5vh;" >
            <p style="margin-left: 47vw;margin-top:2vh;color: white;"><?php echo $pre; ?></p>

          <?php
        }
        }

         ?>

         <br><br>
            <center><h2 style="color:pink;"><u>Executives</h1></u> </center>
              <hr>
              <br><br>

            <?php

            $pres = mysqli_query($conn,"SELECT * FROM executive");

            if (mysqli_num_rows($pres)>0) {
              while ($p = mysqli_fetch_assoc($pres)) {
                $image = $p['image'];
                $pre = $p['fname'].' '.$p['lname'];
                ?>
                <div class="" style="margin-left: 2vw;float:left;">

                  <img src='image/<?php echo $image; ?>' height='200' width='197'  style="border-radius:50%;">
                  <p style="margin-left: 4vw;color: white;"><?php echo $pre; ?></p>
                </div>



              <?php
            }
            }

             ?>


     </div>


     <div class="end" style="height:20vh; background:grey; opacity:0.7;"><br><br><br>
    <center>  developer @MD.Rafi Ul Islam </center>
     </div>
   </body>
 </html>
