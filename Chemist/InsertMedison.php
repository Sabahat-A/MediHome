<?php
include 'headeraddMedison.php';
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

$ArticleName=mysqli_real_escape_String($conn,$_POST['ArticleName']);
$MedisonName=mysqli_real_escape_String($conn,$_POST['MedisonName']);
$MedisonQty=mysqli_real_escape_String($conn,$_POST['MedisonQty']);
$MedisonDescription	=mysqli_real_escape_String($conn,$_POST['MedisonDescription']);
$Email=mysqli_real_escape_String($conn,$_POST['Email']);
$ShopName=mysqli_real_escape_String($conn,$_POST['ShopName']);
$Price=mysqli_real_escape_String($conn,$_POST['Price']);



   

   $sql1 ="INSERT INTO addmedison (ArticleName,MedisonName,MedisonQty,MedisonDescription,Email,ShopName,Price,Image)
 VALUES('{$ArticleName}','{$MedisonName}','{$MedisonQty}','{$MedisonDescription}','{$Email}','{$ShopName}','{$Price}','{$new_img_name}')";
          //ALWAYS REMEMBER INT WITHOUT'' DISPLAY
 $query=mysqli_query($conn,$sql1) or die("Can't insert data");
    if($query==1){
    
        
        $_SESSION['status']="<i>Sucessfully Add Medison Detail</i>";
//echo"<script> window.location.assign('INDEXNotificationImage.php');</script>";
        
    }
      else{
        $_SESSION['status']="Can't Add Medison Detail";
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
  <div class=" card-header">                       
<div class="clearfix col-sm" > <!---position set-->
<p id="h11" class="h3 d-flex justify-content-center m-2 p-0"> Add Medison DETAILS</p>
</div> </div>
<div  class="">
<div class="container bg-white mb-3 border border-2 border-secondary mt-5">
      <div class="row">
<div class="col-12">                        
                 
<form action="<?PHP $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST" class="col-md-12" autocomplete="off">       
  <!---Now start-->                 
 <div class="row">
    <div class="col">
      <label class="form-label">ArticleName</label>
      <input type="text" class="form-control"  name="ArticleName" placeholder="ArticleName"  autofocus required/>
    </div>
    <div class="col">
      <label class="form-label">MedisonName</label>
      <input type="text" class="form-control"  name="MedisonName"   placeholder="MedisonName" required/>
    </div>
   
  </div>
      <!---Now Last-->
                     
  <!---Now start-->                 
  <div class="row">
    <div class="col">
      <label class="form-label">MedisonQty</label>
      <input type="number" class="form-control"  name="MedisonQty" placeholder="MedisonQty"   required/>
    </div>
    <div class="col">
      <label class="form-label">Email</label>
      <input type="text" class="form-control bg-secondary"  name="Email"   value="<?php echo $Email ?>" readonly >
    </div>
   
  </div>
      <!---Now Last-->

  <!---Now start-->                 
  <div class="row">
  <div class="col">
      <label class="form-label">ShopName</label>
      <input type="text" class="form-control bg-secondary"  name="ShopName"   value="<?php echo $ShopName ?>" readonly >
    </div>
    <div class="col">
      <label class="form-label">Price</label>
      <input type="number" class="form-control "  name="Price" placeholder="Price"   required/>
    </div>
  
   
  </div>
      <!---Now Last-->
        <!---Now start-->                 
  <div class="row">
    <div class="col">
      <label class="form-label">MedisonDescription</label>
      <textarea type="text" class="form-control"  name="MedisonDescription" placeholder="MedisonDescription"   required/>
  </textarea>  </div>
   
   
  </div>
      <!---Now Last-->
     
<div class="row">
	
    <div class="col">
    <div class="mb-3 mt-1">
      <small>Select PDF File to upload:</small>
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












