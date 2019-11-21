 <?php

include('connect_db.php');
// require_once "./pmpNavBar.php";

try {
    
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $username = "adithyar82";
    echo $username;
    $q = $pdo -> prepare("SELECT * FROM Users where username = '$username'");
    // $q ->execute([200,200,19,19]); // Note: Replace static ID with session ID during Integration.
    $row = $q ->fetch();
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>



 <!doctype html>
<html lang="en">
 <style>
.navbar-properties{
    background-color: #003E52 
    background-color: #d9edf7;

}
.navbar-header{
    background-color: #003E52  
    /* background-color: #d9edf7; */

} 
</style>


<!-- // if(isset($_POST['update_profile']))
// {
//     $fname = $_POST['f_name'];
//     $lname = $_POST['l_name'];
//     $org = $_POST['org'];
//     $email = $_POST['email_at_registration'];
//     try{
//     $pdo=null;
//     $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "<script>alert('".$_POST['f_name']."<br>".$lname."<br>".$org."<br>".$role."<br>".$email."');</script>";
//     $sql = "Update pmp_users set fname=?, lname=?, organization=?, email=? where pmp_id=?";
//     $m = $pdo ->prepare($sql);
//     $m ->execute([$fname, $lname, $org, $email, 200]); // replace pmp_id with session ID.
//     // echo $m ->rowCount() . "Updated!";
//     // echo "<script>alert('Updated!');</script>";
//     if($m->rowCount()) {
//         echo '<script>alert("Details updated succesfully.\nPlease note down your updated details! "); window.location.reload();</script>';
//       }
//     }
//     catch(PDOException $pe)
//     {
//         echo "<script>alert('Connection Failed');</script>";
//     }
// } -->



<head>
  <title>Profile Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  <!-- Scripts By Self -->
  <!--script src="./jsFiles/pmpRegistration.js"></script>-->

</head>
<body>
<nav class="navbar-properties" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-size: 20px">Profile Page</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
       <li><a href="./pmpLogin.php"><span class="glyphicon glyphicon-log-in"></span>EXIT </a></li-->
    </ul>
    </div>
</nav>
<div class=row>
      <div  class="col-sm-4">

      </div>
      <div class="container text-align teal_heading col-sm-4 box_border_line" style="margin-top:100px" id="registration_form">
       <h2><i class="fa fa-user"></i> PROFILE DETAILS </h2>

                <form class="form_properties" method="POST">
              <div class="form-group" >
                  <label class="form_font_heading" for="fname">First Name :</label>
                  <div class="input-group">
                    <input id="f_name" name="f_name" type="text" class="form-control" size="100" value="<?php echo htmlspecialchars($row['fname']) ?>" required>
                    <span class="error error_red" id="spanf_name" ></span> 
                  </div>
              </div>
              <div class="form-group" >
                  <label class="form_font_heading" for="lname">Last Name :</label>
                  <div class="input-group">
                    <input id="l_name" name="l_name" type="text" class="form-control" size="100" value="<?php echo htmlspecialchars($row['lname']) ?>" required>
                    <span class="error error_red" id="spanl_name" ></span> 
                  </div>
              </div>
              <div class="form-group" >
                <label class="form_font_heading" for="organization">Organization :</label>
                <div class="input-group">
                  <input id="organization" name="org" type="text" class="form-control"  size="100" value="<?php echo ($row['pwd']) ?>" required>
                  <span class="error error_red" id="spanOrganization" ></span> 
                </div>
            </div>
              <div class="form-group" >
                <label class="form_font_heading" for="role"> Role :</label>
                <div class="input-group" style="display:inline-block;">
                <input id="organization" name="org" type="text" class="form-control"  size="100" value="<?php echo htmlspecialchars($row['pwd']) ?>" disabled>
                    <h5  id="role" name="role"><b></b></h5>
                  <span class="error error_red" id="spanOrganization" ></span> 
                </div>
            </div>

          <div class="form-group">
            <label class="form_font_heading teal_heading" for="Email">Email :</label>
            <div class="input-group">
              <input id="email_at_registration" name="email_at_registration" type="email" class="form-control" size="100" value="<?php echo htmlspecialchars($row['pwd']) ?>" required>
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
