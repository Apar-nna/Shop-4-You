
<?php require('header.php')?>
    <?php
require("ecommerceconnection.php");
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
}    
?>
<?php
$sqli=" SELECT * ,brand.id as brandid,category.category as catname FROM brand
INNER JOIN category ON brand.category = category.id
INNER JOIN subcategory ON brand.subcategory= subcategory.id;";
     $result=$conn->query($sqli);
		
?>
            <center>
    <h2>BRAND</h2>
    <a href="http://localhost/E-commerce/brand.php" class="button">Add Brand</a>
</center>
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>id</th>
      <th >Category</th>
      <th >SubCategory</th>
      <th>Brand</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  while($row=$result->fetch_assoc()) 
  {
     ?> 
      <td><?php echo $i;?> </td>
      <td><?php echo $row['catname']?></td>
      <td><?php echo $row['subcategory']?></td>
      <td><?php echo $row['brand']?></td>
      <td>
      <a href="brandedit.php?id=<?php echo $row['brandid']; ?>" class="btn btn-success" >Edit</a>
      <a href="branddelete.php?id=<?php echo $row['brandid']; ?>" class="btn btn-danger" >Delete</a>  
    </tr>
    <?php $i=$i+1; }?>
    
  </tbody>
</table>

<?php require('footer.php')?>