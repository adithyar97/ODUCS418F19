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
  <form method = "post" action = "search_page_2.php">
    <label for="username">Username</label>
    <!-- <input type="text" id="username" name="username" placeholder="Username" value = "<?php echo $uname ?>">
 	<label for="username">Specific City(If any)</label>
    <input type="text" id="username" name="username" placeholder="Username">
    <label for="username">Specific Locality(If any)</label>
    <input type="text" id="username" name="username" placeholder="Username"> -->
    <label for="address">Specific Locality(If any)</label>
    <select id="address" name="address">
      <option value="0 GRANDVIEW AVE">0 GRANDVIEW AVE</option>
      <option value="530 SMITHFIELD ST">530 SMITHFIELD ST</option>
      <option value="0 WASHINGTON PL">0 WASHINGTON PL</option>
      <option value="0 CRAWFORD ST">0 CRAWFORD ST</option>
      <option value="39 VINE ST">39 VINE ST</option>
      <option value="1610 FORESIDE ST">1610 FORESIDE ST</option>
    </select>
    <label for="neighborhood">District</label>
    <select id="neighborhood" name="neighborhood">
      <option value="Mount Washington">Mount Washington</option>
      <option value="Central Business District">Central Business District</option>
      <option value="Crawford-Roberts">Crawford-Roberts</option>
      <option value="Bluff">Bluff</option>
      <option value="canada">2 BHK</option>
      <option value="canada">Beach House</option>
    </select>
    <label for="ward">Ward</label>
    <select id="ward" name="ward">
      <option value="1">1</option>
      <option value="3">3</option>
      <option value="6">6</option>
      <option value="19">19</option>
      <option value="canada">2 BHK</option>
      <option value="canada">Beach House</option>
    </select>
    <label for="council_district">Council District</label>
    <select id="council_district" name="council_district">
      <option value="2">2</option>
      <option value="6">6</option>
      <option value="Crawford-Roberts">Crawford-Roberts</option>
      <option value="Bluff">Bluff</option>
      <option value="canada">2 BHK</option>
      <option value="canada">Beach House</option>
    </select>
    <label for="public_works_division">Public Works Division</label>
    <select id="public_works_division" name="public_works_division">
      <option value="6">6</option>
      <option value="3">3</option>
      <option value="Crawford-Roberts">Crawford-Roberts</option>
      <option value="Bluff">Bluff</option>
      <option value="canada">2 BHK</option>
      <option value="canada">Beach House</option>
    </select>
    <label for="pli_division">PLI Division</label>
    <select id="pli_division" name="pli_division">
      <option value="1">1</option>
      <option value="3">3</option>
      <option value="Crawford-Roberts">Crawford-Roberts</option>
      <option value="Bluff">Bluff</option>
      <option value="canada">2 BHK</option>
      <option value="canada">Beach House</option>
    </select>

    <label for="subject">Other Requirements</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Search">
  </form>
</div>

</body>
</html>
