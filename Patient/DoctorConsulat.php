<?php
include 'HEADERCHEMIST.php';
?>



<div class="container">
    <div class="row">
    
        <?php
include 'config.php';
$v=1;
 $sql="select * from login   where UserRole='$v'  ORDER BY UserID  DESC";
$result=mysqli_query($conn,$sql) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
      
//end of curly bracess after table tag close
while($row=mysqli_fetch_assoc($result)){
    ?>
        <div class="card m-2" style="width:300px; " >
        <a  target="_blank" href="../pic/<?php echo $row['Image']; ?>" style="list-style-type: none; color: Black;">
  <img class="card-img-top" src="../pic/<?php echo $row['Image']; ?>" width="350px" height="300px" alt="STOREIMAGE"></a>
  <div class="card-body">
    <h4 class="card-title" style="text-transform: uppercase;"><small class="h6">FIRST Name:</small><?php echo $row['Fname']; ?></h4>
    <h4 class="card-title" style="text-transform: uppercase;"><small class="h6">Last Name:</small><?php echo $row['Lname']; ?></h4>
    <a href='startchatsimple.php?id=<?php echo $row['UserID']; ?>' data-bs-toggle="tooltip" title="Order" class="btn btn-outline-info" data-bs-placement="bottom">CONSULT</a>    



  </div>



        </div>
    
<?php }}?></div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>