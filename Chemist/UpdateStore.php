<?php 
include 'headerstore.php';

?>
<!---start-->
<?php 
include 'config.php';

  $upload_dir = '../pic/';


  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from registershop where ShopID=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
     $_SESSION['status'] ="Could not Find Any Record";
    }
  }

if (isset($_POST['submit'])) {
include 'config.php';
$ShopID=mysqli_real_escape_String($conn,$_POST['ShopID']);
$ShopName=mysqli_real_escape_String($conn,$_POST['ShopName']);

$Email=mysqli_real_escape_String($conn,$_POST['Email']);
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

     $sql = "update   registershop
      set ShopName = '".$ShopName."',
      Email = '".$Email."',        
        Image = '".$userPic."'
where ShopID =".$ShopID;
     $query = mysqli_query($conn, $sql) or die("query failed updated");
      if($query==1){
      
      
        $_SESSION['status']="Sucessfully Update Record!!!";
echo"<script> window.location.assign('INDEXStore.php');</script>";
       
    } //query1
     else{
      $_SESSION['status']="Can't Update Record.";
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
<input type="hidden" class="form-control" placeholder="ID" name="ShopID" value="<?php echo $row['ShopID'];?>" required/>

    </div>
   
  </div>
       <!---Now start-->                 
 <div class="row">
    <div class="col">
      <label class="form-label">ShopName</label>
      <input type="text" class="form-control"  name="ShopName" placeholder="ShopName" value="<?php echo $row['ShopName'];  ?>" autofocus required/>
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

