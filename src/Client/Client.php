<?php

namespace ReadyCMS\Client;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;
use ReadyCMS\Exceptions\HttpException;

class Client
{
    protected $httpClient;

    public function __construct(string $baseUrl, string $apiKey)
    {
        $this->httpClient = new HttpClient([
            'base_uri' => $baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function get(string $endpoint, array $queryParams = [])
    {
        try {
            $response = $this->httpClient->get($endpoint, ['query' => $queryParams]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleRequestException $e) {
            $this->handleException($e);
        }
    }

    public function post(string $endpoint, array $body = [])
    {
        try {
            $response = $this->httpClient->post($endpoint, ['json' => $body]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleRequestException $e) {
            $this->handleException($e);
        }
    }

    public function patch(string $endpoint, array $body = [])
    {
        try {
            $response = $this->httpClient->patch($endpoint, ['json' => $body]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleRequestException $e) {
            $this->handleException($e);
        }
    }

    public function delete(string $endpoint, array $body = [])
    {
        try {
            $response = $this->httpClient->delete($endpoint, ['json' => $body]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleRequestException $e) {
            $this->handleException($e);
        }
    }

    protected function handleException(GuzzleRequestException $e)
    {
        $response = $e->getResponse();
        $statusCode = $response ? $response->getStatusCode() : 0;
        $message = $response ? (string) $response->getBody() : $e->getMessage();
        
        // Throw HttpException with detailed information
        throw new HttpException($message, $statusCode, 'http_error', [
            'method' => $e->getRequest()->getMethod(),
            'uri' => $e->getRequest()->getUri()
        ]);
    }
}
