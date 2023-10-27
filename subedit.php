<?php require('header.php')?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
$id=$_GET['id'];
//  echo $id;
$sqli="select *,subcategory.category as catid from subcategory 
INNER JOIN category ON subcategory.category=category.id where subcategory.id=$id";
$res=$conn->query($sqli);
$rows=$res->fetch_assoc();
// var_dump($row);
if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $subcategory=$_POST['subcategory'];
$sql="UPDATE `subcategory` SET `category` =' $category', `subcategory` = '$subcategory' WHERE `subcategory`.`id` = $id";
if($conn->query($sql)===TRUE)
{
	echo "successfully edited";
  header("Location:http://localhost/E-commerce/sublist.php");
}
else
{
  echo "error".$sql;
}
}
?>
<center>
            <head><h2><u>SUB-CATEGORY</u></h2></head>
            <form method="POST">
                <table class="table table-bordered table-white" bgcolor="#489CC4 ">
                    <tr>
                        <td>Category name</td>
                        <td border="1" >
                        <select name="category">
                        <option value="0">select</option>
                        <?php
                        $sql="select * from category";
                        $res=$conn->query($sql);
                        $selected='';
                        while($row=$res->fetch_assoc())
                        {
                            ?>
                        <option value="<?php echo $row['id']?>"
                        <?php if($row['id']==$rows['catid']){echo 'selected';}?>>
                        <?php echo $row['category']?></option>
                            <?php } ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sub-Category name</td>
                        <td><input type="text" name="subcategory" value="<?php echo $rows['subcategory'] ?>"></td>
                    </tr>
                    <tr>
                      <td colspan=2><center><input type="submit" name="submit" value="Update"></center></td>
                    </tr>
</table>
</form>
                    <?php require('footer.php')?>
                    