<?php require('header.php')?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
    echo"error".$conn->$connect_error;
}
$sql="select * from category";
$res=$conn->query($sql);
?>

<center>
            
<h2> Brand Details</h2>
</center>
<form method="POST">
    <center>
        <table class="table table-bordered table-white" bgcolor="#489CC4 ">
        <tr>
                    <td><label>Category</label></td>                  
                    <td>
                        <select name="category">
                        <option value="0">select</option>
                        <?php
                        
                        while($rows=$res->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $rows['id']?>"><?php echo $rows['category']?></option>
                            <?php } ?>
                        </select>
                    </td>
 </tr>
<tr>
                    <td><label>Sub Category</label></td>
                    <td><select name="subcategory">
                        <option value="0">select</option>
                        <?php
                        $sql="select * from subcategory";
                        $res=$conn->query($sql);
                        while($rows=$res->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $rows['id']?>"><?php echo $rows['subcategory']?></option>
                            <?php } ?>
                        </select></td>
 </tr>
 <tr>
                    <td><label>Brand</label></td>
                    <td><input type="text" name="brand" placeholder="Enter Brand Name" style="font-size:medium;" required></td>
 </tr>
 <tr>
    <td colspan=2>
        <center>
        <input type="submit" name="submit" value="submit">
</center>
</td>
</tr>
</table>
</center>
</form>
</head>
<?php
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $brand=$_POST['brand'];
    $sql="insert into brand(category,subcategory,brand) values('$category','$subcategory','$brand')"; 
if($conn->query($sql)===TRUE)
{
    echo "successfully inserted";
    if(!headers_sent()){
        header("Location:http://localhost/E-commerce/brandlist.php");
    }
    else{
        echo'<script type="text/javascript">window.location.href="http://localhost/E-commerce/brandlist.php";</script>';
    }
}
// else
// {
//     echo "error".$sql;
// }
}
?>  
</div>
<?php require('footer.php')?>