

<?php
include 'headerLABTEST.PHP';
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




$sql = "SELECT TestName FROM  labtest WHERE TestName = '{$TestName}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    
    if(mysqli_num_rows($result) > 0){
      $_SESSION['status']="TEST NAME ALREADY ADD";
  
      }
   
else{
   $sql1 ="INSERT INTO labtest (ShopName,TestName,Price,Image)
 VALUES('{$ShopName}','{$TestName}','{$Price}','{$new_img_name}')";
          //ALWAYS REMEMBER INT WITHOUT'' DISPLAY
 $query=mysqli_query($conn,$sql1) or die("Can't insert data");
    if($query==1){
    
        
        $_SESSION['status']="<i>Sucessfully REGISTER TEST</i>";
//echo"<script> window.location.assign('INDEXNotificationImage.php');</script>";
        
    }
      else{
        $_SESSION['status']="Can't REGISTER TEST";
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
<p id="h11" class="h3 d-flex justify-content-center mt-4 p-0">ADD TEST DETAILS</p>
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
      <input type="text" class="form-control bg-secondary"  name="ShopName" placeholder="ShopName"  value="<?php echo $Email ?>" readonly required/>
    </div>
   
   
  </div>
      <!---Now Last-->
         <!---Now start-->                 
 <div class="row">
    <div class="col">
      <label class="form-label">TestName</label>
      <input type="text" class="form-control"  name="TestName" placeholder="TestName"   required/>
    </div>
   
   
  </div>
      <!---Now Last-->             
  
    <!---Now start-->                 
    <div class="row">
    <div class="col">
      <label class="form-label">Price</label>
      <input type="text" class="form-control"  name="Price" placeholder="Price"   required/>
    </div>
   
   
  </div>
      <!---Now Last--> 
      
     
<div class="row">
	
    <div class="col">
    <div class="mb-3 mt-1">
      <small>Select IMAGE :</small>
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
