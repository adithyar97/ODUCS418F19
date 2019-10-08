<?php 
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  $db = mysqli_connect('localhost', 'root', 'root', 'web_programming');
  $username = "";
  $email = "";
  if (isset($_POST['register'])) {
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	// $password = $_POST['password'];

  	$sql_u = "SELECT * FROM Users WHERE username='$username'";
  	$sql_e = "SELECT * FROM Users WHERE email_address='$email'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Username already exists"; 	
  	}else if(mysqli_num_rows($res_e) > 0){
  	  $email_error = "Account already exists"; 	
  	}else{
                function rand_string( $length ) {

                    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                    return substr(str_shuffle($chars),0,$length);
                    
                    }
                    
                $pwd = rand_string(8);
                echo $pwd;
                // $conn = new mysqli($servername, $username, $password,$dbname);
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $date_of_birth = $_POST['date_of_birth'];
                $phone_number = $_POST['phone_number'];
                
                $username = $_POST['username'];
                // $pass =  md5($_POST['psw']);
                $pass = md5($pwd);
                
                // Check connection
                echo $pass;
                // $sql = "INSERT INTO Users (u_id, fname, lname, email_address,date_of_birth,phone_number, username, pwd) VALUES (Null,'$fname','$lname','$email','$date_of_birth','$phone_number','$username','$pass');";
                
                // if ($conn->query($sql) === TRUE) {
                //     echo "New record created successfully";
                // } else {
                //     echo "Error: " . $sql . "<br>" . $conn->error;
                // }
                $query = "INSERT INTO users (u_id, fname, lname,email_address,date_of_birth,phone_number,username,pwd) VALUES (Null,'$fname','$lname','$email','$date_of_birth','$phone_number','$username','$pass');"; 
      	    	  
                $results = mysqli_query($db, $query);
                // $sql1 = "INSERT INTO demographic_form (username, city, house, occupants, cost) VALUE ('$username', ' ', ' ', ' ', ' ')";
                
                // if ($conn->query($sql1) === TRUE) {
                //     echo "New record created successfully";
                // } else {
                //     echo "Error: " . $sql1 . "<br>" . $conn->error;
                // }
                
                
                // $conn->close();
                // 
                error_reporting(E_ALL);
                ini_set("display_errors", 1);
                require 'PHPMailerAutoload.php';
                // $mail = new PHPMailer;
                // $mail -> isSMTP();
                // $mail -> Host = 'smtp.gmail.com';
                // $mail -> Post = 587;
                // $mail -> SMTPAuth = true;
                // $mail -> SMPTSecure = 'tls';
                
                // $mail -> Username = 'noreplyhomesearchportal@gmail.com';
                // $mail -> Password = 'Vikram!23';
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
                $fname = $_POST['fname'];
                $username = $_POST['username'];
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
                $mail->Body    = 'Dear '.$fname.' Welcome to home search Portal</b> <br>
                                    Your username is '.$username.' and your password is '.$pwd.'<br>
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
                    echo '<script>
                    alert("Your Details have been submitted")
                    window.location="index.php";
                    </script>';
                }
          
        //    $sql = "INSERT INTO Users (u_id, fname, lname, email_address,date_of_birth,phone_number, username, pwd) VALUES (Null,'$fname','$lname','$email','$date_of_birth','$phone_number','$username','$pass');";
    
        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
           echo 'Saved!';
           exit();
  	}
  }
?>
