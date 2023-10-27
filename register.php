<?php require('regheader.php')?>
<?php
require("ecommerceconnection.php");
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
} 
?>
<div class="bg-img">
                <center>
            <h2> REGISTER</h2>
</center>
<form method="POST">
    <center>
        <table>
        <tr>
                    <td><b><label>User Name</label></b></td>
                    <td><input type="text" name="name" placeholder="Enter Name" required></td>
 </tr>
 <tr>
                    <td><b><label>Email</label></b></td>
                    <td><input type="email" name="email" placeholder="Enter Email" required></td>
 </tr>
 <tr>
                    <td><b><label>password</label></b></td>
                    <td><input type="password" name="psw" placeholder="Enter password" required></td>
 </tr>
<tr>
    <td colspan=2>
        <center>
           <b><input type="submit" name="submit" value="Register" class="reg"></b>
</center>
</td>
</tr>
</table>
</center>
</form>
</head>
        </div>
</head>
<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $psw=$_POST['psw'];
    $usertype='user';
    $sql="insert into register(name,email,psw,usertype,approval)values('$name','$email','$psw','$usertype','pending')"; 

if($conn->query($sql)===TRUE)
{
    echo "successfully inserted";
    header("Location:http://localhost/E-commerce/login.php");
}
else
{
    echo "error".$sql;
}
}
?>  
<?php require('regfooter.php')?>
