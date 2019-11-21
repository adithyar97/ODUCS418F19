<?php
    error_reporting(E_ALL & ~E_NOTICE);
    require_once('connect_db.php');
    if(isset($_POST["create"]))
    {
        $error = 0;
        if (isset($_POST['username']) && !empty($_POST['username'])) {
            $username=mysqli_real_escape_string($conn,trim($_POST['username']));
        }else{
            $error = 1;
            $empty_username="Username Cannot be empty.";
            echo $empty_username.'<br>';
        }
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email=mysqli_real_escape_string($conn,trim($_POST['email']));
        }else{
            $error =1;
            $empty_email="Email cannot be empty.";
            echo $empty_email.'<br>';
        }

        // if (isset($_POST['category']) && !empty($_POST['category'])) {
        //     $category=mysqli_real_escape_string($conn,trim($_POST['category']));
        // }else{
        //     $error = 1;
        //     $empty_category="Category cannot be empty.";
        //     echo $empty_category.'<br>';
        // }

        if (isset($_POST['psw']) && !empty($_POST['psw'])) {
            $psw=mysqli_real_escape_string($conn,trim($_POST['password']));
        }else{
            $error = 1;
            $empty_password="Password cannot be empty";
            echo $empty_password.'<br>';
        }

        if (isset($_POST['psw-repeat']) && !empty($_POST['psw-repeat'])) {
            $repsw=mysqli_real_escape_string($conn,trim($_POST['re_password']));
        }else{
            $error = 1;
            $empty_repassword="Retype password cannot be empty";
            echo $empty_repassword.'<br>';
        }

        $password=password_hash('$psw',PASSWORD_BCRYPT);
        $date=mysqli_real_escape_string($conn, trim('now()'));
        if($psw!=$repsw)
        {
            echo "password not Matched";
        }

        if(!$error) {
            $sql= "SELECT * from Users where (username='$username' or email_address='$email')";
            echo "abc";
            $res=mysqli_query($conn,$sql);
            echo "abc";
            if (mysqli_num_rows($res) == 1) {
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            echo "abc";
            if ($username==$row['username'])
            {
                echo "Username already exists";
                echo "abc";
            }
            elseif($email==$row['email_address'])
            {
                echo "Email already exists";
                echo "abc";
            }
        }else { //here you need to add else condition
            echo "alright";
        }
        }
    }
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
.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
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
    background-color: #0067B6 !important;
    /* background-color: #d9edf7; */
    border-color: #0067B6;

}
</style>
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
  <!-- <ul>
  <li><a class="active" href="login1.php">Home</a></li> -->
  <!-- <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li style="float:right"><a href="#about">About</a></li> -->
</ul>
<form style="border:1px solid #ccc" method = "post">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>First Name</b></label>
    <input type="text" placeholder="First Name" name="fname" ><i class="fa fa-user"></i>
    <label for="name"><b>Last Name</b></label>
    <input type="text" placeholder="Last Name" name="lname"  >
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email"  >

    <label for="psw"><b>Date of Birth</b></label>
    <input type="date" name="date_of_birth" placeholder="YYYY/MM/DD"  >
    <label for="psw"><b>Phone Number </b></label>
    <input type="text" placeholder="Enter Password" name="phone_number"  >
     
    
    <label for="psw"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username"  >
    
    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  >
    
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat"  >
    <!-- <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label> -->
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="alert('Exiting'); window.location.href='index.php';">Cancel</button>
      <button type="submit" name = "create" class="signupbtn">Sign Up</button>
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
<script>
//   function submit(){
//     alert("Your Details have been submitted");
//     window.location.href='login1.php';
//     return true;
// }
  function confirmExit(){
    alert("Exiting");
    window.location.href='index.php';
}
</script>
</body>
</html>
