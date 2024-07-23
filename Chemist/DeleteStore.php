<?php
session_start();
include "config.php"; // database configuration 

$Userid = $_GET['id'];//always same

$sql = "DELETE FROM registershop WHERE ShopID  = {$Userid}";

if(mysqli_query($conn, $sql)){
echo"<script> window.location.assign('INDEXStore.php');</script>";
     $_SESSION['status']="Delete StoreName";

}else{
   $_SESSION['status']="Can't Delete StoreName";
}

mysqli_close($conn);

?>