<?php
require 'profile.php';
if (isset($_SESSION['president'])) {
  $user = $_SESSION['president'];
}
else {
  // code...
}
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form  method="post" style="margin-left:20%; padding-top:10vh;">
       <select  name="dbt" >
         <?php

           $d = mysqli_query($conn,"SELECT * FROM debatelist");
            if (mysqli_num_rows($d)>0) {
              while ($a = mysqli_fetch_assoc($d)) {
                $debate = $a['dname']; ?>
              <option value="<?php echo $debate; ?>"><?php echo $debate; ?></option>


            <?php
           }
          }



          ?>
       </select>

       <input type="date" name="end" >

       <input type="submit" name="create" value="create">

       <?php if (isset($_POST['create'])) {
         $end = $_POST['end'];
         $dbt = $_POST['dbt'];

         $event = mysqli_query($conn,"INSERT INTO event(event, event_by, held_at)VALUES('$dbt','$user','$end')");
       } ?>

     </form>
   </body>
 </html>
