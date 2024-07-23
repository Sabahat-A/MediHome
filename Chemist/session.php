

<?php
session_start();
include 'config.php';
$Email=$_SESSION["Email"];
//echo $user;
$sql="select * from login join userrole  ON  login.UserRole=userrole.UserID 
where Email='$Email' ";
$result=mysqli_query($conn,$sql) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
    //end of curly bracess after table tag close
    while($row=mysqli_fetch_assoc($result)){
$UserID=$row["UserID"];
$Email=$row["Email"];
$Fname=$row["Fname"];
$Lname=$row["Lname"];
$UserRole=$row["UserRole"];
$UserRole=$row["UserRole"];
$PNo=$row["PNo"];
$City=$row["City"];
$UAddress=$row["UAddress"];

$Image=$row["Image"];
    ?>
    
<?php
   }}
 ?>


<?php

include 'config.php';

//echo $user;
$sql="select * from registershop   where Email='$Email'  ORDER BY ShopID ";
$result=mysqli_query($conn,$sql) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
    //end of curly bracess after table tag close
    while($row=mysqli_fetch_assoc($result)){
$ShopName=$row["ShopName"];


$ShopImage=$row["Image"];
    ?>
    
<?php
   }}
 ?>