<?php require('header.php')?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
    echo"error".$conn->$connect_error;
}
?>
                <center>
            <h2> Sub-Category</h2>
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
                        $sql="select * from category";
                        $res=$conn->query($sql);
                        while($rows=$res->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $rows['id']?>"><?php echo $rows['category']?></option>
                            <?php } ?>
                        </select>
                    </td>
 </tr>
 <tr>
    <td><label>Sub-Category</label></td>
    <td><input type="text" name="subcategory" placeholder="Enter Sub-Category" required></td>
</tr>
<tr>
    <td colspan=2>
        <center>
        <input type="submit" name="submit" value="ADD">
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
    $chk="select * from subcategory where subcategory='$subcategory'";
    $result=$conn->query($chk);

    if($result->num_rows > 0)
    {
        echo '<script type="text/javascript">';
        echo 'alert("Subcategory already exist")';
        echo '</script>';
    }
    else
    {
    $sql="insert into subcategory(category,subcategory)values('$category','$subcategory')"; 
    }
    if($conn->query($sql)===TRUE)
    {
    echo "successfully inserted";
     if(!headers_sent()){
        header("Location:http://localhost/E-commerce/sublist.php");
    }
    else{
        echo'<script type="text/javascript">window.location.href="http://localhost/E-commerce/sublist.php";</script>';
    }
    }  
else
{
    echo "error".$sql;
}
}
?>  
<?php require('footer.php')?>