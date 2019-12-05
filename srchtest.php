
<?php
session_start();
$uname = $_SESSION["uname"];
echo $username;
if(empty($_POST['search2'])){
    $query = $_SESSION['query'];
}
else{
    $query = $_POST['search2'];
}
// require_once("connect_db.php");    
// require_once("./navbar.php");
require 'vendor/autoload.php';
 ?>
<html>
    <head>
    
        <title>
            Search Results
        </title>
        <link rel="stylesheet" media="screen" href="./css/search.css">
        <link rel="stylesheet" media="screen" href="./css/main.css">
        <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/mark.js/8.6.0/jquery.mark.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
</head>
<style>
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
/* ul1 {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li1 {
  float: left;
  border-right:1px solid #bbb;
}

li1:last-child {
  border-right: none;
}

li1 a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li1 a:hover:not(.active) {
  background-color: #111;
}  */

.active {
  /* background-color: #4CAF50; */
}
#body {
    margin-top : 10%
  font-family: Arial;
}
.highlight {
  background-color: yellow;
}
.pagination{
  /* background-color: yellow; */
  color: black;
  margin-left:45%;
  word-spacing: 30px;
}
</style>
<body>
<br>
<br>
<br>
<ul1>
  <li1><a class="active" href="index2.php">Home</a></li11>
  <li1><a href="advance.php">Advance Search</a></li1>
  <li1><a href="#news">Profile Detais</a></li1>
  <li1><a href="update1.php">Change Password</a></li1>
  <li1><a href="search_results_2.php">My Favourites</a></li1>
  <li1 style="float:right"><a href="logout.php">Logout</a></li1>
</ul1>


</div>
<!-- Main body of text -->

​
<div class="searchresults">
  <h3 style = "margin-left:45%">Home Search Portal</h3>
    <p id="stat"></p>
    <div style="width:900px;">
<form class="form-inline active-cyan-3 active-cyan-4" method="POST">
<i class="fas fa-search" aria-hidden="true"></i>
  <input type="text" class="form-control input-lg col-lg-4 input-search" value="0" id="opt"  name="option_sel" hidden>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search By Locations" oninput = "onclick()" value ="<?php echo $query?>" name = "search2" id="search2" type="submit">
  &nbsp;<input type="submit" hidden>
  
</form>
<form class="example"style="margin:auto;max-width:300px" method="post" action ="search_page.php">

  <script>
  function onclick(){
                var safe_query = filterXSS($("#search2").val());
                $("#search").val(safe_query).trim();
                }
  </script>
  <script>
    $(document).ready(function(){
    $(function() {
    var mark = function() {
      // Read the keyword
      var keyword = $("input[name='search2']").val();
      // console.log(keyword);
      // Remove previous marked elements and mark
      // the new keyword inside the context
      $(".snippet").unmark({
        done: function() {
          $(".snippet").mark(keyword);
        }
      });
    };
    $("input[name='search2']").on("blur", mark);
    $("input[name='search2']").on("click", mark);
    });
    });
  </script>
  <script>
$(document).ready(function(){
  var options = {
    valueNames: [ 'name', 'category' ],
    page: 10,
    pagination: true}
  

  var listObj = new List('listId', options);
});
</script>
</div>
</form>
    <?php
 use Elasticsearch\ClientBuilder;
 if(empty($_POST['search2'])){
        $query = $_SESSION['query'];
        
 }
 else{
        $query = strip_tags($_POST['search2']);  
 }
  $hosts = ['http://localhost:9200'];
  $client = ClientBuilder::create()->setHosts($hosts)->build();
  $params = [
      'index' => 'real_estate',
      'body' => [
       'from' => 0,
       'size' => 10000,
          'query' => [
              // 'multi_match' => [
              //  'query' => $query,
              //  'fields'=> ['address','neighborhood','council_district','pin','_id']
              // 
              'fuzzy' =>[
                'address'=>$query
              ]
          ] 
      ]
  ]; 
  $response = $client->search($params);
  $results_count = sizeof($response['hits']['hits'],0);
  if($results_count===0)
  {
    // echo "<script> alert('No results found, please try again');
    //    window.location.href='index2.php' </script>";
      //  echo 'No results found';
      echo "No Results found for the query $query";
      echo"<br>";
      echo"Please try again";
  }
  $time_took = ((int)($response['took'])/1000);
  $results = $response['hits']['hits'];
  echo "<h6> Results displayed for the query: $query </h6>";
  $haystack = $results[0]['_source']['address'];
  $needle = $query;
  if (stripos($haystack, $needle) !== False){ 
      echo"<br>";
  }  
  // echo $query;
  else{
    echo"<p> Did you mean: ";
    echo $results[0]['_source']['address'];
    echo"</p>";
  } 
  echo "<script>\$(document).ready(function(){
    $('#stat').html('About ".$results_count." results in ".$time_took." seconds');
  })</script>";
  ?>

<div id="listId">
  <ul class="list">
   
    <?php 
    
    for ($i=0; $i<$results_count; $i++)
  {  echo"<li class=snippet>";
    //  echo $results[$i]['_id'];
     echo' <a href="search_results.php?id='.$results[$i]['_source']['pin'].'"id="address">'.$results[$i]['_source']['address'].' '.$results[$i]['_source']['neighborhood'].'</a> <br> <a href="search_results_4.php?id1='.$results[$i]['_id'].'&id2='.$results[$i]['_source']['address'].'"Neighborhood: </b> <br>Save to my Favourites</a> <br>' ;
     echo"</li>";
  }
?>

    
  </ul>
  <ul class="pagination"></ul>
</div>

</body>
</html>




