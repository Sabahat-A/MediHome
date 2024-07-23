<!DOCTYPE html>
<html>
<head>
  <!--Inline CSS-->


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
<link rel="stylesheet"  href="CSS/login.css">

</head>
<body  >


<?php
include 'config.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
  session_start();
  $Email=mysqli_real_escape_String($conn,$_POST['Email']);
  $password=mysqli_real_escape_String($conn,$_POST['password']);
  $sql="select * from login join userrole  ON  login.UserRole=userrole.UserID 
  where Email='".$Email."'AND password='".$password."'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
   

  if($row["UserRole"]=="Chemist"){
    $_SESSION["Email"]=$Email; //only use this name always remember
     $_SESSION['status']="WELL COME BACK ";
     header("Location:http://localhost/MEDI-HOME/Chemist/homeChemist.php");
   
  
}//if close
 else  if($row["UserRole"]=="Doctor"){
  $_SESSION["Email"]=$Email; //only use this name always remember
  $_SESSION['status']="WELL COME BACK ";
   header("Location:http://localhost/MEDI-HOME/Doctor/homeDoctor.php");
 

}//if close
else  if($row["UserRole"]=="Patient"){
  $_SESSION["Email"]=$Email; //only use this name always remember
  $_SESSION['status']="WELL COME BACK ";
   header("Location:http://localhost/MEDI-HOME/Patient/homePatient.php");
 

}//if close



else {
     $_SESSION['status']="  Invalid Email & Password!!!";
}
}
?>


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






 <div class="container mt-3" >

<div class="login pt-5 ">
    
<div class="container  w-md-50">
<div class="row ">
<div id="borderRad" class="col-12 mx-auto w-50 h-50 shadow-lg mt-5 col-md-4">

<form action="<?PHP $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST" class="col-md-12" >
    
<h1 >Login </h1>
<p class="fact">MEDI-HOME SYSTEM</p>
<div class="col-12 mb-3 mt-3 ">
    <label for="username" class="form-label">Email:</label><br>
    <input type="Email" class="form-control " id="Email" placeholder="Enter Username" name="Email" autofocus autocomplete="off" required>
   
  </div>
  <div class="col-12 mb-3 col-6">
    <label for="password" class="form-label ">Password:</label>
    
    <div class="input-group">
    
    <input type="password" class="form-control" placeholder="password" name="password" autocomplete="off">
    <span class="input-group-text"><i class="fa-sharp fa-solid fa-eye" id="eye"></i></span>
  </div>
</input>
</div>
  <div class="clearfix">
  <button type="submit" class="btn btn-primary   loginbtn float-end" name="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</button>
  </div>
</form >
</div><!--COL_CLASS-->
</div><!--row-->
</div><!--Container_Class-->
</div> <!--Login_Class-->
<?php include 'footer.php' ?>


<script>
    $(document). ready (function () {
        $("#eye").click(function(){
$('input .password').show;
});  

});

</script>