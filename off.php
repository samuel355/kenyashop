<?php
  $hostname = "localhost";
  $username = "landand2_landandhomesadmin";
  $password = "MoneyInTheBank026@";
  $dbname = "landand2_lhc_db";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
$connect = new PDO("mysql:host=localhost;dbname=landand2_lhc_db", "landand2_landandhomesadmin", "MoneyInTheBank026@");