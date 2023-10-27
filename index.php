<?php require('indexheader.php')?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
    echo"error".$conn->$connect_error;
}
?>
<?php require('indexfooter.php')?>
