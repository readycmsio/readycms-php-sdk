<?php

require 'vendor/autoload.php';

use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\ProductsEndpoint;
use ReadyCMS\Exceptions\HttpException;

$apiKey = 'your-api-key-here';
$apiVersion = 'v3';

$client = new Client($apiKey, $apiVersion);
$productEndpoint = new ProductsEndpoint($client);

try {
    $response = $productEndpoint->getProducts();
    print_r($response);
} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
