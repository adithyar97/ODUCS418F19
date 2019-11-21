
<?php
session_start();
$uname = $_SESSION["uname"];
echo $username;
// require_once("connect_db.php");    
// require_once("./navbar.php");
require 'vendor/autoload.php';
// if(isset($_SESSION['id']))
// {
//   echo "<script>$('#display').html('Welcome ".$_SESSION['family_name']."');</script>";
//   echo "<script>$('#logout').attr('hidden',false);</script>";
// }
// else
// {
//   echo "<script>$('#logout').attr('hidden',true);</script>";
// }
// if(isset($_COOKIE['id']))
// {
// 	echo "<script>$('#display').html('Welcome ".$_COOKIE['family_name']."');</script>";
// 	echo "<script>$('#logout').attr('hidden',false);</script>";
// 	$_SESSION['id']= $_COOKIE['id']; 
// 	$_SESSION['family_name']= $_COOKIE['family_name']; 
// 	$_SESSION['email']= $_COOKIE['email']; 
// 	// setcookie("id", "", time()-3600);
// 	setcookie("family_name", "", time()-3600);
// 	setcookie("email", "", time()-3600);
// 	setcookie("id", "", time()-3600);
// }
// ?>
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
/* .navbar {
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
    /* background-color: #d9edf7; 
    border-color: #0067B6;

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
} */

.active {
  background-color: #4CAF50;
}
#body {
    margin-top : 10%
  font-family: Arial;
}
.highlight {
  background-color: yellow;
}
</style>
<body>
<ul>
  <li><a class="active" href="index2.php">Home</a></li>
  <li><a href="advance.php">Advance Search</a></li>
  <li><a href="#news">Profile Detais</a></li>
  <li><a href="update1.php">Change Password</a></li>
  <li><a href="search_results_2.php">Show Search Results</a></li>
  <li style="float:right"><a href="logout.php">Logout</a></li>
</ul>

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
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search By Locations" oninput = "abc()" name = "search2" id="search2" type="submit">
  &nbsp;<input type="submit" hidden>
  
</form>
<!-- <input type="text" name="<?php echo $query?>" class="form-control input-sm" placeholder="TYPE THE TEXT"> -->
<form class="example"style="margin:auto;max-width:300px" method="post" action ="search_page.php">
<!-- <input type="text" placeholder="Search by Location.." id="search2" oninput = "onclick()" name = "search2" id="search2" type="submit"> -->
  <!-- <button type="submit"><i class="fa fa-search"></i></button><br> -->
  <script>
  function abc(){
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
    $("input[name='search2']").on("input", mark);
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
 $query = strip_tags($_POST['search2']);
//  echo $uname;
//  include('connect_db.php');
//  $conn = new mysqli($servername, $username, $password,$dbname);
//  $sql = "Insert into search_results(username,query) Values ('$uname','$query')";
//  if ($conn->query($sql) === TRUE){
//    echo "Done";
//  }
//  if($_POST['option_sel']=="0")
//  {
  // highlight_string("$query");
  $hosts = ['http://localhost:9200'];
  $client = ClientBuilder::create()->setHosts($hosts)->build();
  $params = [
      'index' => 'real_estate',
      'body' => [
       'from' => 0,
       'size' => 10000,
          'query' => [
              'multi_match' => [
               'query' => $query,
               'fields'=> ['address','neighborhood','council_district','pin','_id']
              ]
          ]
      ]
  ]; 
  $response = $client->search($params);
  $results_count = sizeof($response['hits']['hits'],0);
  if($results_count===0)
  {
    echo "<script> alert('No results found, please try again');
       window.location.href='index2.php' </script>";
      //  echo 'No results found';
  }
  $time_took = ((int)($response['took'])/1000);
  $results = $response['hits']['hits'];
  echo '<h4> Results displayed for the query: </h4>'; 
  echo $query;
  echo "<script>\$(document).ready(function(){
    $('#stat').html('About ".$results_count." results in ".$time_took." seconds');
  })</script>";
//  echo "<div class='cards' style='margin-bottom:6%;'>";
//   for ($i=0; $i<$results_count; $i++)
//   {
//      echo'
       
//        <div id="'.$results[$i]['_id'].'" class="p-3">
       
//        <div style="display:inline-block;" id="content">
//        <p class="snippet"><a href="search_results.php?id='.$results[$i]['_source']['pin'].'"id="address">'.$results[$i]['_source']['address'].' '.$results[$i]['_source']['neighborhood'].'</a></p>
//       <br>
//        <p class="snippet" id="model_details"><b><a href="login6.php?id='.$results[$i]['_id'].'"Neighborhood: </b> Save Record</a></p> <br>
       
//      </div> 
     
//    </div>';
//   }
 
//   echo "</div>";
//  }
//     else if($_POST['option_sel']=="1")
//     {
//     $screen = $_POST['screen'];
//     $ram = $_POST['ram'];
//     $os = $_POST['os'];
//     $disp = $_POST['disp'];
//     $rom = $_POST['rom'];
//     $speaker = $_POST['speaker'];
//     $jack = $_POST['jack'];
//     $cores = $_POST['cores'];
//     $query = $screen." ".$ram." ".$os." ".$disp." ".$rom." ".$speakers." ".$jack." ".$cores;
//     $hosts = ['http://localhost:9200'];
//     $client = ClientBuilder::create()->setHosts($hosts)->build();
//     $params = [
//         'index' => 'mobile',
//         'body' => [
//         'from' => 0,
//         'size' => 10000,
//             'query' => [
//                 'multi_match' => [
//                 'query' => $query,
//                 'fields'=> ['display_resolution','RAM','OS','display_type','internal_memory','loud_speaker','audio_jack','CPU']
//                 ]
//             ]
//         ]
//     ]; 
//     $response = $client->search($params);
//     $results_count = sizeof($response['hits']['hits'],0);
//     if($results_count===0)
//     {
//         echo "<script>swal('Search Results', 'No results found. Try with new or modify the query', 'error').then(function(){
//         window.location.href='index.php';
//     });</script>";
//     }
//     $time_took = ((int)($response['took'])/1000);
//     $results = $response['hits']['hits'];
//     echo "<script>\$(document).ready(function(){
//         $('#stat').html('About ".$results_count." results (".$time_took." seconds)');
//     })</script>";
//     echo "<div class='cards' style='margin-bottom:6%;'>";
//     for ($i=0; $i<$results_count; $i++)
//     {
//         echo '
//         <div id="'.$results[$i]['_id'].'" class="p-3">
//         <img src="'.$results[$i]['_source']['img_url'].'" alt="Smiley face" width="100" height="100">
//         <div style="display:inline-block;" id="content">
//        <h4><a href="#" id="address">'.$results[$i]['_source']['address'].' '.$results[$i]['_source']['model'].'</a></h4>
//       <br>
//        <p class="snippet" id="model_details"><b>Announced</b> in: '.$results[$i]['_source']['announced'].'. <b>Current Status: </b> '.$results[$i]['_source']['status'].'</p>
//      </div>  
//    </div>';
//   }
//   echo "</div>";
// ​
//  }
?>
<div id="listId">
  <ul class="list">
   
    <?php 
    for ($i=0; $i<$results_count; $i++)
  {  echo"<li>";
    //  echo $results[$i]['_id'];
     echo'<a href="search_results.php?id='.$results[$i]['_source']['pin'].'"id="address">'.$results[$i]['_source']['address'].' '.$results[$i]['_source']['neighborhood'].'</a> <br> <a href="search_results_4.php?id='.$results[$i]['_id'].'"Neighborhood: </b> Save Record</a>' ;
     echo"</li>";
  }
?>

    
  </ul>
  <ul class="pagination"></ul>
</div>

</body>
</html>




