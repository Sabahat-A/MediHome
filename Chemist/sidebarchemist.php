<?php 

include 'header.php';
?>
  <div class="menu-btn sticky-top">
     <i class="fas fa-bars "></i>
   </div>
   <div class="side-bar sticky-top">
     <div class="close-btn">
       <i class="fas fa-times"></i>
     </div>
     <div class="menu ">
<div class="item"><a href="homeChemist.php" data-bs-toggle="tooltip" title="Home" data-bs-placement="right"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
        <!--SUBMENU_START--->
        <div class="item">
<a class="sub-btn" data-bs-toggle="tooltip" title="Chemist" data-bs-placement="right">
<i class="fa-solid fa-flask-vial"></i>Chemist<i class="fas fa-angle-right dropdown"></i></a>
 <div class="sub-menu"><!---//submenu-->
 
<a href="INDEXMedison.php" class="sub-item" data-bs-toggle="tooltip" title="Display_Medison" data-bs-placement="right">
<i class="fa-solid fa-vial"></i>View Medison</a>
  <a href="InsertMedison.php" class="sub-item" data-bs-toggle="tooltip" title="Add_Medison" data-bs-placement="right">
  <i class="fa-solid fa-vial"></i>Add Medison</a>

                  </div>
       </div>  <!--SUBMENU_end--->

        <!--SUBMENU_START--->
        <div class="item">
<a class="sub-btn" data-bs-toggle="tooltip" title="Register shop" data-bs-placement="right">
<i class="fa-solid fa-store"></i>RegisterStore<i class="fas fa-angle-right dropdown"></i></a>
 <div class="sub-menu"><!---//submenu-->
 
<a href="INDEXStore.php" class="sub-item" data-bs-toggle="tooltip" title="Display_Medison" data-bs-placement="right">
<i class="fa-solid fa-store"></i>View Store</a>
  <a href="InsertStore.php" class="sub-item" data-bs-toggle="tooltip" title="Add_Medison" data-bs-placement="right">
  <i class="fa-solid fa-store"></i>Add Store</a>

                  </div>
       </div>  <!--SUBMENU_end--->

       <!--SUBMENU_START--->
       <div class="item">
<a class="sub-btn" data-bs-toggle="tooltip" title="PayMent Method" data-bs-placement="right">
<i class="fa-brands fa-paypal"></i>PayMent Method<i class="fas fa-angle-right dropdown"></i></a>
 <div class="sub-menu"><!---//submenu-->
 
<a href="INDEXPayMent.php" class="sub-item" data-bs-toggle="tooltip" title="Display_Medison" data-bs-placement="right">
<i class="fa-brands fa-paypal"></i>View PayMentMethod</a>
  <a href="InsertPayMent.php" class="sub-item" data-bs-toggle="tooltip" title="Add_Medison" data-bs-placement="right">
  <i class="fa-brands fa-paypal"></i>Add PayMentMethod</a>

                  </div>
       </div>  <!--SUBMENU_end--->
      
       <div class="item"><a href="AvbMedison.php" data-bs-toggle="tooltip" title="Avaiable_Medison" data-bs-placement="right">
       <i class="fa-solid fa-book"></i>Avaiable Medison</a></div>
     
<!--end_Backup_menu-->
<div class="item"><a href="medisonOrderchmest.php" data-bs-toggle="tooltip" title="Medison Detail" data-bs-placement="right">
       <i class="fa-brands fa-medium"></i>Medison Order</a></div>
       <!--end_Backup_menu-->
       <!---logout-->
        <div class="item"><a href="LOGOUT.php" data-bs-toggle="tooltip" title="Logout" data-bs-placement="right">
          <i class="fa fa-right-from-bracket" aria-hidden="true" ></i>Logout</a></div>

     </div>
   </div>
  

   <script type="text/javascript">
   $(document).ready(function(){
     //jquery for toggle sub menus
     $('.sub-btn').click(function(){
       $(this).next('.sub-menu').slideToggle();
       $(this).find('.dropdown').toggleClass('rotate');
     });

     //jquery for expand and collapse the sidebar
     $('.menu-btn').click(function(){
       $('.side-bar').addClass('active');
       $('.menu-btn').css("visibility", "hidden");
     });

     $('.close-btn').click(function(){
       $('.side-bar').removeClass('active');
       $('.menu-btn').css("visibility", "visible");
     });
   });
   </script>
<?php 
include 'footer.php';
?>