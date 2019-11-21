
<?php
session_start();
// require_once("connect_db.php");    
// require_once("./navbar.php");
require 'vendor/autoload.php';
$uname = $_SESSION['uname'];
// if(isset($_SESSION['id']))
// {
//   echo "<script>$('#display').html('Welcome ".$_SESSION['family_name']."');</script>";
//   echo "<script>$('#logout').attr('hidden',false);</script>";
// }
// else
// {
//   echo "<script>$('#logout').attr('hidden',true);</script>";
// }
// if(isset($_COOKIE['id']))
// {
// 	echo "<script>$('#display').html('Welcome ".$_COOKIE['family_name']."');</script>";
// 	echo "<script>$('#logout').attr('hidden',false);</script>";
// 	$_SESSION['id']= $_COOKIE['id']; 
// 	$_SESSION['family_name']= $_COOKIE['family_name']; 
// 	$_SESSION['email']= $_COOKIE['email']; 
// 	// setcookie("id", "", time()-3600);
// 	setcookie("family_name", "", time()-3600);
// 	setcookie("email", "", time()-3600);
// 	setcookie("id", "", time()-3600);
// }
// ?>
<html>
    <head>
        <title>
            Search Results
        </title>
        <link rel="stylesheet" media="screen" href="./css/search.css">
        <link rel="stylesheet" media="screen" href="./css/main.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>    
</head>
<style>
.navbar {
    position: relative;
    min-height: 50px;
    margin-bottom:0px;
    padding:10px;
    border: 1px solid transparent;
    color:white;
}
    .navbar-brand {
        height: auto;
        width:auto;
        
    }
    .navbar-default {
        background-image: none;
        background-color: #002B5F;
        border-color: #002B5F;
        
    }
    .navbar-properties {
    background-color: #0067B6 !important;
    /* background-color: #d9edf7; */
    border-color: #0067B6;

}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
  border-right:1px solid #bbb;
}

li:last-child {
  border-right: none;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
#body {
    margin-top : 10%
  font-family: Arial;
}
</style>
<body>
<ul>
  <li><a href="index2.php">Home</a></li>
  <li><a href="advance.php">Advance Search</a></li>
  <li><a href="pmpProfile.php">Profile Detais</a></li>
  <li><a href="update1.php">Change Password</a></li>
  <li><a href="update_record.php">Add a Home</a></li>
  <li><a class = "active" href="search_results_2.php">My Favourites</a></li>
  <?php
     if(empty($uname)){
     echo"<li style='float:right'><a href='logout.php'>Logout</a></li>";
  }
  else{
     echo"<li style='float:right'><a href='logout.php'>Logout</a></li>
        <li style='float:right'><a href='pmpProfile.php'>Welcome $uname</a></li>";
          
  }
  ?>
</ul>

</div>





<?php
session_start(); 
$uname = $_SESSION["uname"];
// echo $uname;
include('connect_db.php');
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "Select * from search_results where username = '$uname'";
$result = $conn->query($sql);
echo "<div class='w3-container'>
      <table class = 'w3-table-all'>
      <tr><th>Query</th><th>Date</th  ></tr>";
while($row = $result->fetch_assoc()) {
    echo "<tr><td><a href = 'search_results_6.php?id={$row['doc_id']}'>{$row['query']}</a></td><td>{$row['date']}</td><td><a href = 'search_results_1.php?id={$row['qid']}'>Delete</td></tr>";
}
echo "</table>
      </div>";
?> 
</body>
</html>