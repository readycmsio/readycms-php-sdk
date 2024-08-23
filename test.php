<?php
// test.php

require 'vendor/autoload.php';

use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\UserEndpoint;
use ReadyCMS\Exceptions\HttpException;

$client = new Client('https://api-v3.readycms.io', 'your-api-key');
$userEndpoint = new UserEndpoint($client);

try {
    $response = $userEndpoint->listUsers();
    print_r($response);
} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
