<?php include('process.php') ?>
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
  	<h1>Sign Up</h1>
    <div>
    <p align = "center">Please fill in this form to create an account.</p>
    </div>
    <div>
    <input type="text" placeholder="First Name" name="fname" required><i class="fa fa-user"></i>
    </div>
    <div>
    <input type="text" placeholder="Last Name" name="lname" required>
    </div>
    <div>
    <input type="date" name="date_of_birth" placeholder="YYYY/MM/DD" required>
    </div>
  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
	  <?php if (isset($name_error)): ?>
	  	<span><?php echo $name_error; ?></span>
	  <?php endif ?>
  	</div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
      <?php if (isset($email_error)): ?>
      	<span><?php echo $email_error; ?></span>
      <?php endif ?>
  	</div>
  	<div>
  		<input type="text"  placeholder="Phone number" name="phone_number" required>
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