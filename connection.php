<?php
$hostname='localhost:3306';
$username='root';
$password='AKNashish159@';
// $port='3306';
$dbname='facebook';
$conn=mysqli_connect($hostname,$username,$password,$dbname);

if(!$conn){
    die('Could not connect'.mysqli_connect_error());
}
else{
    echo "Connection Successfully";

    mysqli_select_db($conn,$dbname);
      
  } 
  $conn->set_charset("utf8");
  return $conn;
  mysqli_close($conn);
 
?>