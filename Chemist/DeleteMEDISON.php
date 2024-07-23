<?php
session_start();
include "config.php"; // database configuration 

$Userid = $_GET['id'];//always same

$sql = "DELETE FROM addmedison WHERE IDMED   = {$Userid}";

if(mysqli_query($conn, $sql)){
echo"<script> window.location.assign('INDEXMedison.php');</script>";
     $_SESSION['status']="Delete MEDISON";

}else{
   $_SESSION['status']="Can't Delete MEDISON";
}

mysqli_close($conn);

?>