<?php 
include 'headeraddMedison.php';

?>
<!---start-->
<?php 
include 'config.php';

  $upload_dir = '../pic/';


  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from addmedison where IDMED=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
     $_SESSION['status'] ="Could not Find Any Record";
    }
  }

if (isset($_POST['submit'])) {
include 'config.php';
$IDMED=mysqli_real_escape_String($conn,$_POST['IDMED']);
$ArticleName=mysqli_real_escape_String($conn,$_POST['ArticleName']);
$MedisonName=mysqli_real_escape_String($conn,$_POST['MedisonName']);
$MedisonQty=mysqli_real_escape_String($conn,$_POST['MedisonQty']);
$MedisonDescription	=mysqli_real_escape_String($conn,$_POST['MedisonDescription']);
$Email=mysqli_real_escape_String($conn,$_POST['Email']);
$ShopName=mysqli_real_escape_String($conn,$_POST['ShopName']);
$Price=mysqli_real_escape_String($conn,$_POST['Price']);

 $imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];

    if($imgName){

      $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

      $allowExt  = array('jpg', 'jpeg', 'png','JPG','JPEG','PNG');

      $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

      if(in_array($imgExt, $allowExt)){

        if($imgSize < 4194304){
          unlink($upload_dir.$row['Image']); /* chhange according to condition*/
          move_uploaded_file($imgTmp ,$upload_dir.$userPic);
        }else{
          $_SESSION['status']='Image too large';
        }
      }else{
        $_SESSION['status']='Please select a valid image';
      }
    }else{

      $userPic = $row['Image'] ;
    }

     $sql = "update   addmedison
      set ArticleName = '".$ArticleName."',
      MedisonName = '".$MedisonName."',
      MedisonQty = '".$MedisonQty."',
      MedisonDescription = '".$MedisonDescription."',
      Email = '".$Email."',
      ShopName = '".$ShopName."',
      Price = '".$Price."',
        Image = '".$userPic."'
where IDMED =".$IDMED;
     $query = mysqli_query($conn, $sql) or die("query failed updated");
      if($query==1){
      
      
        $_SESSION['status']="Sucessfully Update MEDISON!!!";
echo"<script> window.location.assign('INDEXMedison.php');</script>";
       
    } //query1
     else{
      $_SESSION['status']="Can't Update MEDISON.";
      }

   
     mysqli_close($conn);

  }//bhr wala    


   
 ?>
<!---Finish-->
<!---Messgae show-->
 <div class="container" >
    <?php 
if(isset($_SESSION['status'])){
    ?>
 <div class="alert alert-success alert-dismissible p-3">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Dear</strong><?php echo $_SESSION['status'];?> 
</div>
<?php  
unset($_SESSION['status']);
}
?>
<div id="insertedphp">
<div class="container">
      <div class="row">
<div class="col" id="heig">                        
<div class=" card-header">                       
<div class="clearfix col-sm" > <!---position set-->
<p id="h11" class="h3 d-flex justify-content-center m-0 p-0">STORE_INFORMATION</p>
</div> </div>                   
<form action="<?PHP $_SERVER['PHP_SELF'];?>"  method="POST" autocomplete="off" id="inserted" 
    class="mx-auto dp-block" enctype="multipart/form-data">       
  <!---Now start-->                 
 <div class="row">
    <div class="col">
<input type="hidden" class="form-control" placeholder="ID" name="IDMED" value="<?php echo $row['IDMED'];?>" required/>

    </div>
   
  </div>
       <!---Now start-->                 
 <div class="row">
    <div class="col">
      <label class="form-label">ArticleName</label>
      <input type="text" class="form-control"  name="ArticleName" placeholder="ArticleName" 
      value="<?php echo $row['ArticleName'];  ?>" autofocus required/>
    </div>
    <div class="col">
      <label class="form-label">MedisonName</label>
      <input type="text" class="form-control"  name="MedisonName" value="<?php echo $row['MedisonName'];  ?>"  placeholder="MedisonName" required/>
    </div>
   
  </div>
      <!---Now Last-->
                     
  <!---Now start-->                 
  <div class="row">
    <div class="col">
      <label class="form-label">MedisonQty</label>
      <input type="number" class="form-control"  name="MedisonQty" placeholder="MedisonQty" 
      value="<?php echo $row['MedisonQty'];  ?>"  required/>
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
      <input type="number" class="form-control "  name="Price" placeholder="Price" value="<?php echo $row['Price'];  ?>"  required/>
    </div>
  
   
  </div>
      <!---Now Last-->
        <!---Now start-->                 
  <div class="row">
    <div class="col">
      <label class="form-label">MedisonDescription</label>
      <input type="text" class="form-control"  name="MedisonDescription" 
      value="<?php echo $row['MedisonDescription'];  ?>" placeholder="MedisonDescription"   required/>
   </div>
   
   
  </div>
      <!---Now Last-->
      <!---Now Last-->
    <div class="col">
    <div class="mb-3 mt-1">
      Select PDF Files to upload:
   <label for="image">Files</label>
    <img src="../pic/<?php echo $row['Image'] ?>" width="100px" height="50px">
   <input type="file" name="image" class="form-control" placeholder="Image" accept=".PNG,.JPEG,.JPG,.png,.jpeg,.jpg"  />
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