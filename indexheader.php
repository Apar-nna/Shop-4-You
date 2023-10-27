
<html>
<head>
  <?php session_start(); ?>
<title>Dashboard</title>
<link rel="stylesheet" href="index.css">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<body style="background:white">
<?php
require('ecommerceconnection.php');
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
    echo"error".$conn->$connect_error;
}

?>

    <div id=header>
<?php
 
?>
        <ul id="menu">
        <img src="images/logor.png" height="55" width="80"><b><h6>Shop 4 You</h6></b>
        </ul>
        <ul id="menu1">
          <?php
          if((isset($_SESSION['user']))){?>
            
            <li><b><a href="http://localhost/E-commerce/logout.php" style="color:black">Logout</a></b></li>

           <?php } else{ ?>

            <li><b><a href="http://localhost/E-commerce/login.php" style="color: black">Login</a></b></li>
            
            <?php } ?>

            <?php if(isset($_SESSION['user'])){?>
            
            <li><b><a href="http://localhost/E-commerce/myorders.php" style="color: black">My orders</a></b></li>
            <?php } ?>

            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <li> 
            <form action="search.php" method="post">
            <input type="text" name="searchInput" placeholder="Search by Product...">
            <input type="submit" name="searchBtn" value="Search"/>
</form>

                <!-- <input type="button" value="search" name="search" style="background-color: gray;"> -->
                        
            </li>
        </ul>
    </div>
    <div id="imageslider">
    <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="images/h51.jpg" alt="Los Angeles" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="images/img2.jpg" alt="Chicago" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="images/h1.jpg" alt="New York" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="images/h3.jpg" alt="New York" width="1100" height="500">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>

<center>
<h3>New Products</h3>
</center>
<div id="newprod">
  <?php
  $sql="select * from product";
  $result=$conn->query($sql);
  while($row=$result->fetch_assoc()){
  ?>
  <div class="card1">
    <div class="cardinner">
    <a href="http://localhost/E-commerce/procart.php?id=<?php echo $row['id']; ?>" class="cardinner">
    <img src="<?php echo 'uploads/'.$row['image']?>" class=homm>
  </a>
    </div>
    <div class="cardbot">
    <a href="http://localhost/E-commerce/procart.php?id=<?php echo $row['id']; ?>" class="cardbot">
      <?php echo $row['name']?>
      <br>
  <?php echo $row['price']?>
  </a>
    </div>
  </div>
  <?php } ?>
</div>
  </div>
</body>
</html>

    