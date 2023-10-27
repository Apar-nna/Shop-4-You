<?php require('header.php')?>
<?php
require('ecommerceconnection.php');
ob_start();
$conn=new mysqli($sname, $username, $pass,$dbname);

?>
                <center>
            <h2> Product Details</h2>
</center>
<form method="POST" id="form" enctype="multipart/form-data">
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
                    <td><select name="brand">
                        <option value="0">select</option>
                        <?php
                        $sql="select * from brand";
                        $res=$conn->query($sql);
                        while($rows=$res->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $rows['id']?>"><?php echo $rows['brand']?></option>
                            <?php } ?>
                        </select></td>
 </tr>
 <tr>
                    <td><label>Product Name</label></td>
                    <td><input type="text" name="name" placeholder="Enter ProductName " style="font-size:medium;" required></td>
 </tr>
 <tr>
                    <td><label>Product Description</label></td>
                    <td><textarea name="description" placeholder="Enter Product Description" required></textarea></td>
 <tr>
                    <td><label>Price</label></td>
                    <td><input type="number" name="price" placeholder="Enter Price" style="font-size:medium;" required></td>
 </tr>
 <tr>
                    <td><label>Tax</label></td>
                    <td><input type="number" name="tax" placeholder="Enter Tax " style="font-size:medium;" required></td>
 </tr>
 <tr>
 <tr>
     <td><label>Image</label></td>
    <td><input type="file" name="image" required></td>
</tr>
 <tr>
    <td colspan=2>
        <center>
        <input type="submit" name="add" value="Add">
</center>
</td>
</tr>
</table>
</center>
</form>
</head>
</div>
<?php
if(isset($_POST['add']))
{
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $brand=$_POST['brand'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $tax=$_POST['tax'];
    // $image=$_POST['image'];
    $filename=$_FILES['image']["name"];
    move_uploaded_file($_FILES['image']["tmp_name"],'uploads/'.$filename);
    $sql="insert into product(category,subcategory,brand,name,description,price,tax,image) values('$category','$subcategory','$brand','$name','$description','$price','$tax','$filename')"; 
    $result=$conn->query($sql);
    header("Location:prolist.php");
    // header("Refresh:0");
//  var_dump($result);


}
?> 
<?php require('footer.php')?>