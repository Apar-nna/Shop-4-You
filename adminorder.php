<html>
    <head>
    <title>orderlist</title>
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
  </style>
<body>
<div id="header1">
<ul id="menu">
<img src="images/logor.png" height="55" width="80"><b><h6>Shop 4 You</h6></b>
</ul>
</div>

            <center><h1>Orders</h1></center>
            <br>
            <br><br><br>
            <?php
require("ecommerceconnection.php");
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
}  
?> 
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <?php
        $sqli="SELECT * FROM `order` ORDER BY id DESC";
        $result=$conn->query($sqli);
        ?>
                <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>Pin Code</th>
                    <th>Phone number</th>
                    <th>product name</th>
                    <th>brand</th>
                    <th>Description</th>
                    <th>price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
             </thead>
        <tbody>        
<?php
$i=1;
while($row= $result->fetch_assoc())
 {             
?>
<tr>    
    <td><?php echo $i;?></td>
    <td><?php echo $row['uname'];?></td>
    <td><?php echo $row['address'];?></td>
    <td><?php echo $row['pin'];?></td>
    <td><?php echo $row['phone'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['brand'];?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php echo $row['price'];?></td>
    <td><img src="<?php echo 'uploads/'.$row['image'];?>" width="150" height="180"></td>
    <td><a href="ordercancel.php?id=<?php echo $row['id']; ?>" class="button"> Cancel</a>

    </tr>
<?php $i=$i+1;}?>
        </tbody>
    </table>
    </body>
    <script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
</html>
