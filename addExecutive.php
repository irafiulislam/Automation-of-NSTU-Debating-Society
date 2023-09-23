<?php
require 'profile.php';
if(isset($_SESSION['president'])){

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
     <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="executive.css">
   </head>
   <body>
     <form  method="post" style="margin-left:20vw;padding-top:15vh;">
       <select class="" name="mem">
         <?php
          $q = mysqli_query($conn,"SELECT * FROM req_members");
          if (mysqli_num_rows($q)>0) {
            while ($a = mysqli_fetch_assoc($q)) {
               $pass = $a['password'];
               $fname = $a['fname'];
               $lname = $a['lname'];
               $dept = $a['dept'];
               $phone = $a['phone'];
               $image = $a['image'];
               $email = $a['email'];
              ?>

               <option value="<?php echo $a['email']; ?>"><?php echo $a['email']; ?></option>
          <?php  }
          }
          ?>
       </select>
       <input type="submit" name="add" value="add">

       <?php if (isset($_POST['add'])) {
         $mem = $_POST['mem'];
         $query = mysqli_query($conn,"INSERT INTO executive(fname,lname,email,phone,dept,image,password)VALUES('$fname',
         '$lname','$email','$phone','$dept','$image','$pass')");

           if($query){
             $delete = mysqli_query($conn,"DELETE FROM req_members WHERE email ='$email' ");
           }
       } ?>
     </form>

     <div class="print">
       <table id="example" class="display nowrap" width="100%">
         <caption style="font-size:7vh; font-weight:bold;">Executive List </caption>
        <thead>
            <th>SL</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Update</th>
        </thead>
        <tbody>
          <?php $s = mysqli_query($conn,"SELECT * FROM executive");
          $i=1;
            if (mysqli_num_rows($s)>0) {
              while ($a = mysqli_fetch_assoc($s)) {?>
                <tr>
                  <form  method="post">
                  <td><?php echo $i; ?></td>
                  <td><input type="text" name="sem" value="<?php echo $a['fname']; ?>"></td>
                  <td><input type="text" name="course" value="<?php echo $a['lname']; ?>"></td>
                  <td><input type="text" name="course" value="<?php echo $a['dept']; ?>"></td>
                  <td><input type="text" name="assign_to" value="<?php $email = $a['email'];echo $a['email']; ?>"></td>
                  <td><input type="text" name="assign_by" value="<?php echo $a['phone']; ?>"></td>

                    <td><input type="submit" name='delete<?php echo $i; ?>' value='delete<?php echo $i; ?>'></td>
                    </form>
                    <?php
                     $ses ="";
                      if (isset($_POST["delete$i"])) {
                        //$assign_to = $_POST['assign_to'];

                          $edit = mysqli_query($conn,"DELETE FROM executive WHERE email='$email'");
                          if ($edit) {
                            echo "<script> window.location.replace('addExecutive.php')</script>";
                          }
                      }

                     ?>


                </tr>
            <?php  $i++;}
            }
          ?>
        </tbody>
       </table>

     </div>
   </body>
 </html>
