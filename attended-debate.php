<?php
require 'profile.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

   <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
   <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
   <link rel="stylesheet" href="view.css">
  </head>
  <body>
    <div class="print">
      <table id="example" class="display nowrap" width="100%">
        <caption style="font-size:7vh; font-weight:bold;">Previous Debate participants </caption>
       <thead>
           <th>SL</th>
             <th>Debate Name</th>
           <th>Team</th>
           <th>participant 1</th>
           <th>participant 2</th>
           <th>participant 3</th>


       </thead>
       <tbody>
         <?php $s = mysqli_query($conn,"SELECT * FROM joined_debate WHERE p1 = '$user' OR p2='$user'OR p3='$user'");
         $i=1;
           if (mysqli_num_rows($s)>0) {
             while ($a = mysqli_fetch_assoc($s)) {?>
               <tr>

                 <td><?php echo $i; ?></td>
                   <td><input type="text" name="assign_by" value="<?php echo $a['dname']; ?>"></td>
                 <td><input type="text" name="sem" value="<?php echo $a['tname']; ?>"></td>

                 <td><input type="text" name="course" value="<?php echo $a['p1']; ?>"></td>
                 <td><input type="text" name="course" value="<?php echo $a['p2']; ?>"></td>
                 <td><input type="text" name="assign_to" value="<?php echo $a['p3']; ?>"></td>




               </tr>
           <?php  $i++;}
           }
         ?>
       </tbody>
      </table>

    </div>
  </body>
</html>
