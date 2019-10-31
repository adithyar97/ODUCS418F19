<?php
session_start();
include('connect_db.php');


// echo $uname;
// try {
    
//     $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     $q = $pdo -> prepare("Select `fname`,`lname`,`organization`,`r_name`,`email` from pmp_users, pmp_role, pmp_user_role_mapping where pmp_users.pmp_id = ? and pmp_user_role_mapping.user_id = ? and pmp_user_role_mapping.role_id = ? and pmp_role.role_id = ?");
//     $q ->execute([$_SESSION["pmp_id"],$_SESSION["pmp_id"],$_SESSION["roleId"],$_SESSION["roleId"]]); // Note: Replace static ID with session ID during Integration.
//     $row = $q ->fetch();
// } catch (PDOException $pe) {
//     die("Could not connect to the database $dbname :" . $pe->getMessage());
// }
// 

// $uname = $_SESSION["username"];
// echo "Favorite color is " . $_SESSION["username"] . ".<br>";
// echo $uname;
$uname = $_SESSION["uname"];
$uname1 = $_SESSION["uname"];
$_SESSION["uname"] = $uname;

// Create connection
$sql1 = "SELECT * FROM Users where username = '$uname'"; // Please look at this too.
$result = $conn->query($sql1);

if ($result->num_rows > 0){// dont put spaces in between it, else your code wont recognize it the query that needs to be executed
while($row = $result->fetch_assoc()) {
    // echo "id: " . $row["fname"]. " - Name: " . $row["lname"]. " " . $row["pwd"]. "<br>";
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email_address = $row["email_address"];
    $date_of_birth = $row["date_of_birth"];
    $phone_number = $row["phone_number"];
    $username = $row["username"];
}
// echo $fname;
} else {
// 
}
$conn->close();
?>
<!doctype html>
<html lang="en">

<?php

if(isset($_POST['update_profile']))
{
  include('connect_db.php'); 
  // $servername = "localhost";
  // $username = "root";
  // $password = "root";
  // $dbname = "web_programming";
    
  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $date_of_birth = $_POST['date_of_birth'];
  $phone_number = $_POST['phone_number'];
  
  $username = $_POST['username'];
  // $pass =  md5($_POST['psw']);
  // Check connection
  
  $sql = "UPDATE Users Set fname = '$fname', lname = '$lname', email_address = '$email', date_of_birth = '$date_of_birth', phone_number = '$phone_number' where username = '$username'";
  
  if ($conn->query($sql) === TRUE) {
      echo '<script>
      alert("Your Details have been Updated");
      window.location="index.php";
      </script>';
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close(); 
} 

?>

<head>
  <title>Profile Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <!-- <link rel="stylesheet" href="./style/patientData.css" /> -->
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
</style>
</head>
<body>
<!-- <nav class="navbar  navbar-default navbar-properties"  style="postion:fixed">
<div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color:#66ccff;">Home Search Portal</a>

      </div>
      <ul class="nav navbar-nav navbar-right">
      <!-- <form name="myForm" role="form" method="post">
          
            <label class="form_font_heading" for="username">
              <!-- <span class="glyphicon glyphicon-user greyFil_icon"></span> Username -->
            <!-- </label> -->
            <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Enter email"><span class="font_red error" id="span_email"></span> -->
         
<!--           
            <label class="form_font_heading" for="password">
              <!-- <span class="glyphicon glyphicon-eye-open greyFil_icon"></span> Password -->
            <!-- </label>
            <!-- <input type="password" class="form-control" name="psw" id="password" placeholder="Enter password"> -->
            <!-- <span class="font_red error" id="span_pwd"></span>
          
          <button id="loginBtn" type="submit" class="btn btnshadowTrans" style="background-color:#0088cc;"><span class="glyphicon glyphicon-log-out"></span> Back </button> <br>
          
         <a href="./login1.php" style="color:white; float:right; padding:8px;">Not a member? Register Here</a>
        <!-- <p>Forgot <a href="#">Password?</a></p> -->
      
        <!-- </form>
         
      </ul>
    </div>
  </nav> -->
  <ul>
  <li><a href="index2.php">Home</a></li>
  <li><a href="advance.php">Advance Search</a></li>
  <li><a href="update_record.php">Add a Home</a></li>
  <li><a class="active" href="#news">Profile Detais</a></li>
  <li><a href="update1.php">Change Password</a></li>
  <li style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<h1 align = "center"> Welcome Back <?php echo $fname ?></h1>
<div class=row>
      <div  class="col-sm-4">

      </div>
      <div class="container text-align teal_heading col-sm-4 box_border_line" style="margin-top:100px" id="registration_form">
       <h2><i class="fa fa-user"></i> PROFILE DETAILS </h2>

                <form class="form_properties" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="form-group" >
                  <label class="form_font_heading" for="fname">First Name :</label>
                  <div class="input-group">
                    <input id="fname" name="fname" type="text" class="form-control" size="100" value="<?php echo $fname ?>" required>
                    <span class="error error_red" id="spanf_name" ></span> 
                  </div>
              </div>
              <div class="form-group" >
                  <label class="form_font_heading" for="lname">Last Name :</label>
                  <div class="input-group">
                    <input id="lname" name="lname" type="text" class="form-control" size="100" value="<?php echo $lname ?>" required>
                    <span class="error error_red" id="spanl_name" ></span> 
                  </div>
              </div>
              <div class="form-group" >
                <label class="form_font_heading" for="organization">Email :</label>
                <div class="input-group">
                  <input id="email" name="email" type="email" class="form-control"  size="100" value="<?php echo $email_address?>" disabled>
                  <span class="error error_red" id="spanOrganization" ></span> 
                </div>
            </div>
              <div class="form-group" >
                <label class="form_font_heading" for="role"> Date of Birth :</label>
                <div class="input-group" style="display:inline-block;">
                <input id="date_of_birth" name="date_of_birth" type="text" class="form-control"  size="100" value="<?php echo $date_of_birth ?>" required>
                    <h5  id="role" name="role"><b></b></h5>
                  <span class="error error_red" id="spanOrganization" ></span> 
                </div>
            </div>

          <div class="form-group">
            <label class="form_font_heading teal_heading" for="Email">Phone Number :</label>
            <div class="input-group">
              <input id="phone_number" name="phone_number" type="text" class="form-control" size="100" value="<?php echo $phone_number ?>" required>
              <span class="error error_red" id="spanEmail_at_registration"></span>
            </div>
        </div> 
        <div class="form-group">
            <label class="form_font_heading teal_heading" for="Email">Username :</label>
            <div class="input-group">
              <input id="username" name="username" type="text" class="form-control" size="100" value="<?php echo $username ?>" disabled>
              <span class="error error_red" id="spanEmail_at_registration"></span>
            </div>
        </div>  
            
        <div class="text-align form-group">
                      <div>
                        <button class="btn btn-info" id ="update_profile" name ="update_profile" type="submit" style="font-size: 20px"><i class="fa fa-edit" style="font-size: 20px"></i> UPDATE</button>
                      </div>
                </div>
                 </div>
            </form>
            </div>
      <div  class="col-sm-4">

      </div>
</div>
</body>

</html>
