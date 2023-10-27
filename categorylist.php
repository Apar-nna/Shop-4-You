
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
     $sqli="select * from category order by id desc";
     $res=$conn->query($sqli);
		
?>
            <center>
    <h2>CATEGORY</h2>
    <a href="http://localhost/E-commerce/category.php" class="button">Add Category</a>
</center>
<table id="example" class="display" style="width:100%">
  <thead>
    <tr>
    <th>id</th>
      <th>Category</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php $i=1; 
  while($row=$res->fetch_assoc()) 
  {
     ?>
     <td><?php echo $i;?> </td> 
      <td><?php echo $row['category']?></td>
      <td>
      <a href="editcat.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
      <a href="deletecat.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
    </tr>
    
    <?php  $i=$i+1; }?>
    
  </tbody>
</table>
<?php require('footer.php')?>