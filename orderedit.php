<html>
    <head>
    <title>order</title>
</head>
<style>
    #header1{
    width: 100%;
    height: 80px;
    background: #3700ff;
}
*{
    padding:0%;
    margin: 0%;
}
#menu {
  float: left;
  padding-right: 20px;
  margin-top: 8px;
  margin-left: 20px;
 color: rgb(85, 153, 51);
}

#menu li {
  list-style: none;
}
.bg-img {
    /* The image used */
    background-image: url("images/bg1.jpg");
    min-height: 630px;
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }
  .button{
    background-color: #EDBB99 ;
    color: black;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    width: 150px;  
  }
  .button:hover{
    background-color: #EB984E ;
    cursor:pointer
  }
  /* #content-wrapper
  {
    width:80%;
    float:right;
    border:1px darkblue;
    min-height: 650px;
    margin-top: -580px;
  }
   */
</style>
<body>
<?php
require("ecommerceconnection.php");
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
}  
?> 
<?php $id=$_GET['id'];
 //echo $id;
$sqli="select * from product where id=$id";
$result=$conn->query($sqli);
$rows=$result->fetch_assoc();
// var_dump($row);
?>
<?php
if(isset($_POST['submit']))
{
  $uname=$_POST['uname'];
  $address=$_POST['address'];
  $pin=$_POST['pin'];
  $phone=$_POST['phone'];
  $sql="UPDATE `order` SET `uname`='$uname',`address`='$address',`pin`='$pin',`phone`='$phone' WHERE  `order`.`id` = $id;";
if($conn->query($sql)===TRUE)
{
	echo "successfully edited";
  header("Location:http://localhost/E-commerce/order.php");
}
else
{
  echo "error".$sql;
}
}
?>
<div id="header1">
<ul id="menu">
<img src="images/logor.png" height="55" width="80"><b><h6>Shop 4 You</h6></b>
</ul>
</div>
<!-- <div id="content-wrapper"> -->
<div class="bg-img">
<form method="POST" id="form" enctype="multipart/form-data">
    <center><h3>ORDER</h3></center>
    <center>
        <table class="table table-bordered table-white" bgcolor="pink">
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="uname" placeholder="Enter Your Name" style="width:400px;height:30px;" required></td>
</tr>
<tr>
                <td><label>Address</label></td>
                <td><textarea name="address" placeholder="Enter Address"  style="width:400px;height:50px;"  required></textarea></td>
</tr>
<tr>
                <td><label>PIN Code</label></td>
                <td><input type="number" name="pin" placeholder="Enter PIN Code"  style="width:400px;height:30px;"  required></td>
</tr>
<tr>
                <td><label>Phone no:</label></td>
                <td><input type="number" name="phone" placeholder="Enter phone number here"  style="width:400px;height:30px;"  required></td>
</tr>
<tr>
    <td colspan=1>
        <center>
    <td><input type="submit" name="submit" value="Update" class="button"></td>
    </center>
</table>
</center>
</form>
</div>
</body>
</html>