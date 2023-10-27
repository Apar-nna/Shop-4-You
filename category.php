<?php require('header.php')?>
<?php
require("ecommerceconnection.php");
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
} 
?>

                <center>
            <h2> Category</h2>
</center>
<form method="POST">
    <center>
        <table class="table table-bordered table-white" bgcolor="#489CC4 ">
        <tr>
                    <td><label>Category:</label></td>
                    <td><input type="text" name="category" placeholder="Enter Category" required></td>
 </tr>
<tr>
    <td colspan=2>
        <center>
           <input type="submit" name="submit" value="Add">
</center>
</td>
</tr>
</table>
</center>
</form>
</head>
        </div>
</div>
</head>
<?php
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    
    $chk="select * from category where category='$category'";
    $result=$conn->query($chk);

    if($result->num_rows > 0)
    {
        echo '<script type="text/javascript">';
        echo 'alert("category already exist")';
        echo '</script>';
    }
    else
    {
        $sql="insert into category(category)values('$category')"; 
            if($conn->query($sql)===TRUE)
            {
                echo "successfully inserted";
                header("Location:http://localhost/E-commerce/categorylist.php");
            }
            else
            {
                echo "error".$sql;
            }
    }
}
?>  
<?php require('footer.php')?>

