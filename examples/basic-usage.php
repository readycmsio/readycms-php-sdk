<?php

require 'vendor/autoload.php';

use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\UsersEndpoint;
use ReadyCMS\Exceptions\HttpException;

$apiKey = 'your-api-key-here';
$apiVersion = 'v3';

$client = new Client($apiKey, $apiVersion);

$userEndpoint = new UsersEndpoint($client);

try {
    $users = $userEndpoint->getUsers();
    print_r($users);
} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
