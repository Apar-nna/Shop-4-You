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
     $sqli="select *,subcategory.id as subid from subcategory INNER JOIN
      category ON subcategory.category=category.id order by subcategory.id desc";
     $res=$conn->query($sqli);
		
?>
<center>
    <h2>SUB-CATEGORY</h2>
    <a href="http://localhost/E-commerce/subcategory.php" class="add" style="width: 120px,height: 5px">Add Sub-Category</a>
</center>
<table  id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>id</th>
      <th>Category</th>
      <th>Sub Category</th>
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
      <td><?php echo $row['category']?></td>
      <td><?php echo $row['subcategory']?></td>
      <td>
      <a href="subedit.php?id=<?php echo $row['subid']; ?>" class="btn btn-success" >Edit</a>
      <a href="subdelete.php?id=<?php echo $row['subid']; ?>" class="btn btn-danger" >Delete</a>  
    </tr>
    <?php $i=$i+1; }?>  
  </tbody>
</table>
<?php require('footer.php')?>