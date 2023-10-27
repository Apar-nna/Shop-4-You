<?php require("loginheader.php")?>
<?php session_start(); ?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
}  
?>
<div class="bg-img" width=100%>
  <form  method="Post" enctype="multipart/form-data">

  <center>
    <h2><b>LOGIN</b></h2>
    <table border=1 align ='center'>
<tr>
    <td><label for="email"><b>Email</b></label></td>
    <td><input type="text" placeholder="Enter Email" name="email" required></td>
</tr>
<tr>

    <td><label for="psw"><b>Password</b></label></td>
    <td><input type="password" placeholder="Enter Password" name="psw" required></td>
</tr>
<!-- <tr>
                <td><b>User Type</b></td>
                <td><input type="text" name="usertype"></td>
</tr>  -->
<tr>
<td colspan='2'><input type="submit"class="login"name="submit"value="Login"></td>
</tr>

</form>
</table>
</center>
<?php
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$psw=$_POST['psw'];
$sql="select * from register where email='$email' and psw='$psw'";
$result=$conn->query($sql);
// var_dump($result);
$rows=$result->fetch_assoc();
$count=mysqli_num_rows($result);
// echo $count;
if($count==1)
{
    // session_name('log');
    // session_start();
    // $_SESSION['email']=$email;/
     $_SESSION['user']=$rows;
    $_SESSION['usertype']=$rows['usertype'];
    if($_SESSION['usertype']=='admin')
    {
        header("Location:http://localhost/E-commerce/dashboard.php");
        exit;
    }
    else{
        if ($count == 1 && $rows['approval']=='approved') 
{
   header('Location:index.php');
}
else
{
    $error = "Invalid login credentials or approval status not approved";
    echo $error;
}
                }      
            } 
}
?>
</body>
</html>
<center>Don't have an account? <a href="register.php">Sign up here</a></center>  
</div>
<?php require("loginfooter.php")?>