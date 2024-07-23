<?php  

include 'sidebarchemist.php';

?>


<div id="headbar">
    <div class="container-fluid ">
        <div class="row">
        <div class="col-sm-8  mt-3 ml-3">
        <h4 style="margin-left:10px;font-family: 'Oswald', sans-serif;color: white;padding-left: 110px;">WellCome Dear <?php echo $Fname." ".$Lname  ?> MEDI-HOME SYSTEM</h4>
</div><!--Colsm-->
<div class="col-sm-3 " style="padding-left: 120px;">
<img src="../pic/<?php echo $Image?>"  class="rounded mb-1 mt-2 " alt="images admin" 
width="70px" height="50px"  >
</div>
</div><!--row-->
 </div><!--row--->   
 </div><!--container--->
 <!--MESSAGE-->
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
?>
</div>  <!--MESSAGE-->
 <!---------------NOW START DASHBOARD CODING-------------------------------------------->
 <div class="container-fluid mt-5">
    <div class="row">
           <div >
        <div class="col-sm-3 DashB shadow-lg" id="">
            <i class="fa fa-home" style="color: darkblue;"></i><br>
            <a href="homeChemist.php">HOME</a>
    </div>
    <div class="col-sm-3 DashB shadow-lg" id="">
            <i class="fa  fa-vial"></i><br>
            <a href="INDEXMedison.php">View Medison</a>
    </div>
     <div class="col-sm-3 DashB shadow-lg" id="">
          <i class="fa solid fa-store" style="color: #057C80;"></i><br>
            <a href="INDEXStore.php">RegisterStore</a>
    </div>
  <div class="col-sm-3 DashB shadow-lg " id="">
           <i class="fa  fa-money-bill" style="color:#701080;"></i><br>
            <a href="INDEXPayMent.php">PayMentMethod</a>
    </div>
</div><!--borderdesignFinish--->    
    </div><!--row--->   </div>
 
<!---First Three Done-->
 <!---------------End START DASHBOARD CODING-------------------------------------------->


  <!---------------NOW START DASHBOARD CODING-------------------------------------------->
  <div class="container-fluid mt-5">
    <div class="row">
           <div >
        <div class="col-sm-3 DashB shadow-lg" id="">
            <i class="fa solid fa-book" style="color: darkblue;"></i><br>
            <a href="AvbMedison.php">Avaiable Medison</a>
    </div>
    <div class="col-sm-3 DashB shadow-lg" id="">
    <i class="fa fa-shopping-cart" style="color: pink;"></i><br>
            <a href="INDEXMedison.php">Medison Order</a>
    </div>
    <div class="col-sm-3 DashB shadow-lg" id="">
            <i class="fa  fa-vial"></i><br>
            <a href="InsertMedison.php">ADD Medison</a>
    </div>
    <div class="col-sm-3 DashB shadow-lg" id="">
          <i class="fa solid fa-store" style="color: #057C80;"></i><br>
            <a href="INDEXStore.php">View Store</a>
    </div>
</div><!--borderdesignFinish--->    
    </div><!--row--->   </div>
 
<!---First Three Done-->
 <!---------------End START DASHBOARD CODING-------------------------------------------->