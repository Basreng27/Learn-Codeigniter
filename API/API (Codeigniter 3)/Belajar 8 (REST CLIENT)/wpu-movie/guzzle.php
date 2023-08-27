<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'http://www.omdbapi.com', [
    'query' => [
        'apikey' => '8ad78ccf',
        's' => 'transformers'
    ]
]);

var_dump($response->getBody()->getContents()); //getContents() bentukan json
