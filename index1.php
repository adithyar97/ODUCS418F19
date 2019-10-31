<?php

use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$client = ClientBuilder::create()->build();
$params = [
    'index' => 'real_estate',
    'body' => [
     'from' => 0,
     'size' => 10000,
        'query' => [
            'multi_match' => [
             'query' => 'Get Homes near 0 CRAWFORD ST',
             'fields'=> ['address','neighborhood']
            ]
        ]
    ]
];
// $params_1 = [

//     'query'=> 'match_phrase',
//     'address'=> '7101 IDLEWILD ST'
      
    
    
// ];
$response = $client->search($params);
// $response_1 = $client_1->get($params_1);
print_r(json_encode($response));
// print_r($resonse[1]);
// print_r($response_1);
// $params = array();
// $params['body']  = array(
//   'name' => 'Ash Ketchum',
//   'age' => 10,
//   'badges' => 8 
// );

// $params['index'] = 'pokemon';
// $params['type']  = 'pokemon_trainer';

// $result = $client->index($params);

// $response = $client->update($params);
// print_r($result);
?>