<?php
require 'profile.php';
 ?>
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
          <caption style="font-size:7vh; font-weight:bold;">Today Team List </caption>
        <thead>
            <th>SL</th>
              <th>Debate Name</th>
            <th>Team</th>
            <th>participant 1</th>
            <th>participant 2</th>
            <th>participant 3</th>
            <th> Winer</th>


        </thead>
        <tbody>
          <?php $s = mysqli_query($conn,"SELECT * FROM create_team");
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

                  <td> <form method="post">
                  <input type="submit" name="winner<?php echo $i; ?>" value="winner" style="background:gold;">
                  </form> </td>

                 <?php
                   if (isset($_POST["winner$i"])) {
                     $dname = $a['dname'];
                     $tname = $a['tname'];
                     $p1 = $a['p1'];
                     $p2 = $a['p2'];
                     $p3 = $a['p3'];

                        $sel = mysqli_query($conn,"SELECT * FROM winner WHERE tname='$tname'");
                        if (mysqli_num_rows($sel)==0) {
                          $query = mysqli_query($conn,"INSERT INTO winner( dname,tname,p1,p2,p3) VALUES('$dname','$tname','$p1','$p2','$p3')");
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
