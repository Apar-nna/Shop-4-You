<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname,$username,$pass,$dbname);
$id=$_GET['id'];
$sql="UPDATE register SET approval='approved' WHERE id='$id'";
if($conn->query($sql)===TRUE)
{
    echo '<script type="text/javascript">';
    echo 'alert("Approved")';
    echo '</script>';
    echo '<br>';
    header("Location:adreg.php");
}
else{
    echo "error updating record: ".$conn->error;
}
?>