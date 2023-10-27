<html>
    <head>
    <title>Search</title>    
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
.button{
    background-color: #633974 ;
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
#content{
        width: 100%;
         height: 400px; 
        /* background-color:#2974ca;   */
         /* border:1px solid rgb(32, 32, 32); */
    }
    </style>
    <body>
    <div id="header" >
  <ul id="menu">
<img src="images/logor.png" height="55" width="80"><b><h6>Shop 4 You</h6></b>
</ul>
<ul id="menu1">
<li><b><a href="http://localhost/E-commerce/index.php" style="color: black">Home</a></b></li>

</ul>
  </div>
 
 <div id="content">
<?php
require("ecommerceconnection.php");
$conn=new mysqli($sname, $username, $pass,$dbname);
if($conn->connect_error)
{
echo "connection error".$conn->connect_error;
}  
if(isset($_POST['searchBtn'])) {
  $searchInput = $_POST['searchInput'];
  // Perform the search query
  $query = "SELECT * FROM product WHERE name LIKE '%$searchInput%'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) > 0) {
    // Display the search results
    while($rowr = mysqli_fetch_assoc($result)) {
      ?>
      <center>
          <a href="procart.php?id=<?php echo $rowr['id']; ?>">
<?php
      echo "<div class='product'>";
      echo "<span class='product-name'>" . $rowr['name'] . "</span>";
      echo "<p class='product-description'>" . $rowr['description'] . "</p>";
      echo   $rowr['price'] ;
      ?>
      <br>
      <br>
      <img src="<?php echo 'uploads/'.$rowr['image']?>"width="300px",height="300px"></td>
      <br>
      <br>
    </a>
    <a href="procart.php?id=<?php echo $rowr['id']; ?>" class="button">Product Details</a>
    </center>
<?php
      echo "</div>";
    }
  } else {
    echo "No results found";
  }

  // Close the database connection
  mysqli_close($conn);
}?>
</div>
</body>
</html>