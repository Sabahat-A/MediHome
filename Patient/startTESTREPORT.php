<?php
include 'HEADERCHEMIST.php';
?>



<?php 
include 'config.php';
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
include 'config.php';
  $img_name = $_FILES['my_image']['name'];
  $img_size = $_FILES['my_image']['size'];
  $tmp_name = $_FILES['my_image']['tmp_name'];
  $error = $_FILES['my_image']['error'];
  if ($error === 0) {
    if ($img_size > 4194304) { //1024*1024 =mbs
       $_SESSION['status']="Sorry, your file is too large.Allow only 3mb File";

    }else {
      $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
      $img_ex_lc = strtolower($img_ex);

      $allowed_exs = array("jpg", "jpeg", "png","PNG","JPG","JPEG"); 

      if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = '../pic/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

$ShopName=mysqli_real_escape_String($conn,$_POST['ShopName']);
$TestName=mysqli_real_escape_String($conn,$_POST['TestName']);
$Price=mysqli_real_escape_String($conn,$_POST['Price']);
$emailUser=mysqli_real_escape_String($conn,$_POST['emailUser']);




   

   $sql1 ="INSERT INTO testpro (ShopName,TestName,Price,emailUser,Image)
 VALUES('{$ShopName}','{$TestName}','{$Price}','{$emailUser}','{$new_img_name}')";
          //ALWAYS REMEMBER INT WITHOUT'' DISPLAY
 $query=mysqli_query($conn,$sql1) or die("Can't insert data");
    if($query==1){
    
        
        $_SESSION['status']="<i>Sucessfully ADD TEST </i>";
//echo"<script> window.location.assign('INDEXNotificationImage.php');</script>";
        
    }
      else{
        $_SESSION['status']="Can't ORDER TEST";
      }

}//if array
}//else
}//else
 //save data in text files
   
       mysqli_close($conn);
}//else
   
   
   
 ?>
<!---Finish-->


<!---Messgae show-->
<div class="container" >
    <?php 
if(isset($_SESSION['status'])){
    ?>
 <div class="alert alert-primary alert-dismissible p-3">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Hey!</strong><?php echo $_SESSION['status'];?> 
</div>
<?php  
unset($_SESSION['status']);
}
?> </div><!---Messgae show-->
 <?php
               
               include "config.php";
                          
                  $dep_id = $_GET['id'];
                     
                       $sql = "SELECT * FROM  labtest WHERE labid  = {$dep_id}";
                   
                         $result = mysqli_query($conn, $sql) or die("Query Failed.");
                         
                   if(mysqli_num_rows($result) > 0){
                           
                   while($row = mysqli_fetch_assoc($result)){
                   $shopsname=$row['ShopName'];
                   $TN=$row['TestName'];
                   $p=$row['Price'];
                         ?>
              
              <!----->
<style>
    .border{
        border:3px solid black;
    }
</style>
<!---ORDERDETAILS-->
<div class="container border border-3 mt-4 " style="background-color:rgba(0,128,128,0.6);">
    <div class="row">
        <div class="col-6 p-2 ">
          <!---FORMS-->
          <form action="<?PHP $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST" class="col-md-12" autocomplete="off">       
  <!---Now start-->                 
 <div class="row">
    <div class="col">
      <label class="form-label">ShopName</label>
      <input type="text" class="form-control"  name="ShopName" value="<?php echo $shopsname ?>"  autofocus required/>
    </div>
   
   
  </div>
      <!---Now Last-->
                     
  <!---Now start-->                 
  <div class="row">
    <div class="col">
      <label class="form-label">TestName</label>
      <input type="TEXT" class="form-control"  name="TestName" placeholder="MedisonQty" value="<?php echo $TN ?>"  required/>
    </div>
    <div class="col">
      <label class="form-label">PRICE</label>
      <input type="text" class="form-control bg-secondary"  name="Price"   value="<?php echo $p ?>" readonly >
    </div>
    
  </div>
      <!---Now Last-->

  <!---Now start-->                 
  <div class="row">
  <div class="col">
      <label class="form-label">UserName</label>
      <input type="text" class="form-control bg-secondary"  name="emailUser"   value="<?php echo $Email ?>" readonly >
    </div>
   
  
   
  </div>
      <!---Now Last-->
      
     
<div class="row">
	
    <div class="col">
    <div class="mb-3 mt-1">
      <small>Upload Payment Receipt:</small>
   <label for="exampleInputPassword1"><i>File:</i></label>
   <input type="file" name="my_image" class="form-control" placeholder="File" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" required/>
                      </div>
                     
<!--Last-->
</div>
</div> <!---row-->
    <div class="clearfix ">
    <button type="submit" name="submit" id="submits" class="btn btn-primary float-start">Submit<i class="fa fa-sign-in" aria-hidden="true"></i></button></div>
                </form>

          <!--FORMS-->
        </div>
        <div class="col-6 p-2">
        <?php
include 'config.php';
 
 $sql1="select * from payment     ORDER BY PID ";
$result=mysqli_query($conn,$sql1) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
      
//end of curly bracess after table tag close
while($row=mysqli_fetch_assoc($result)){
    ?>
<h5 class="justify-content-center">Please Scan QR Code To Payment</h5>
<a  target="_blank" href="../pic/<?php echo $row['Image']; ?>" style="list-style-type: none; color: Black;">
    <img  src="../pic/<?php echo $row['Image']; ?>"  alt="images" class="card-img-top mx-auto d-block"  style="width:200px">  </a>

        </div>
        <?php
}
}?>
    </div>
</div> </div>





<!---ORDERDETAILS-->


   
</div>
</div>
</div>
</div>

<?php include 'footer.php';  }}?>