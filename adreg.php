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
     $sqli="select *from register order by register.id desc";
     $res=$conn->query($sqli);
		
?>
<center>
    <h2>User Registration</h2>
</center>
<table  id="example" class="display" style="width:100%">
  <thead>
    <tr>
      <th>userid</th>
      <th>User Name</th>
      <th>Email</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  while($row=$res->fetch_assoc()) 
  {
     ?> 
      <td><?php echo $row['id']?> </td> 
      <td><?php echo $row['name']?></td>
      <td><?php echo $row['email']?></td>
      <td>
      <a href="approve.php?id=<?php echo $row['id']; ?>" class="btn btn-success" >Accept</a>
      <a href="subdelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" >Reject</a>  
    </tr>
    <?php }?>  
  </tbody>
</table>
<?php require('footer.php')?>