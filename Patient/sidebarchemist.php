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
<div class="item"><a href="homePatient.php" data-bs-toggle="tooltip" title="Home" data-bs-placement="right"><i class="fa fa-home" aria-hidden="true"></i>Home</a></div>
<div class="item"><a href="ChemistStore.php" data-bs-toggle="tooltip" title="Chemist_store" data-bs-placement="right">
<i class="fa-solid fa-flask-vial"></i>Chemist STORE</a></div>
      

<div class="item"><a href="VIEWTEST.PHP" data-bs-toggle="tooltip" title="TEST Detail" data-bs-placement="right">
       <i class="fa-brands fa-medium"></i>LAB_TEST</a></div>
     
       <div class="item"><a href="TESTREP.php" data-bs-toggle="tooltip" title="Report" data-bs-placement="right">
       <i class="fa fa-flag-checkered"></i>TEST REPORT</a></div> 
       <!--end_Backup_menu-->
       <div class="item"><a href="MedisonOrder.php" data-bs-toggle="tooltip" title="Medison Detail" data-bs-placement="right">
       <i class="fa-brands fa-medium"></i>Medison Detail</a></div>

       <div class="item"><a href="DoctorConsulat.php" data-bs-toggle="tooltip" title="Doctor Coversation" data-bs-placement="right"><i class="fa fa-user-md" aria-hidden="true"></i>Doctor Consultant</a></div>      
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