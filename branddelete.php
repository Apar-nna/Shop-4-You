<?php require('header.php')?>
<?php 
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
    echo"error".$conn->$connect_error;
}
$id=$_GET['id'];
$sql="delete from brand where id=$id";
$conn->query($sql);
header("Location:http://localhost/E-commerce/brandlist.php");
?>
 <?php require('footer.php')?>