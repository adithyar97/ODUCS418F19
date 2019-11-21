<?php
$doc_id = $_REQUEST['id1'];
// echo "$query";
$query = $_REQUEST['id2'];
session_start();
$_SESSION['query'] = $query;
include('connect_db.php');
$conn = new mysqli($servername, $username, $password,$dbname);
$uname = $_SESSION["uname"];
// echo $uname;
if(empty($uname)){
    echo "<script>
    alert('Kindly Login to save your details')
    window.location.href='index_2.php';
    </script>";
    
}
// include('connect_db.php');
//  $conn = new mysqli($servername, $username, $password,$dbname);
else{
    $sql = "Insert into search_results(qid,username,query,doc_id) Values (Null,'$uname','$query','$doc_id')";
    if ($conn->query($sql) === TRUE){
      echo "<script>
      alert('Record Saved Successfully');
      window.location.href='index2.php';
      </script>";
 }
 else{
    echo "error"; 
 }
 }
?>