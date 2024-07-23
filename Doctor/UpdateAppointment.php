<?php 
include 'HeaderAppointment.php';

?>

<!----->
<?php

include 'config.php';
if(isset($_POST['submit']))
{
 include "config.php";
  $AID =mysqli_real_escape_string($conn,$_POST['AID']); 
  $Fname=mysqli_real_escape_String($conn,$_POST['Fname']); //secureData
  $LName=mysqli_real_escape_String($conn,$_POST['LName']); //secureData
  $Email=mysqli_real_escape_String($conn,$_POST['Email']); //secureData
  $Date=mysqli_real_escape_String($conn,$_POST['Date']); //secureData
$sql1 = "UPDATE appointment SET Fname = '{$Fname}',
LName = '{$LName}',
Email = '{$Email}',
Date = '{$Date}'
WHERE AID={$AID}";



$query= mysqli_query($conn,$sql1) or die("Can't update");
 
      if($query==1){
        $_SESSION['status']="Sucessfully Update Appointment ";
echo"<script> window.location.assign('INDEXAppointment.php');</script>";
      }     
    

 
}
mysqli_close($conn);
?>
  <?php
               
 include "config.php";
            
    $dep_id = $_GET['id'];
       
         $sql = "SELECT * FROM appointment WHERE AID = {$dep_id}";
     
           $result = mysqli_query($conn, $sql) or die("Query Failed.");
           
     if(mysqli_num_rows($result) > 0){
             
     while($row = mysqli_fetch_assoc($result)){
     
           ?>

<!----->

 <div class="container-fluid" >
    <?php 
if(isset($_SESSION['status'])){


    ?>
 <div class="alert alert-success alert-dismissible p-3">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Hey!</strong><?php echo $_SESSION['status'];?> 
</div>
<?php  
unset($_SESSION['status']);
}
?>
<div id="insertedphp">
    

<div class="container">
        <div class="row">
            <div class="col">                        
                        <div class="clearfix card-header" > <!---position set-->
                        <p id="h11" class="float-start ">Update Appointment:</p>
                        

                    </div>    
              
 <form action="<?PHP $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off" id="inserted" class="mx-auto dp-block">       
                    <div class="mb-3 mt-3">

                    <div class="mb-3 mt-3">

<label for="Brench_Name" class="p-2">Patient FName:</label>
    <div class="input-group p-2 col-sm-6">
<span class="input-group-text">@</span>
<input type="hidden" class="form-control"  placeholder="Fname" name="AID" value="<?php echo $row['AID'];?>" required>
<input type="text" class="form-control"  placeholder="Fname" name="Fname" value="<?php echo $row['Fname'];?>" required>
</div>
<label for="Brench_Name" class="p-2">Patient LName:</label>
<div class="input-group p-2 col-sm-6">
  
<span class="input-group-text">@</span>
<input type="text" class="form-control"  placeholder="LName" name="LName" value="<?php echo $row['LName'];?>" required>
</div>

<div class="input-group p-2 col-sm-6">

<input type="hidden" class="form-control bg-secondary"  placeholder="Fname" name="Email"  value="<?php echo $Email ?>" readonly required>
</div>
<label for="Brench_Name" class="p-2">Date:</label>
<div class="input-group p-2 col-sm-6">
<span class="input-group-text">@</span>
<input type="Date" class="form-control"  placeholder="Fname" name="Date" value="<?php echo $row['Date'];?>" required>
</div>
    <div class="clearfix">
    <button type="submit" name="submit" id="submits" class="btn btn-primary float-end">Submit<i class="fa fa-sign-in" aria-hidden="true"></i></button></div>
                </form> <?php 

}
} ?>
               
                </div><!--FormInsert-->
            </div><!--Col-->
        </div><!--row-->
    </div><!--Container-->    
</div>