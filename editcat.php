<?php require('header.php')?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);

$id=$_GET['id'];
 //echo $id;
$sqli="select * from category where id=$id";
$result=$conn->query($sqli);
$row=$result->fetch_assoc();
//var_dump($row);
if(isset($_POST['submit']))
{
  $category=$_POST['category'];
$sql="UPDATE `category` SET `category` = '$category' WHERE `category`.`id` = $id";
if($conn->query($sql)===TRUE)
{
	echo "successfully edited";
  header("Location:http://localhost/E-commerce/categorylist.php");
}
else
{
  echo "error".$sql;
}
}
?>
<center>
            <head><h2><u>CATEGORY</u></h2></head>
            <form method="POST">
                <table class="table table-bordered table-white" bgcolor="#489CC4 ">
                    <tr>
                        <td>Category Name</td>
                        <td><input type="text" name="category" value="<?php echo $row['category'] ?>"></td>
                    </tr>
                    <tr>
                      <td colspan=1>
                        <td><input type="submit" name="submit" value="Update"></td></td>
                    </tr>
</table>
</form>
                    <?php require('footer.php')?>