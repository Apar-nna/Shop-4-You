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
     $sqli=" SELECT * ,product.id as pid,category.category as catname,subcategory.subcategory as subname FROM product
     INNER JOIN category ON product.category = category.id
     INNER JOIN subcategory ON product.subcategory= subcategory.id
     INNER JOIN brand ON product.brand= brand.id";
     $res=$conn->query($sqli);
		
?>
<center>
    <h2>PRODUCT</h2>
    <a href="http://localhost/E-commerce/product.php" class="add">Add Product</a>
</center>
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>id</th>
      <th>Category</th>
      <th>SubCategory</th>
      <th>Brand</th>
      <th>Product Name</th>
      <th>Product Description</th>
      <th>Price</th>
      <th>Tax</th>
      <th>image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  while($row=$res->fetch_assoc()) 
  {
     ?> 
      <td><?php echo $i;?> </td> 
      <td><?php echo $row['catname']?></td>
      <td><?php echo $row['subname']?></td>
      <td><?php echo $row['brand']?></td>
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['description']?></td>
      <td><?php echo $row['price']?></td>
      <td><?php echo $row['tax']?></td>
      <td><img src="<?php echo 'uploads/'.$row['image']?>"width="60px",height="60px"></td>
      <td>
      <a href="proedit.php?id=<?php echo $row['pid']; ?>" class="btn btn-success" >Edit</a>
      <a href="prodelete.php?id=<?php echo $row['pid']; ?>" class="btn btn-danger" >Delete</a>
    </tr>
    <?php  $i=$i+1;}?> 
  </tbody>
</table>
<?php require('footer.php')?>