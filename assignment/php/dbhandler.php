<?php


          $servername = "localhost";
          $password = "sqlpassword";
          $dbname = "users";
          $username = "kipruto";
          
          $conn = mysqli_connect($servername, $username, $password, $dbname);

   if(!$conn){
       die("connection failed ".mysqli_connect_error());
   }
