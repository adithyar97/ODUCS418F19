<?php
session_start();
include('connect_db.php');
// $_SESSION["uname"] = "adithyar82";
// print_r($_SESSION);
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "web_programming";

// // Create connection
// $conn = new mysqli($servername, $username, $password,$dbname);
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
if(isset($_POST["Submit1"]))
{

$username = $_POST['username'];
$_SESSION["uname"] = $username;
$pass =  md5($_POST['psw']);

$sql = "SELECT * FROM Users where username = '$username' and pwd = '$pass'";
// if (($result = $conn->query($sql))!== False){
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$result = $conn->query($sql);
if ($result->num_rows == 1) {

  echo '<script>
  
  window.location="pmpProfile.php";
  
  </script>';
  echo "done";
  }
  else if($result->num_rows == 0) {

    // echo '<script>
    
    // // 
    
    // </script>';
    echo  '<script>
    alert("Incorrect Credentials");
    </script>';
    }

// $result = mysql_query($sql);
// $numrows = mysql_num_rows($result);
// echo 'Connected Successfully';
// if($numrows > 0)
//    {
//     echo 'Your in';
//    }
// else
//    {
//     echo 'Your not in';
//    }

$conn->close();
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Home Search Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <!-- <script src="./jsFiles/pmpLogin.js"></script> -->
  <style>
  .form-control{
    display:inline-block;
    width:auto;
    

  }
  .label{
    display:inline-block;
    width:auto;

  }
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
#body {
    margin-top : 10%
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
  margin-top:45%;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 19px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  margin-top:45%;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
@keyframes move_wave {
    0% {
        transform: translateX(0) translateZ(0) scaleY(1)
    }
    50% {
        transform: translateX(-25%) translateZ(0) scaleY(0.55)
    }
    100% {
        transform: translateX(-50%) translateZ(0) scaleY(1)
    }
}
.waveWrapper {
    overflow: hidden;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 10%;
    margin: auto;
}
.waveWrapperInner {
    position: absolute;
    width: 100%;
    overflow: hidden;
    height: 100%;
    bottom: -1px;
    background-image: linear-gradient(to top, #86377b 20%, #27273c 80%);
}
.bgTop {
    z-index: 15;
    opacity: 0.5;
}
.bgMiddle {
    z-index: 10;
    opacity: 0.75;
}
.bgBottom {
    z-index: 5;
}
.wave {
    position: absolute;
    left: 0;
    width: 200%;
    height: 100%;
    background-repeat: repeat no-repeat;
    background-position: 0 bottom;
    transform-origin: center bottom;
}
.waveTop {
    background-size: 50% 100px;
}
.waveAnimation .waveTop {
  animation: move-wave 3s;
   -webkit-animation: move-wave 3s;
   -webkit-animation-delay: 1s;
   animation-delay: 1s;
}
.waveMiddle {
    background-size: 50% 120px;
}
.waveAnimation .waveMiddle {
    animation: move_wave 10s linear infinite;
}
.waveBottom {
    background-size: 50% 100px;
}
.waveAnimation .waveBottom {
    animation: move_wave 15s linear infinite;
}
/* body{
  /* background-image: url("backgroundimage_12.jpg"); */
  /* background-position: center; /* Center the image */
  /* background-repeat: no-repeat; /* Do not repeat the image */
  /* background-size: cover; */ 
/* } */
    </style>
  <!-- Scripts By Self -->
  <!-- <script src="./jsFiles/pmpLogin.js"></script> -->
  <!-- <link rel="stylesheet" href="./style/patientData.css" /> -->

</head>

<body>
<div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div>
  <nav class="navbar  navbar-default navbar-properties"  style="postion:fixed">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color:#66ccff;">Home Search Portal</a>

      </div>
      <ul class="nav navbar-nav navbar-right">
      <form role="form" method="post" id = "form1">
          
            <label class="form_font_heading" for="username">
              <span class="glyphicon glyphicon-user greyFil_icon"></span> Username
            </label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter email"><span class="font_red error" id="span_email"></span>
         
          
            <label class="form_font_heading" for="password">
              <span class="glyphicon glyphicon-eye-open greyFil_icon"></span> Password
            </label>
            <input type="password" class="form-control" name="psw" id="password" placeholder="Enter password">
            <span class="font_red error" id="span_pwd"></span>
          
           <button id="loginBtn" name = "Submit1"form = "form1" type="submit" class="btn btnshadowTrans" style="background-color:#0088cc;"><span class="glyphicon glyphicon-log-in"></span> Login</button> <br></a>
          
         <a href="./connect1.php" style="color:white; float:right; padding:8px;">Not a member? Register Here</a>
         <a href="./login3.php" style="color:white; float:right; padding:8px;">Forgot Password</a>
        <!-- <p>Forgot <a href="#">Password?</a></p> -->
      
        </form>
        
      </ul>
    </div>
    <!-- <img src="backgroundimage_12.jpg" style="width:100%;height:100%;"> -->
  </nav>
  <div class="waveWrapper waveAnimation">
  <div class="waveWrapperInner bgTop">
    <div class="wave waveTop" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-top.png')"></div>
  </div>
  <div class="waveWrapperInner bgMiddle">
    <div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
  </div>
  <div id="body">
        <!-- <img src="images/backgroundimag_15.jpg" style="width:100%;height:100%;"> -->
        <!-- <img src="backgroundimage_12.jpg" style="width:100%;height:100%;"> -->
        <h2 style="margin-left:45%; margin-left:30%">The Search to Your Dream Home Begins Here</h2>
        
        <!-- <img src="images/backgroundimag_15.jpg" style="width:100%;height:100%;"> -->
        
        
    
        <!-- <p>Enter your Query Here:</p> -->
<form class="example"style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button><br>
  <br>
  <br>
  <label class="radio-inline">
            <input type="radio" name="optradio1">Buy
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio1">Sell
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio1">Rent
          </label> 
</form>
    </div>
    <p class="text-align" style="margin-left:55%"><a href="advance.php" style="color:#339af0">Advanced Search</a></p>
  
  <footer style=" background:#66ccff; position:fixed; margin-bottom: 0px; width:100%; bottom: 0;font-size:1.4vh;">
        <div class="col-sm-12" style="background:#00AAFF;">
            <table class="table-responsive" style=" background:##66ccff;border-top:0px; margin-bottom:0px;border-bottom:0px;border-left:0px;border-right:0px;">
                <tbody>
                    <tr>
                        <!-- <td text-align="justify" style="padding:1%; color: white; width:80%;">June 2019, "Veterans Education and Training as Primary Care Registered Nurses (VET-PRN)." : Sponsored by Bureau of Health Professions of the Health Resources and Services Administration (HRSA)
                        </td>
                        <td><a target="_blank" href="https://www.odu.edu/nursing">
                        <img style="height:5vh ;width:7vh; border-radius: 1vh;float: right; margin-right:5px padding:10px;" src="images/ODU.png">
                        
                            </a></td> -->
                        <!-- <td></td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </footer>
<!-- </div> -->
</div>
  <div class="waveWrapperInner bgBottom">
    <div class="wave waveBottom" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-bot.png')"></div>
  </div>
</div>
    

</body>

</html>

<!--?php

include('connect_db.php');
$_SESSION["uname"] = "adithyar82";
print_r($_SESSION);
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "web_programming";

// // Create connection
// $conn = new mysqli($servername, $username, $password,$dbname);
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
 
$username = $_POST['username'];
$pass =  md5($_POST['psw']);

$sql = "SELECT * FROM Users where username = '$username' and pwd = '$pass'";
// if (($result = $conn->query($sql))!== False){
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

$result = $conn->query($sql);
if ($result->num_rows == 1) {

  echo '<script>
  
  window.location="pmpProfile.php";
  
  </script>';
  echo 'done';
  }
  else if($result->num_rows == 0) {

    // echo '<script>
    
    // // 
    
    // </script>';
    
    }

// $result = mysql_query($sql);
// $numrows = mysql_num_rows($result);
// echo 'Connected Successfully';
// if($numrows > 0)
//    {
//     echo 'Your in';
//    }
// else
//    {
//     echo 'Your not in';
//    }

$conn->close();
session_destroy();
?>