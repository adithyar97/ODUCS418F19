<?php
session_start();
$uname = $_SESSION["uname"];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
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
input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<ul>
  <li><a class="active" href="logout.php">Home</a></li>
</ul>
<h3>Please fill the following details to serve you better</h3>

<div class="container">
  <form method = "post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Username" value = "<?php echo $uname ?>">
 	<label for="username">Specific City(If any)</label>
    <input type="text" id="username" name="username" placeholder="Username">
    <label for="username">Specific Locality(If any)</label>
    <input type="text" id="username" name="username" placeholder="Username">
    <label for="country">Occupants</label>
    <select id="country" name="country">
      <option value="australia">1</option>
      <option value="canada">2</option>
      <option value="canada">4</option>
      <option value="canada">1 BHK</option>
      <option value="canada">2 BHK</option>
      <option value="canada">Beach House</option>
    </select>
    <label for="country">Type of House</label>
    <select id="house" name="house">
      <option value="australia">Villa</option>
      <option value="canada">Independent House</option>
      <option value="canada">Condo</option>
      <option value="canada">1 BHK</option>
      <option value="canada">2 BHK</option>
      <option value="canada">Beach House</option>
    </select>

    <label for="subject">Other Requirements</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Search" onclick="alert('Exiting'); window.location.href='index.php';">
  </form>
</div>

</body>
</html>
