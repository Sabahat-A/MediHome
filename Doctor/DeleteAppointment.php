<?php
session_start();
include "config.php"; // database configuration 

$Userid = $_GET['id'];//always same

$sql = "DELETE FROM appointment WHERE AID  = {$Userid}";

if(mysqli_query($conn, $sql)){
echo"<script> window.location.assign('INDEXAppointment.php');</script>";
     $_SESSION['status']="Delete APPOINTMENT";

}else{
   $_SESSION['status']="Can't Delete APPOINTMENT";
}

mysqli_close($conn);

?>