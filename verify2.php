<?php
//  error_reporting(E_ALL);
//  ini_set("display_errors", 1);
 require 'PHPMailerAutoload.php';
 // $mail = new PHPMailer;
 // $mail -> isSMTP();
 // $mail -> Host = 'smtp.gmail.com';
 // $mail -> Post = 587;
 // $mail -> SMTPAuth = true;
 // $mail -> SMPTSecure = 'tls';
 
 // $mail -> Username = 'studentrecruitment.csodu@gmail.com';
 // $mail -> Password = 'Srts@123';
 // $mailaddress = $_POST['email'];
 // $fname = $_POST['fname'];
 // $username = $_POST['username'];
 // require 'PHPMailerAutoload.php';
 // function rand_string_1( $length ) {
 
 //     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 //     return substr(str_shuffle($chars),0,$length);
     
 //     }
     
 // $pwd = rand_string_1(8);
 // echo $pwd;
 $mail = new PHPMailer;
 $mailaddress = $_POST['email'];
//  $fname = $_POST['fname'];
//  $username = $_POST['username'];
 // $mail->SMTPDebug = 4;                               // Enable verbose debug output
 
 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
 $mail->SMTPAuth = true;                               // Enable SMTP authentication
 // $mail->Username = 'adithyar82@gmail.com';                 // SMTP username
 // $mail->Password = 'Stabal@2'; 
 $mail -> Username = 'studentrecruitment.csodu@gmail.com';
 $mail -> Password = 'Srts@123';                          // SMTP password
 $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
 $mail->Port = 587;                                    // TCP port to connect to
 
 $mail->setFrom('studentrecruitment.csodu@gmail.com', 'no reply');
 $mail->addAddress($mailaddress);     // Add a recipient
 // $mail->addAddress('ellen@example.com');               // Name is optional
 // $mail->addReplyTo('info@example.com', 'Information');
 // $mail->addCC('cc@example.com');
 // $mail->addBCC('bcc@example.com');
 
 // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 // $mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'Congratulations on winning the ODU CS Alumni 2019 Raffle!';
$mail->Body   = "Congratulations on winning the ODU CS Alumni 2019 Raffle!<br /><br />

                 Regards, <br/>
                 ODU-CS Alumini Team";
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
     echo '<script>
     alert("Your Details have been submitted")
     
     </script>';
 }
?>
<html>
<style>
#register_form h1 {
  text-align: center;
}
/* body {
  background: #A9D9C3;
} */
#register_form {
  width: 37%;
  margin: 100px auto;
  padding-bottom: 30px;
  border: 1px solid #918274;
  border-radius: 5px;
  background: white;
}
#register_form input {
  width: 80%;
  height: 35px;
  margin: 5px 10%;
  font-size: 1.1em;
  padding: 4px;
  font-size: .9em;
}
.form_error span {
  width: 80%;
  height: 35px;
  margin: 3px 10%;
  font-size: 1.1em;
  color: #D83D5A;
}
.form_error input {
  border: 1px solid #D83D5A;
}
#reg_btn {
  height: 35px;
  width: 80%;
  margin: 5px 10%;
  color: white;
  background-color: #4CAF50;
  border: none;
  border-radius: 5px;
}
#cancel_btn {
  height: 35px;
  width: 80%;
  margin: 5px 10%;
  color: white;
  background-color: #FF6347;
  border: none;
  border-radius: 5px;
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
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a class="active" href="#news">Sign Up</a></li>
</ul>
  <form id="register_form" method  = "post">
  	<h1>Update Contact Number</h1>
    <div>
    <p align = "center">Please Enter the email address</p>
    </div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input type="email" name="email" placeholder="Email" required>
  	</div>
    <div>
  		<button type="submit" name="register" id="reg_btn">Register</button>
  	</div>
    <div>
  		<button type="submit" name="cancel" id="cancel_btn" onclick="alert('Exiting'); window.location.href='index.php';">Cancel</button>
  	</div>
  </form>
  </body>
</html>