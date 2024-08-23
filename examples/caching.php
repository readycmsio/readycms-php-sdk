<?php

require 'vendor/autoload.php';

use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\ProductsEndpoint;

$apiKey = 'your-api-key-here';
$apiVersion = 'v3';
$cacheTtl = 3600; // 1 hour
$cacheDir = __DIR__ . '/cache'; // Custom cache directory

$client = new Client($apiKey, $apiVersion, $cacheTtl, $cacheDir);
$productEndpoint = new ProductsEndpoint($client);

try {
    $products = $productEndpoint->getProducts();
    print_r($products);
} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
