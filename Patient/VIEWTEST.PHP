<?php
include 'HEADERCHEMIST.php';
?>



<div class="container">
    <div class="row">
    
        <?php
include 'config.php';
$v=1;
$sql="select * from   labtest     ORDER BY labid  ";
$result=mysqli_query($conn,$sql) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
      
//end of curly bracess after table tag close
while($row=mysqli_fetch_assoc($result)){
    ?>
        <div class="card m-2" style="width:300px; " >
        <a  target="_blank" href="../pic/<?php echo $row['Image']; ?>" style="list-style-type: none; color: Black;">
  <img class="card-img-top" src="../pic/<?php echo $row['Image']; ?>" width="350px" height="300px" alt="STOREIMAGE"></a>
  <div class="card-body">
    <h4 class="card-title" style="text-transform: uppercase;"><small class="h6">TEST_Name:</small><?php echo $row['TestName']; ?></h4>
    <h4 class="card-title" style="text-transform: uppercase;"><small class="h6">TEST_Price:</small><?php echo $row['Price']; ?></h4>
    <a href='startTESTREPORT.php?id=<?php echo $row['labid']; ?>' data-bs-toggle="tooltip" title="Order" class="btn btn-outline-info" data-bs-placement="bottom">TEST_PROCEDURE</a>    



  </div>



        </div>
    
<?php }}?></div>
</div>
</div>
</div>
</div>

<?php include 'footer.php'; ?>