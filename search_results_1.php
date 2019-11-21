<?php
session_start();
$uname = $_SESSION["uname"];
$id = $_REQUEST['id'];
include('connect_db.php');
$conn = new mysqli($servername, $username, $password,$dbname);
$sql = "Delete from search_results where username = '$uname' and qid = '$id'";
    if ($conn->query($sql) === TRUE){
      echo "<script>
      alert('Record Deleted Successfully');
      window.location.href='search_results_2.php';
      </script>";
    }
    else{
        echo "error";
    }
?>
