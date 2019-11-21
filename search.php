<?php
require_once("./connect_db.php");    
// require_once("./navbar.php");
?>
<html>
    <head>
        <title>
            Search Results
        </title>
        <link rel="stylesheet" media="screen" href="./css/search.css">
        <link rel="stylesheet" media="screen" href="./css/main.css">
        
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
      
</head>
<body>

<br>
</div>
<!-- Main body of text -->
<br><br><br>

<div class="searchresults">

    <p id="stat"></p>
    <div style="width:900px;">
<form class="form-inline active-cyan-3 active-cyan-4" method="POST">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search for keywords" name="search"
    aria-label="Search">
</form>
</div>
    <?php
 use Elasticsearch\ClientBuilder;
 $query = strip_tags($_POST['search']);
//  require 'xvendor/autoload.php';
 $hosts = ['http://localhost:9200'];
 $client = ClientBuilder::create()->setHosts($hosts)->build();
 $params = [
     'index' => 'real_estate',
     'body' => [
         'query' => [
             'multi_match' => [
              'query' => $query,
              
             ]
         ]
     ]
 ]; 
 $response = $client->search($params);
 $results_count = sizeof($response['hits'],0);
 if($results_count===0)
 {
   echo "<script>print_stat('Search Results', 'No results found. Try with new or modify the query', 'error').then(function(){
    window.location.href='index.php';
  });</script>";
 }
 $time_took = ((int)($response['took'])/10);
 $results = $response['hits'];
 echo "<script>$(document).ready(function(){
   $('#stat').html('About ".$results_count." results (".$time_took." seconds)');
 })</script>";
echo "<div class='cards'>";
 for ($i=0; $i<$results_count; $i++)
 {
    echo '
      <div id="'.$results[$i]['_id'].'" class="p-3">
      <img src="'.$results[$i]['_source']['img_url'].'">
      <div style="display:inline-block;" id="content">
      <h4><a href="#" id="brand">'.$results[$i]['_source']['brand'].' '.$results[$i]['_source']['model'].'</a></h4>
     <br>
      <p class="snippet" id="model_details"><b>Announced</b> in: '.$results[$i]['_source']['announced'].'. <b>Current Status: </b> '.$results[$i]['_source']['status'].'</p>
    </div>  
  </div>';
 }
 echo "</div>";
?>
</div>

</footer>


</body>
</html>