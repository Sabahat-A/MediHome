<?php
session_start();
include "config.php"; // database configuration 

$Userid = $_GET['id'];//always same

$sql = "DELETE FROM  labtest WHERE labid   = {$Userid}";

if(mysqli_query($conn, $sql)){
echo"<script> window.location.assign('INDEXlab.php');</script>";
     $_SESSION['status']="Delete test";

}else{
   $_SESSION['status']="Can't Delete test";
}

mysqli_close($conn);

?>