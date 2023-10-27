<?php require('header.php')?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
$id=$_GET['id'];
 //echo $id;
$sqli=" SELECT * ,brand.id as brandid,category.category as catname FROM brand
INNER JOIN category ON brand.category = category.id
INNER JOIN subcategory ON brand.subcategory= subcategory.id where brand.id=$id;";
    
$result=$conn->query($sqli);
$rows=$result->fetch_assoc();
$catid=$rows['catname'];
$subid=$rows['subcategory'];
//var_dump($row);
if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $subcategory=$_POST['subcategory'];
  $brand=$_POST['brand'];
$sql="UPDATE `brand` SET `category` = '$category', `subcategory` = '$subcategory', `brand` = '$brand' WHERE `brand`.`id` = $id;";
if($conn->query($sql)===TRUE)
{
	echo "successfully edited";
  header("Location:http://localhost/E-commerce/brandlist.php");
}
else
{
  echo "error".$sql;
}
}
?>
<center>
            <head><h2><u>BRAND</u></h2></head>
            <form method="POST">
                <table class="table table-bordered table-white" bgcolor="#489CC4 ">
                    <tr>
                        <td>Category name</td>
                        <td>
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
                        <?php if($row['category']==$catid){echo 'selected';}?>>
                        <?php echo $row['category']?></option>
                            <?php } ?>
                        </select>
                    </td>
                    </tr>
          
                    <td>Sub-Category name</td>
                        <td><select name="subcategory">
                        <option value="0">select</option>
                          <?php
                          $sql="select * from subcategory";
                          $res=$conn->query($sql);
                          $selected='';
                          while($row=$res->fetch_assoc())
                          {
                              ?>
                        <option value="<?php echo $row['id']?>"
                        <?php if($row['subcategory']==$subid){echo'selected';}?>>
                        <?php echo $row['subcategory']?></option>
                            <?php } ?>
                        </select>
                       </td>
                    </tr>
                    <td><label>Brand Name</label></td>
                    <td><input type="text" name="brand" placeholder="Enter Brand Name" style="font-size:medium;" value="<?php echo $rows['brand'] ?>"></td>
                    <tr>
                    <tr>
                      <td colspan=1>
                        <td><input type="submit" name="submit" value="Update"></td>
                    </tr>
</table>
</form>
                    <?php require('footer.php')?>
                    