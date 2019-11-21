<html>
    <head>
        <title> Delegate edit form</title>
    </head>

    <body>
          <p>Delegate update form</p>
          <form method="">
Name
<input type="text" name= "Name" value= "<?php echo $fname ?> "size=10>
Username
<input type="text" name= "Username" value= "<?php echo $row["lname"]; ?> "size=10>
Password
<input type="text" name= "Password" value= "<?php echo $row["pwd"]; ?>" size=17>
<input type="submit" name= "submit" value="Update">
</form>
</body>
</html>
<?php
include('connect_db.php');

$username = "adithyar82";


// Create connection
$sql = "SELECT * FROM Users where username = '$username'"; // Please look at this too.
$result = $conn->query($sql);

if ($result->num_rows > 0){// dont put spaces in between it, else your code wont recognize it the query that needs to be executed
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["fname"]. " - Name: " . $row["lname"]. " " . $row["pwd"]. "<br>";
    $fname = $row["fname"];
    $lname = $row["lname"];
    $pwd = $row["pwd"];
}
echo $fname;
} else {
echo "0 results";
}
$conn->close();
?>
