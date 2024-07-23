<?php
include 'HEADERCHEMIST.php';
?>




<div class="container mr-5">
     <?php 
if(isset($_SESSION['status'])){
    ?>
   
 <div class="alert alert-success alert-dismissible p-3">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Dear User <?php echo $Fname; ?>!</strong><?php echo $_SESSION['status'];?> 
</div>
<?php  
unset($_SESSION['status']);
}
?>
<div class="bg-white mb-3 mt-3 border border-1 border-secondary">
<!---//now start codeing --->






<div id="s" class="container "> 
    
<div class="container">
 

     <div class=" card-header">                       
<div class="clearfix col-sm" > <!---position set-->
<p id="h11" class="h3 d-flex justify-content-center m-0 p-0">MedisonOrder</p>
</div> </div>

  <div class="row d-flex pt-4"> 
     <div class="col-sm-12 flex-fill">
<table id="example" id="customers"  cellpadding="7px">
<thead>
    <tr>

        <th>SRNO</th>
        <th>MEDISON_NAME</th>
        <th>MEDISON_QTY</th>
        <th>shopName</th>
       
    </tr>
</thead>
<tbody>
<?php
include 'config.php';
 $n=1;
$sql="select * from medisonorder   where UserName='$Email'  ORDER BY MOID ";
$result=mysqli_query($conn,$sql) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
      
//end of curly bracess after table tag close
while($row=mysqli_fetch_assoc($result)){
    ?>
<tr>
<td class='id'><?php echo $n; ?></td>
<td><?php echo $row['MName']; ?></td>
<td><?php echo $row['Qty']; ?></td>
<td><?php echo $row['shopName']; ?></td>


</tr>
<!--Modal start-->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i>Are YOU SURE YOU WANT TO DELETE THIS RECORD!!!</i></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<a type="button" class="btn btn-primary" href='DeleteStore.php?id=<?php echo $row['ShopID']; ?>' data-bs-toggle="tooltip" title="Delete" data-bs-placement="bottom">Delete</a>
      </div>
    </div>
  </div>
</div>


<!---Modal end-->
<?php 
  $n++;
}
 ?>

</tbody>

</table>

<?php
}?>
</div><!--col -->
</div><!--row -->
</div><!--container-->
<script>

$(document).ready(function() {
    $('#example').DataTable({
      //if we want hide ordering
      //searching:false, //if we want false searching
      ordering:false,
      //IF WE WANT HIDE paging
  //paging:false

    });
} );</script>

</div>
<?php 
include 'footer.php';
?>