<?php
function connect(){

      $dbHost= "localhost";
      $user= "root";
      $pass= "";
      $dbname="nstuds";

      $conn= new mysqli($dbHost, $user, $pass, $dbname);
      //echo "connected";

      return $conn;



}

 ?>
