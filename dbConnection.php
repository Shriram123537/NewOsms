<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "newosms";
$db_port = "3306";

//conection//
$conn = new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);

//conectiion checking //
if ($conn->connect_error) {
  die("Connection Failed");
}
/*else {
  echo "Connect";
}
 ?>*/
