<?php require('header.php')?>
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
$id=$_GET['id'];
 //echo $id;
$sqli=" SELECT * ,product.id as pid,category.category as catname ,subcategory.subcategory as subname FROM product
INNER JOIN category ON product.category = category.id
INNER JOIN subcategory ON product.subcategory= subcategory.id
INNER JOIN brand ON product.brand= brand.id where product.id=$id";
$result=$conn->query($sqli);
$rows=$result->fetch_assoc();
// var_dump($rows);
$catid=$rows['catname'];
$subid=$rows['subname'];
$bid=$rows['brand'];
if(isset($_POST['submit']))
{
  $category=$_POST['category'];
  $subcategory=$_POST['subcategory'];
  $brand=$_POST['brand'];
  $name=$_POST['name'];
  $description=$_POST['description'];
  $price=$_POST['price'];
  $tax=$_POST['tax'];
  $filename=$_FILES['image']["name"];
  move_uploaded_file($_FILES["image"]["tmp_name"],'uploads/'.$filename);
if($filename==null){
    $sql="UPDATE `product` SET `category`='$category',`subcategory`='$subcategory',`brand`='$brand',`name`='$name',`description`='$description',`price`='$price',`tax`='$tax' WHERE  `product`.`id` = $id";
    $conn->query($sql);

}
else{
    $sql="UPDATE `product` SET `category`='$category',`subcategory`='$subcategory',`brand`='$brand',`name`='$name',`description`='$description',`price`='$price',`tax`='$tax',`image`='$filename' WHERE  `product`.`id` = $id";
    $conn->query($sql);
}

if($conn->query($sql)===TRUE)
{
	echo "successfully edited";
  header("Location:http://localhost/E-commerce/prolist.php");
}
else
{
  echo "error".$sql;
}
}

?>
<center>
            <head><h2><u>PRODUCT</u></h2></head>
            <form method="POST" enctype="multipart/form-data">
                <table class="table table-bordered table-white"bgcolor="#489CC4 ">
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
                    <tr>
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
                    <tr>
                    <td><label>Brand</label></td>
                    <td><select name="brand">
                        <option value="0">select</option>
                        <?php
                          $sql="select * from brand";
                          $res=$conn->query($sql);
                          $selected='';
                          while($row=$res->fetch_assoc())
                          {
                              ?>
                        <option value="<?php echo $row['id']?>"
                        <?php if($row['brand']==$bid){echo 'selected';}?>>
                        <?php echo $row['brand']?></option>
                            <?php } ?>
                        </select></td>
 </tr>
 <tr>
                    <td><label>Product Name</label></td>
                    <td><input type="text" name="name" placeholder="Enter ProductName " style="font-size:medium;" value="<?php echo $rows['name'] ?>"></td>
 </tr>
 <tr>
                    <td><label>Product Description</label></td>
                    <td><textarea name="description" placeholder="Enter Product Description" ><?php echo $rows['description'] ?></textarea></td>
 <tr>
                    <td><label>Price</label></td>
                    <td><input type="number" name="price" placeholder="Enter Price" style="font-size:medium;" value="<?php echo $rows['price'] ?>"></td>
 </tr>
 <tr>
                    <td><label>Tax</label></td>
                    <td><input type="number" name="tax" placeholder="Enter Tax " style="font-size:medium;" value="<?php echo $rows['tax'] ?>"></td>
 </tr>
 <tr>
     <td><label>Image</label></td>
     <td><img src="<?php echo 'uploads/'.$rows['image']?>" style="width:60px;height:60px;">
    <input type="file" name="image" value="">
    </td>
</tr>
                        <tr>
                      <td colspan="1">
                        <td><input type="submit" name="submit" value="Update"></td></td>
                    </tr>
</table>
</form>
<?php require('footer.php')?>
                    