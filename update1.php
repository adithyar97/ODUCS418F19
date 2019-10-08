<?php
session_start();
// session_start();
$username = $_SESSION["uname"];

// echo $uname2;
// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "web_programming";
include('connect_db.php');
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// $username = $_POST['username'];
$username = $_SESSION["uname"];
$pass =  md5($_POST['psw']);
$pwd = md5($_POST['pwd']);
// Check connection
if (isset($_POST['Submit2'])){


$sql = "Update Users SET pwd = '$pass' where username = '$username' and pwd = '$pwd'";
// if (($result = $conn->query($sql))!== False){
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE){

  $sql1 = "SELECT * FROM Users where username = '$username'";
// if (($result = $conn->query($sql))!== False){
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
    $result1 = $conn->query($sql1);
    if ($result1->num_rows > 0) {
      while($row = $result1->fetch_assoc()) {
    // echo "id: " . $row["fname"]. " - Name: " . $row["lname"]. " " . $row["pwd"]. "<br>";
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email_address = $row["email_address"];
    $date_of_birth = $row["date_of_birth"];
    $phone_number = $row["phone_number"];
    $username = $row["username"];
  }
      $_SESSION["email"] = $email_address;
      echo $_SESSION["email"];
    require 'PHPMailerAutoload.php';
    $mail = new PHPMailer; 
    // $mailaddress = $_POST['email'];
    $mailaddress = $_SESSION["email"];
    // $fname = $_POST['fname'];
    // $username = $_POST['username'];
    // $mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'adithyar82@gmail.com';                 // SMTP username
    // $mail->Password = 'Stabal@2'; 
    $mail -> Username = 'noreplyhomesearchportal@gmail.com';
    $mail -> Password = 'Vikram!23';                          // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('noreplyhomesearchportal@gmail.com', 'no reply');
    $mail->addAddress($mailaddress);     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Home Search Portal';
    $mail->Body    = 'This is to inform you that your password has been changed <br>
                    <a href = "http://localhost:8888/index.php"> Login Using Your Credentials';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail -> isHTML(true);
    // $mail -> Subject='Home Search Portal';
    // $mail -> AltBody = '<h1 align =center>Dear '.$fname.' Welcome to home search Portal</h1>
    //                     <h2 align =center>Your username is '.$username.' Kindly use this for future reference </h2>
    //                     <h3 aling = left><a href = "http://localhost:8888/login1.php"> Login Using Your Credentials';
      

    if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      // echo '<script>
      // alert("Your Details have been submited. A verification mail has been sent to your mail address with your login credentials");
      // window.location="index.php";
      // </script>';
    }
    echo '<script>
   alert("Your password has been updated");
   window.location="index.php";
   </script>';
  
   

}
else {

 
 
 

 echo '<script>
 
 alert(“Wrong user name or password”);
 
 </script>';

     
  // echo $email_address;
  // echo '<script>  
  
  // window.location="login4.php";
  
  // </script>';
  // echo 'done';
  }
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
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}


/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
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
    background-color: #00AAFF !important;
    /* background-color: #d9edf7; */
    border-color: #bce8f1;

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
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="#news">Demographic Form</a></li>
  <li><a href="pmpProfile.php">Profile Detais</a></li>
  <li><a class="active"href="update1.php">Change Password</a></li>
  <li style="float:right"><a href="logout.php">Logout</a></li>
</ul>
<form style="border:1px solid #ccc" method = "post">
  <div class="container">
    <h1>Create New Password</h1>
    <p>Dear Please enter the details to create a new password</p>
    <hr>
     
        
    <!-- <label for="psw"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required> -->
    <!-- <label for="psw"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required> -->
    <label for="psw"><b>Enter the previous password</b></label>
    <input type="password" placeholder="Enter previous password" name="pwd" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" id="psw" placeholder = "Enter new password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <!-- <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label> -->
    
    <!--  -->

    <div class="clearfix">
    <button type="button" class="cancelbtn" onclick="alert('Exiting'); window.location.href='index.php';">Cancel</button>
      <button type="submit" name = "Submit2" class="signupbtn">Change Password</button>
    </div>
  </div>
</form>
  </form>
</div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>

    
    
   
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

</body>
</html>
