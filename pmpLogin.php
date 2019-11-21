<?php
include("./connect_DB.php");
session_start();

if(isset($_SESSION["pmp_id"])){
  header("Location:./pmpHome.php");
}


// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
    echo "<script>alert('Please enter username.');</script>";
    exit();
  } else {
    $username = trim($_POST["username"]);
  }
  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
    echo "<script>alert('Please enter your password.');</script>";
    exit();
  } else {
    $password = trim($_POST["password"]);
  }
  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement  
    $sql = "SELECT u.pmp_id, u.email as username, u.pwd as password,ur.role_id,r.r_name,r.role_status as roleStatus,u.demographic_status as demo_status,u.temp_pwd_reset as temp_pwd_status FROM pmp_users u LEFT join pmp_user_role_mapping ur on u.pmp_id = ur.user_id left join pmp_role r on ur.role_id = r.role_id WHERE u.email = '$username' and u.invite_status = 'registered'";
    //echo $sql;
    $sql_result = $conn->query($sql);
    if ($sql_result == TRUE) {
      if (mysqli_num_rows($sql_result) == 1) {
        while ($row = $sql_result->fetch_assoc()) {
          // Password is correct, so start a new session
          $hashedPwd = $row["password"];
          if (password_verify($password, $hashedPwd)) {
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["pmp_id"] = $row["pmp_id"];
            $_SESSION["username"] = $username;
           // $_SESSION["role"] = $row["role"];
            $_SESSION["rname"] = $row["r_name"];
            $_SESSION["roleId"] = $row["role_id"];
            $_SESSION["temp_pwd_status"]=$row["temp_pwd_status"];
            $sql1 = "SELECT * FROM pmp_role_feature_mapping where r_id =" . $_SESSION["roleId"] . "";
            $sql1_result = $conn->query($sql1);
            if ($sql1_result == TRUE) {
              while ($row1 = $sql1_result->fetch_assoc()) {
                $_SESSION["f" . $row1["fid"]] = true;
              }
            }
            if ($row["roleStatus"] == 1) {
              if($row["role_id"] == 19 && $row["demo_status"] == 0){
                header("Location: ./pmpDemographicForm.php?cgid=".$row["pmp_id"]);
              }else{
                header("Location: ./pmpHome.php");
                exit();
              }
            } else {
              header("Location: ./pmpDisabledRole.php");
              echo "Please contact your Admin";
            }
          } else {
            //echo "<script>alert('Invalid username or password.Try again');</script>";
            header("Location: ./pmpDisabledRole.php");
          }
        }
      } else {
        echo "<script>alert('Cannot Login!! Please contact your Supervisor/Admin for removing  your  hold ');</script>";
      }
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>PMAP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  
  <!-- Scripts By Self -->
  <script src="./jsFiles/pmpLogin.js"></script>
  <link rel="stylesheet" href="./style/patientData.css" />

</head>

<body>
  <nav class="navbar  navbar-default navbar-properties">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" >Patient Medication Access Portal</a>
      </div>
    </div>
  </nav>
  <div class=row style="margin-top:200px">
    <div class="col-sm-4">

    </div>
    <div class="container col-sm-4 box_border_line">
      <div class="text-align teal_heading">
        <h1> <i class="fas fa-user-lock"></i> LOGIN</h1>
      </div>
      <div>
        <form name="myForm" role="form" method="post">
          <div class="form-group">
            <label class="form_font_heading" for="username">
              <span class="glyphicon glyphicon-user greyFil_icon"></span> Username
            </label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter email"><span class="font_red error" id="span_email"></span>
          </div>
          <div class="form-group">
            <label class="form_font_heading" for="password">
              <span class="glyphicon glyphicon-eye-open greyFil_icon"></span> Password
            </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            <span class="font_red error" id="span_pwd"></span>
          </div>
          <button id="loginBtn" type="submit" class="btn btnshadowTrans"><span class="glyphicon glyphicon-off"></span> Login</button>
        </form>
      </div>
      <div>
        <p class="text-align"> <a href="./pmpRegistration.php" style="color:#339af0">Not a member? Register Here</a></p>
        <!-- <p>Forgot <a href="#">Password?</a></p> -->
      </div>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</body>

</html>