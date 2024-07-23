<?php
include 'header.php';
?>
<?php

include 'config.php';
if (isset($_POST['submit'])) {

$DREmail=mysqli_real_escape_String($conn,$_POST['DREmail']); //secureData
$DRName=mysqli_real_escape_String($conn,$_POST['DRName']); //secureData
$UserEmail=mysqli_real_escape_String($conn,$_POST['UserEmail']); //secureData
$UserName=mysqli_real_escape_String($conn,$_POST['UserName']); //secureData
$text=mysqli_real_escape_String($conn,$_POST['text']); //secureData

      $sql1 = "INSERT INTO drconversation (DREmail,DRName,UserEmail,UserName,text)
                VALUES ('{$DREmail}','{$DRName}','{$UserEmail}','{$UserName}','{$text}')";
$query=mysqli_query($conn,$sql1) or die("Can't insert data");
    if($query==1){
       
        $_SESSION['status']="Sucessfully Send Message ";
    
    }
      else{
        $_SESSION['status']="CAN'T Send Message ";
      }
  
    //save data in text files
 
    //save data in text files
    mysqli_close($conn);
} ?>





<style type="text/css">
@media screen and (max-width: 12000px){
    body{
    
    


        background-image: url("../IMAGES/chatback.jpg");
 
  background-repeat:  no-repeat;

 background-size:cover;
  }
  

}

</style>
<?php
               
               include "config.php";
                          
                  $dep_id = $_GET['id'];
                     
                       $sql = "SELECT * FROM login WHERE UserID = {$dep_id}";
                   
                         $result = mysqli_query($conn, $sql) or die("Query Failed.");
                         
                   if(mysqli_num_rows($result) > 0){
                           
                   while($row = mysqli_fetch_assoc($result)){
                    $FN=$row['Fname'];
                    $LN=$row['Lname'];
                    $Em=$row['Email'];

                                             ?>
                                             <!--MESSAGE SHOW-->
<div class="container" >
    <?php 
if(isset($_SESSION['status'])){
    ?>
 <div class="alert bg-info  alert-dismissible p-3">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Hey!</strong><?php echo $_SESSION['status'];?> 
</div>
<?php  
unset($_SESSION['status']);
}
?>
</div><!--MESSAGE SHOW-->
<div class="container mt-5" style="border:2px solid black;">
    <div class="row">
        <div class="col-6 mt-5">
        <form action="<?PHP $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off" id="inserted" class="mx-auto dp-block">  
<!---Now start-->                 
<div class="row">
    <div class="col">
  <!--      <label  class="p-2">ReceiverEmail:</label> -->
      <input type="hidden" class="form-control" maxlength="4"   name="DREmail" value="<?php echo $Email ?>" readonly/>
    </div>
    <div class="col">
     <!--   <label  class="p-2">ReceiverName:</label> -->
      <input type="hidden" class="form-control" maxlength="4"  placeholder="DRName" name="DRName"
      value="<?php echo $Fname." ".$Lname; ?>" readonly/>
    </div>
  </div>
      <!---Now Last-->
      <!---Now start-->                 
<div class="row">
    <div class="col">
 <!--       <label  class="p-2">SEnderEmail:</label> -->
      <input type="hidden" class="form-control"    name="UserEmail" value="<?php echo $Em; ?>" readonly readonly/>
    </div>
    <div class="col">
     <!--   <label  class="p-2">SEnderName:</label> -->
      <input type="hidden" class="form-control"   placeholder="DRName" name="UserName"
      value="<?php echo $FN." ".$LN; ?>" readonly/>
    </div>
  </div>
      <!---Now Last-->
       <!---Now start-->                 
<div class="row">
    <div class="col">
        <label  class="p-2 h4">SMS:</label>
      <textarea type="text" class="form-control bg-light"  cols="5" rows="9"  name="text"  required/></textarea>
    </div>
    
  </div>
      <!---Now Last-->



        <div class="clearfix">
    <button type="submit" name="submit" id="submits" class="btn btn-outline-info float-start">Submit<i class="fa fa-sign-in" aria-hidden="true"></i></button></div>
                </form> 
        </div><!---col-6--><?php 
}}?>
        <div class="col-6 " id="headbarchat" style="border-left-style: solid;">
            


<!----------->

<div class="backbtn m-4" >



<div id="oper" >

 <span id="hea" class="mr-2 " ><img src="../pic/<?php echo $Image ?>"  class="rounded-circle pr-3" alt="images" width="80px" height="60px" target="_blank"></span><span class="h2" style=" color: darkblue;
    text-shadow: -1px 0 rgb(196, 17, 17), 0 1px black, 1px 0 black, 0 -1px black;"> <?php echo $Fname." ".$Lname ?></span>
                 <div class="chatbox">
 <h2 class="d-flex justify-content-center" id="title"> <i>MEDI-HOME SYSTEM</i></h2>
                 </div>
                 <hr id="line">
                 <!--Display scenario-->
                 <div class="displaychat mh-25" style="height:320px;overflow-y:auto;border:2px solid gray;" > 
                 <?php  
include 'config.php';
//$sql="select * from chats whree TouserID='$UserID' and FromuserID='UserID'";
$sql="select * from drconversation
where DREmail='$Email' AND UserEmail='$Em' order by D1 DESC ";
$result=mysqli_query($conn,$sql) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
//end of curly bracess after table tag close
while($row=mysqli_fetch_assoc($result)){
    ?>

  <div class="displaymessage " style=" border-radius: 25px 200px;" >
   
 <small class="h6">Doctor:<?php  echo $Fname; ?></small>
</h5>
 <h4 style="padding-left: 50px;"><?php  echo $row['text']; ?> </h4>


 <div class="mb-3"></div>

</div>
 <!---insertCode--->

 <!---insertCode--->
<?php  }}?>
</div> </div> 
       </div>
   </div>












<!------------>








        
            </div><!---col-6-->
    </div><!---row-->
</div><!---container-->