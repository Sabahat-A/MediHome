<?php
include 'headerstore.php';
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

$Email=mysqli_real_escape_String($conn,$_POST['Email']);



$sql = "SELECT ShopName FROM  registershop WHERE ShopName = '{$ShopName}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    $sql0 = "SELECT Email FROM  registershop WHERE Email = '{$Email}'";
    $result3 = mysqli_query($conn, $sql0) or die("Query Failed.");

    if(mysqli_num_rows($result3) > 0){
      $_SESSION['status']="YOU CAN REGISTER ONLY ONE SHOP";
  
      }
   
else{
   $sql1 ="INSERT INTO registershop (ShopName,Email,Image)
 VALUES('{$ShopName}','{$Email}','{$new_img_name}')";
          //ALWAYS REMEMBER INT WITHOUT'' DISPLAY
 $query=mysqli_query($conn,$sql1) or die("Can't insert data");
    if($query==1){
    
        
        $_SESSION['status']="<i>Sucessfully REGISTER Medical Store</i>";
//echo"<script> window.location.assign('INDEXNotificationImage.php');</script>";
        
    }
      else{
        $_SESSION['status']="Can't REGISTER Medical Store";
      }
    } //else 
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
<div class=" card-header">                       
<div class="clearfix col-sm" > <!---position set-->
<p id="h11" class="h3 d-flex justify-content-center mt-4 p-0">STORE_INFORMATION</p>
</div> </div> 
<div  class="">
<div class="container bg-white mb-3 border border-2 border-secondary mt-5">
      <div class="row">
<div class="col-12">                        
               
<form action="<?PHP $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST" class="col-md-12" autocomplete="off">       
  <!---Now start-->                 
 <div class="row">
    <div class="col">
      <label class="form-label">ShopName</label>
      <input type="text" class="form-control"  name="ShopName" placeholder="ShopName"  autofocus required/>
    </div>
   
   
  </div>
      <!---Now Last-->
                     
  <!---Now start-->                 
  <div class="row">
    
    <div class="col">
      
      <input type="hidden" class="form-control"  name="Email"   value="<?php echo $Email ?>" readonly >
    </div>
   
  </div>
      <!---Now Last-->

      
     
<div class="row">
	
    <div class="col">
    <div class="mb-3 mt-1">
      <small>Select LOGO :</small>
   <label for="exampleInputPassword1"><i>File:</i></label>
   <input type="file" name="my_image" class="form-control" placeholder="File" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" required/>
                      </div>
                      </div> 
                      </div>
<!--Last-->
</div>
</div> <!---row-->
    <div class="clearfix ">
    <button type="submit" name="submit" id="submits" class="btn btn-primary float-end">Submit<i class="fa fa-sign-in" aria-hidden="true"></i></button></div>
                </form>
                </div><!--FormInsert-->
            </div><!--Col-->
        </div><!--row-->
    </div><!--Container-->    
</div>
