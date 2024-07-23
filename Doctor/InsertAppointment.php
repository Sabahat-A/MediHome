<?php
include 'HeaderAppointment.php';

?>

<?php

include 'config.php';
if (isset($_POST['submit'])) {

$Fname=mysqli_real_escape_String($conn,$_POST['Fname']); //secureData
$LName=mysqli_real_escape_String($conn,$_POST['LName']); //secureData
$Email=mysqli_real_escape_String($conn,$_POST['Email']); //secureData
$Date=mysqli_real_escape_String($conn,$_POST['Date']); //secureData

      $sql1 = "INSERT INTO Appointment (Fname,LName,Email,Date)
                VALUES ('{$Fname}','{$LName}','{$Email}','{$Date}')";
$query=mysqli_query($conn,$sql1) or die("Can't insert data");
    if($query==1){
       
        $_SESSION['status']="Sucessfully Add Appointment ";
    
    }
      else{
        $_SESSION['status']="CAN'T ADD Appointment ";
      }
  
    //save data in text files
 
    //save data in text files
    mysqli_close($conn);
} ?>

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
<div id="insertedphp" class="bg-white mb-3 border border-2 border-secondary">
<div class="container">
      <div class="row">
            <div class="col" id="heig">                        
                        <div class="clearfix card-header mt-3" > <!---position set-->
                        <p id="h11" class="float-start ">Add Appointment:</p>
                        

                    </div>                   
<form action="<?PHP $_SERVER['PHP_SELF'];?>"  method="POST" autocomplete="off" id="inserted" 
    class="mx-auto dp-block">       
                    <div class="mb-3 mt-3">

      <label for="Brench_Name" class="p-2">Patient FName:</label>
          <div class="input-group p-2 col-sm-6">
    <span class="input-group-text">@</span>
      <input type="text" class="form-control"  placeholder="Fname" name="Fname" required>
    </div>
    <label for="Brench_Name" class="p-2">Patient LName:</label>
    <div class="input-group p-2 col-sm-6">
        
    <span class="input-group-text">@</span>
      <input type="text" class="form-control"  placeholder="LName" name="LName" required>
    </div>
   
    <div class="input-group p-2 col-sm-6">
    
      <input type="hidden" class="form-control bg-secondary"  placeholder="Fname" name="Email" 
      value="<?php echo $Email ?>" readonly required>
    </div>
    <label for="Brench_Name" class="p-2">Date:</label>
    <div class="input-group p-2 col-sm-6">
    <span class="input-group-text">@</span>
      <input type="Date" class="form-control"  placeholder="Fname" name="Date" required>
    </div>
    <div class="clearfix ">
    <button type="submit" name="submit" id="submits" class="btn btn-primary float-end">Submit<i class="fa fa-sign-in" aria-hidden="true"></i></button></div>
                </form>
                </div><!--FormInsert-->
            </div><!--Col-->
        </div><!--row-->
    </div><!--Container-->    
</div>
<?php include 'footer.php';?>


