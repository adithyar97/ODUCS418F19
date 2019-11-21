
  
<?php
    use Elasticsearch\ClientBuilder;
    require 'vendor/autoload.php';
    $hosts = ['http://localhost:9200'];
    $client = ClientBuilder::create()->setHosts($hosts)->build();
    $params = [
        'index' => 'real_estate',
        'body' => [
            "sort" => [
                "_id"=>[
                    "order" => "desc",
                    "mode" => "max"
                ]
            ]
            
        ]
    ]; 
    $address = $_POST['address'];
    $neighborhood = $_POST['neighborhood'];
    $ward = $_POST['ward'];
    $council_district = $_POST['council_district'];
    $public_works_division = $_POST['public_works_division'];
    $pli_division = $_POST['pli_divison'];
    $response = $client->search($params);
    $next_index = $response['hits']['total']['value'];
    echo $next_index;
    $params = [
        'index' => 'real_estate',
        'id' => $next_index,
        'body' => ['address' => $address,
                   'neighborhood' => $neighborhood,
                   'ward' => $ward,
                   'council_district' => $council_district,
                   'public_works_divison' => $public_works_division,
                   'pli_division' => $pli_division]
    ];
    $response = $client->index($params);
    // print_r($response);
?>
<!-- -->
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
<h3>Please fill the following to enter a new record</h3>

<div class="container">
  <form method = "post">
    <label for="username">Username</label>
    <input id="fname" name="fname" type="text" class="form-control" size="100" value="<?php echo $uname1 ?>" required>
 	<label for="username">Enter the Locality of the House</label>
    <input type="text" id="address" name="address" placeholder="Address">
    <label for="username">Enter the Neighborhood of the House</label>
    <input type="text" id="neighborhood" name="neighborhood" placeholder="Neighborhood">
    <label for="username">Enter the ward of the House</label>
    <input type="text" id="ward" name="ward" placeholder="Ward">
    <label for="username">Enter the Council District of the House</label>
    <input type="text" id="council_district" name="council_district" placeholder="Council District">
    <label for="username">Enter the Neighborhood of the House</label>
    <input type="text" id="public_works_division" name="public_works_division" placeholder="Public Works Division">
    <label for="username">Enter the PLI Division of the House</label>
    <input type="text" id="pli_division" name="pli_division" placeholder="PLI Division">

    <label for="subject">Other Requirements</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <button type="submit" class="cancelbtn" onclick="alert('Your record has been added'); window.location.href='index2.php';">Add a House</button>
  </form>
</div>

</body>
</html>

