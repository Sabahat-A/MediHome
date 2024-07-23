<!DOCTYPE html>
<html>
<head>
  <!--Inline CSS-->
<style type="text/css">
@media screen and (max-width: 12000px){
    body{
    
    


     background-image: url("IMAGES/background.jpg");
  background-position:  left top;
  background-repeat:  no-repeat;

 background-size:cover;
  }
  

}
.alert-success{

}
#borders{
    margin-top: 3px;
  background-color: rgba(231, 18, 174,0.3);
    height: auto;
}

</style>

 <!--Inline finished-->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MEDI-HOME SYSTEM</title>
  <link rel="icon" type="image/x-icon" href="IMAGES/LogoMED.png"> <!---Logo-->
  <!--BOOSTRAP_LINK Start--->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <!--BOOSTRAP_LINK End--->
  <!--JQUERY_LINK START-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--JQUERY_LINK END-->
  <!--FONT AWEASOME LINKS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--FONT AWEASOME LINKS END-->
<!--google font-->
<!--GOOGLE_FONT-->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Lato&family=Reem+Kufi+Fun&family=Roboto&display=swap" rel="stylesheet">
<!---font--->
<!--CSS FILES-->
<link rel="stylesheet"  href="CSS/Signup.css">

</head>
<body  >

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
        $img_upload_path = 'pic/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
session_start();
$Fname=mysqli_real_escape_String($conn,$_POST['Fname']);
$password=mysqli_real_escape_String($conn,$_POST['password']);
 
$Lname=mysqli_real_escape_String($conn,$_POST['Lname']);  
$UserRole=mysqli_real_escape_String($conn,$_POST['UserRole']);
$Email=mysqli_real_escape_String($conn,$_POST['Email']);   
$PNo=mysqli_real_escape_String($conn,$_POST['PNo']); 
$City=mysqli_real_escape_String($conn,$_POST['City']);
$UAddress=mysqli_real_escape_String($conn,$_POST['UAddress']);
        // Insert into Database
$sql = "SELECT Email FROM login WHERE Email = '{$Email}'";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
  $sql2 = "SELECT password FROM login WHERE password = '{$password}'";
    $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");



 if(mysqli_num_rows($result) > 0){
    $_SESSION['status']="Email already exixts";

    }
  
    elseif(mysqli_num_rows($result2) > 0) {
        $_SESSION['status']="Password already exixts";
    }
   
else{
    $sql1 = "INSERT INTO login (Fname,Lname,password,Email,PNo,City,UserRole,UAddress,Image)
 VALUES('{$Fname}','{$Lname}','{$password}','{$Email}','{$PNo}','{$City}','{$UserRole}','{$UAddress}','{$new_img_name}')";
          //ALWAYS REMEMBER INT WITHOUT'' DISPLAY
 $query=mysqli_query($conn,$sql1) or die("Can't insert data");
    if($query==1){
       
       
        $_SESSION['status']="Sucessfully  Register";
//echo"<script> window.location.assign('IndexUserRegister.php');</script>";
        
    }
      else{
         $_SESSION['status']="Can't Insert exixts";
      }
    } //else 
}//if array
}//else
}//else

       mysqli_close($conn);
}//else
   
   
   
 ?>





<div id="borders">
      <div class="container-fluid">
      <div class="row">
        <div class="col-sm-5">
       <li><i class="fa-solid fa-users" style="font-size: 20px;
  color: #6666CC;"></i>
  <a href="SignUp.php" style="font-family: 'Roboto', sans-serif;" data-bs-toggle="tooltip" title="SignUp">SignUp</a></li>
    <li><i class="fa-solid fa-right-to-bracket" style="font-size: 20px;
  color: #6666CC;"></i><a href="Login.php" style="font-family: 'Roboto', sans-serif;" data-bs-toggle="tooltip" title="LOGIN">Login</a></li>
        </div>
          <div class="col-7 col-md-auto ">
          <h4 class="med " >MEDI-HOME SYSTEM</h4>
        </div>
      </div><!---ROW-->
    </div><!--Contain-fluid-->
</div><!---border-->

<!---SIGNUP-->
<!--MESSAGE SHOW-->
<div class="container" >
    <?php 
if(isset($_SESSION['status'])){
    ?>
 <div class="alert alert-success alert-danger alert-dismissible p-3">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Hey!</strong><?php echo $_SESSION['status'];?> 
</div>
<?php  
unset($_SESSION['status']);
}
?>
</div><!--MESSAGE SHOW-->
<div class="container mt-2" >

<div class="login pt-2 ">
    
<div class="container  w-md-75">
<div class="row ">
<div id="borderRad" class="col-12 mx-auto w-50 h-50 shadow-lg  col-md-4">

<form action="<?PHP $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST" class="col-md-12" autocomplete="off">
    
<h1 >SignUp </h1>
<p class="fact">MEDI-HOME SYSTEM</p>
<!---form_start-->
<div class="row">
    <div class="col">
    <label for="email" class="form-label">FirstName:</label>
      <input type="text" class="form-control" placeholder="Enter FirstName" name="Fname" autofocus required autocomplete="off">
    </div>
    <div class="col">
    <label for="email" class="form-label">LastName:</label>
      <input type="text" class="form-control" placeholder="Enter LastName" name="Lname" required autocomplete="off">
    </div>
  </div>
  <!--formlast-->
  <!---form_start-->
<div class="row">
    <div class="col">
    <label for="email" class="form-label">Password:</label>
      <input type="Password" class="form-control" placeholder="Enter Password" name="password" autocomplete="off" required>
    </div>
    <div class="col">
    <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" placeholder="Enter Email" name="Email" autocomplete="off" required>
    </div>
  </div>
  <!--formlast-->
    <!---form_start-->
<div class="row">
    <div class="col">
    <label for="email" class="form-label">Phone_Number:</label>
      <input type="number" class="form-control" placeholder="Enter Mobile No" name="PNo" autocomplete="off" required>
    </div>
    <div class="col">
    <label for="email" class="form-label">City:</label>
      <input type="text" class="form-control" placeholder="Enter City" name="City" autocomplete="off" required>
    </div>
  </div>
  <!--formlast-->
     <!---form_start-->
<div class="row">
    <div class="col">
    <h4 class="mt-2 ">Select User_Role:</h4>
    <select name="UserRole" id="selc" class="mt-1 w-100">
    <option value="" selected disabled>Select UserRule</option>
      <?php
      include 'config.php';
      $sql="select * from userrole";
      $result=mysqli_query($conn,$sql) or die("Query Unsucessful");
      while($row=mysqli_fetch_assoc($result)){
      ?>
      <option value="<?php echo $row['UserID'];?>"> <?php echo $row['UserRole']; ?> </option>
      <?php
    } //curly bract close
      ?>
    </select> <!--Close user-->
    </div>
    
  </div>
  <!--formlast-->
  
    <!---form_start-->
<div class="row">
    <div class="col">
    <label for="email" class="form-label">Address:</label>
    <textarea class="form-control" rows="2" id="comment" name="UAddress" autocomplete="off" required></textarea>
    </div>
    
  </div>
  <!--formlast-->
 <!---form_start-->
<div class="row">
    <div class="col">
    <label for="email" class="form-label">Select image to upload:</label>
   <label for="exampleInputPassword1">Post image</label>
   <input type="file" name="my_image" class="form-control" placeholder="Image" accept=".jpg,.jpeg,.png,.JPG,.JPEG,.PNG" required/>   


    </div>
    
  </div>
  <!--formlast-->
  <div class="clearfix m-3">
  <button type="submit" class="btn btn-primary  mb-3 loginbtn float-end" name="submit">
    <i class="fa fa-sign-in" aria-hidden="true"></i>SignUp</button>
  </div>
</form >

</div><!--COL_CLASS-->
</div><!--row-->
</div><!--Container_Class-->
</div> <!--Login_Class-->

<?php include 'footer.php'; ?>