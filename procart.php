<html>
    <head>
    <title>Shopping cart</title>    
<!-- <link rel="stylesheet" type="text/css" href="styles6.css"> -->

    </head>
    <style>
      body{
background:#f7f4f4;
}
    *{
        padding:0;
        margin: 0;
    }
    #header{
        width: 100%;
         height: 80px; 
        /* background-color:#2974ca;   */
          /* border:1px solid rgb(32, 32, 32); */
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
    .row::after {
  content: "";
  clear: both;
  display: table;
}
#menu1 {
  float: right;
  /* margin-left: 1000px;
    margin-bottom: 10px; */

}

#menu1 li {
  list-style: none;
  margin-top: 30px;
  float: left;
  padding-right: 25px;
}
    #content{
        width: 100%;
         height: 400px; 
        /* background-color:#2974ca;   */
         /* border:1px solid rgb(32, 32, 32); */
    }
.card {
  /* box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); */
  transition: 0.3s;
  width: 15%;
  margin-left:285px;
  margin: bottom 10px;
  /* border:1px solid rgb(32, 32, 32);  */
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 3px 16px;
  margin-left:330px
  /* border:1px solid rgb(32, 32, 32);  */
}
#profile2{
    width: 40%;
    height:30px;
    background:#fff;
    float:left;
    padding-left: 3%;
    padding-top: 0.7%;
    margin-left: 485px;
    margin-top: -335px;
    /* border:1px solid rgb(32, 32, 32); */
    background-color: hsl(271, 89%, 64%);
    border: none; 
}
#k{
    width: 96%;
    height:30px; 
   /* border:1px solid rgb(32, 32, 32);  */
    margin-top:-0.4px;
    margin-left: -17px;
    font-size:17px;
    padding-left: 38px;
    padding-top: 10px;
}
#item{
    width: 104.5%;
    height:205.1px;
    background:#fff;
    float:left;
    padding-left: 3%;
    padding-top: 0.7%;
    margin-left: -41px;
    margin-top: 9.6px;
    /* border:1px solid rgb(32, 32, 32); */
}
#btn{
    width: 10%;
    height:30px;
    background:#fff;
    float:left;
    padding-left: 13%;
    padding-top: 0.7%;
    padding: bottom 50px;
    margin-left: 150px;
    margin-top: 100px;
    /* border:1px solid rgb(32, 32, 32); */
    /* background-color:#2974ca;    */
}
.button{
    background-color: hsl(271, 89%, 64%);
    color: black;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    width: 150px;  
  }
  .button:hover{
    background-color: #f3eded;
    cursor:pointer
  }
.button2{
    background-color: hsl(271, 89%, 64%);
    border: none;
    border-radius: 4px;
    margin-top: -33.5px;
     margin-left: 70px;
     font-size:15;
     
}
 #lastrow{
        width: 100%;
         height: 150px; 
          margin-top: -1px;
        /* background-color:#2974ca;   */
         border:1px solid rgb(32, 32, 32);
    }
</style>

</head>

  <body>
<?php 
session_start();
?>
  <?php
require("ecommerceconnection.php");
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
}   
 $id=$_GET['id'];
// echo $id;
 $sqli="select * from product where id=$id";
 $result=$conn->query($sqli);
//  var_dump($result);
 $row=$result->fetch_assoc();
// var_dump($row); 
		?>
 
  <div id="header" >
  <ul id="menu">
<img src="images/logor.png" height="55" width="80"><b><h6>Shop 4 You</h6></b>
</ul>
<ul id="menu1">
<li><b><a href="http://localhost/E-commerce/index.php" style="color: black">Home</a></b></li>
<li><b><a href="http://localhost/E-commerce/logout.php" style="color:black">Logout</a></b></li>

</ul>
  </div>
 
 <div id="content">
<div class="container">
  <br><br>
   <h3><b> <?php echo $row['name']?></b></h3>
  </div>
<div class="card">
  <img src="<?php echo 'uploads/'.$row['image']?>" style="width:100%;height: 250px;">
</div>
 </div>
<div id="profile2">
        <h3 style="color:#f3eded">Features</h3>
    
     <div id="item">
        <div id="k"> 
             <h3 style="color:#272525"> About the Product</h3>
            <br>
            <center>
         <p> <h3><?php echo $row['description']?></h3></p> 
         <p> <h3>Rs:<?php echo $row['price']?></h3></p> 
         <a href="order.php?id=<?php echo $row['id']; ?>" class="button">Buy Now</a>
        </div>
        <center>
        <div id="btn"> 
        
        </div>
</center>
        </div> 

      

 </div>
</body>
</html>