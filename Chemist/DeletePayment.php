<?php
session_start();
include "config.php"; // database configuration 

$Userid = $_GET['id'];//always same

$sql = "DELETE FROM payment WHERE PID  = {$Userid}";

if(mysqli_query($conn, $sql)){
echo"<script> window.location.assign('INDEXPayMent.php');</script>";
     $_SESSION['status']="Delete Payment Method";

}else{
   $_SESSION['status']="Can't Payment Method";
}

mysqli_close($conn);

?>