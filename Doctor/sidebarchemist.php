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
<div class="item"><a href="homeDoctor.php" data-bs-toggle="tooltip" title="Home" data-bs-placement="right"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
        <!--SUBMENU_START--->
        <div class="item">
<a class="sub-btn" data-bs-toggle="tooltip" title="Menu" data-bs-placement="right">
<i class="fa fa-address-book" aria-hidden="true"></i>Appointment<i class="fas fa-angle-right dropdown"></i></a>
 <div class="sub-menu"><!---//submenu-->
 
<a href="INDEXAppointment.php" class="sub-item" data-bs-toggle="tooltip" title="Display_Record" data-bs-placement="right">
  <i class="fa  fa-eye" aria-hidden="true"></i></i>View Appointment</a>
  <a href="InsertAppointment.php" class="sub-item" data-bs-toggle="tooltip" title="Add_Record" data-bs-placement="right">
  <i class="fa fa-user-plus" aria-hidden="true"></i></i>Add Appointment</a>

                  </div>
       </div>  <!--SUBMENU_end--->
        <!--SUBMENU_START--->
        <div class="item">
<a class="sub-btn" data-bs-toggle="tooltip" title="LABTEST" data-bs-placement="right">
<i class="fa-solid fa-flask"></i>LABTEST<i class="fas fa-angle-right dropdown"></i></a>
 <div class="sub-menu"><!---//submenu-->
 
<a href="INDEXlab.php" class="sub-item" data-bs-toggle="tooltip" title="Display_Record" data-bs-placement="right">
  <i class="fa  fa-eye" aria-hidden="true"></i></i>View LABTEST</a>
  <a href="InsertLAB.php" class="sub-item" data-bs-toggle="tooltip" title="Add_Record" data-bs-placement="right">
  <i class="fa fa-user-plus" aria-hidden="true"></i></i>Add LABTEST</a>

                  </div>
       </div>  <!--SUBMENU_end--->
      
       <div class="item"><a href="DoctorConsulat.php" data-bs-toggle="tooltip" title="Doctor Coversation" data-bs-placement="right">
        <i class="fa fa-user-md" aria-hidden="true"></i>Doctor Consultant</a></div>      
     
       <div class="item"><a href="TESTREP.php" data-bs-toggle="tooltip" title="Report" data-bs-placement="right">
       <i class="fa fa-flag-checkered"></i>TEST REPORT</a></div>      
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