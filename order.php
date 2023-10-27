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
#menu1 {
  float: right;
  /* margin-left: 1000px;
    margin-bottom: 10px; */

}

#menu1 li {
  list-style: none;
  margin-top: 40px;
  float: left;
  padding-right: 25px;
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

  <?php session_start();?>
  <?php if(isset($_SESSION['user'])==null) {
        
header("location:http://localhost/E-commerce/login.php");
  }
  else{?>
        

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
if(isset($_SESSION['user']))
{
  $uid=$_SESSION['user']['id'];
}
?>  
   
<?php
if(isset($_POST['submit']))
{
  $uname=$_POST['uname'];
  $address=$_POST['address'];
  $pin=$_POST['pin'];
  $phone=$_POST['phone'];
  $name=$_POST['name'];
  $brand=$_POST['brand'];
  $description=$_POST['description'];
  $price=$_POST['price'];
  $target_file=$_POST['image'];
  $payment=$_POST['payment'];
  // $sql="insert into order(uname,address,pin,phone,name,brand,description,price,image,payment)values('$uname','$address','$pin','$phone','$name','$brand','$description','$price','$target_file','$payment')"; 
  $sql="INSERT INTO `order`(`uname`, `address`, `pin`, `phone`, `name`, `brand`, `description`, `price`, `image`, `payment`,uid) VALUES ('$uname','$address','$pin','$phone','$name','$brand','$description','$price','$target_file','$payment','$uid')";
  if($conn->query($sql)===TRUE)
  {
    echo'<script type="text/javascript">';
    echo'alert("Order Successfully Placed....")';
    echo'</script>';
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
<ul id="menu1">
<li><b><a href="http://localhost/E-commerce/index.php" style="color: black">Home</a></b></li>
<li><b><a href="http://localhost/E-commerce/myorders.php" style="color: black">My orders</a></b></li>
<li><b><a href="http://localhost/E-commerce/logout.php" style="color:black">Logout</a></b></li>
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
                    <td><label>Product Name</label></td>
                    <td><input type="text" name="name" placeholder="Enter ProductName " style="width:400px;height:30px;" value="<?php echo $rows['name']?>"></td>
 </tr>
 <tr>
                <td><label>Brand</label></td>
                <td><input type="text" name="brand" placeholder="Enter brand name"  style="width:400px;height:30px;" value="<?php echo $rows['brand']?>" ></td>
</tr>
 <tr>
                    <td><label>Product Description</label></td>
                    <td><textarea name="description" placeholder="Enter Product Description" style="width:400px;height:30px;"><?php echo $rows['description']?></textarea></td>
 <tr>
                    <td><label>Price</label></td>
                    <td><input type="number" name="price" placeholder="Enter Price" style="width:400px;height:30px;" value="<?php echo $rows['price']?>" ></td>
 </tr>
 <tr>
     <td><label>Image</label></td>
    <td><img src="<?php echo 'uploads/'.$rows['image']?>"width="60px",height="60px">
    <input type="hidden" name="image" value="<?php echo $rows['image']?>"></td>
</tr>
<tr>
     <td><label>Payment Type</label></td>
    <td><input type="radio" name="payment" value="Online Payment">Online Payment
    <input type="radio" name="payment" value="Cash on Deliery">Cash on Deliery
</td>
</tr>
<tr>
    <td colspan=1>
        <center>
    <td><input type="submit" name="submit" value="Order" class="button"></td>
</tr>
    
</center>
</table>
</center>
</form>
</div>
<?php }?>
</body>
</html>