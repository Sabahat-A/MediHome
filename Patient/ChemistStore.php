<?php
include 'HEADERCHEMIST.php';
?>

<div class="container">
    <div class="row">
    
        <?php
include 'config.php';

$sql="select * from registershop    ORDER BY ShopID DESC";
$result=mysqli_query($conn,$sql) or die("Query Unsucessful");
if(mysqli_num_rows($result)>0){
      
//end of curly bracess after table tag close
while($row=mysqli_fetch_assoc($result)){
    ?>
        <div class="card m-2" style="width:300px; " >
        <a  target="_blank" href="../pic/<?php echo $row['Image']; ?>" style="list-style-type: none; color: Black;">
  <img class="card-img-top" src="../pic/<?php echo $row['Image']; ?>" width="350px" height="300px" alt="STOREIMAGE"></a>
  <div class="card-body">
    <h4 class="card-title" style="text-transform: uppercase;"><i class="fa-solid fa-cart-shopping" style="color:#75D5CA;"></i><?php echo $row['ShopName']; ?></h4>

    <a href='MedisonDisplayOrder.php?id=<?php echo $row['ShopID']; ?>' data-bs-toggle="tooltip" title="Order" class="btn btn-outline-info" data-bs-placement="bottom">ORDER</a>    



  </div>



        </div>
    
<?php }}?></div>
</div>
</div>
</div>
</div>

<?php include 'footer.php';  ?>