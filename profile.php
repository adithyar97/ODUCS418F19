<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">Profile Details</h2>

<div class="card">
  <img src="abc.jpg" alt="John" style="width:100%">
  <h1>ADITHYA RAMESH</h1>
  <h3>DEPARTMENT OF COMPUTER SCIENCE</h3>
  <p class="title">OLD DOMINION UNIVERSITY</p>
  <p>Phone Number : +1 757-452-8266</p>
  <p>Email : adithyar82@gmail.com</p>
  <p><button type="submit" class="signupbtn" onclick="alert('Exiting'); window.location.href='index.php';">Back</button></p>
</div>

</body>
</html>