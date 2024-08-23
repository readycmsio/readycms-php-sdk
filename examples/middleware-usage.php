<?php

require 'vendor/autoload.php';

use ReadyCMS\Client\Client;
use ReadyCMS\Endpoints\UsersEndpoint;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

// Example logger (you would replace this with your logger)
$logger = new class implements LoggerInterface {
    public function log($level, $message, array $context = []) {
        echo strtoupper($level) . ': ' . $message . PHP_EOL;
    }
    public function emergency($message, array $context = []) {}
    public function alert($message, array $context = []) {}
    public function critical($message, array $context = []) {}
    public function error($message, array $context = []) {}
    public function warning($message, array $context = []) {}
    public function notice($message, array $context = []) {}
    public function info($message, array $context = []) {}
    public function debug($message, array $context = []) {}
};

$loggingMiddleware = Middleware::tap(
    function (RequestInterface $request) use ($logger) {
        $logger->info('Sending request: ' . $request->getMethod() . ' ' . $request->getUri());
    },
    function (ResponseInterface $response) use ($logger) {
        $logger->info('Received response: ' . $response->getStatusCode());
    }
);

$client = new Client('your-api-key-here', 'v3', 3600, null, [$loggingMiddleware]);

$userEndpoint = new UsersEndpoint($client);

try {
    $response = $userEndpoint->getUsers();
    print_r($response);
} catch (HttpException $e) {
    echo createErrorResponse($e->getMessage(), $e->getStatusCode(), $e->getErrorCode(), $e->getDetails());
} catch (Exception $e) {
    echo "General Error: " . $e->getMessage();
}
