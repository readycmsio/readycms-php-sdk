<?php

require 'vendor/autoload.php';

use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\UsersEndpoint;
use ReadyCMS\Exceptions\HttpException;

$apiKey = 'your-api-key';
$apiVersion = 'v3'; // Specify the version as needed

$client = new Client($apiKey, $apiVersion, 3600);

$userEndpoint = new UsersEndpoint($client);

try {

    $response = $userEndpoint->getUsers();
    print_r($response);

} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
