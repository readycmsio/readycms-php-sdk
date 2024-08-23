<?php

namespace ReadyCMS\Client;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;
use ReadyCMS\Exceptions\HttpException;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class Client
{
    protected $httpClient;
    protected $cache;
    protected $cacheTtl;
    protected $middlewareStack;

    public function __construct(string $apiKey, string $version = 'v1', $cacheTtl = 3600, $cacheDir = null, array $middleware = [])
    {
        $baseUri = $this->buildBaseUri($version);

        // Create a HandlerStack and push middleware to it
        $this->middlewareStack = HandlerStack::create();

        foreach ($middleware as $mw) {
            $this->middlewareStack->push($mw);
        }

        $this->httpClient = new HttpClient([
            'base_uri' => $baseUri,
            'handler' => $this->middlewareStack,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        $this->cache = new FilesystemAdapter('', 0, $cacheDir);
        $this->cacheTtl = $cacheTtl;
    }

    protected function buildBaseUri(string $version): string
    {
        if ($version === 'v1') {
            return 'https://api.readycms.io/';
        }

        return "https://api-{$version}.readycms.io/";
    }

    public function get(string $endpoint, array $queryParams = [])
    {
        $cacheKey = $this->getCacheKey('GET', $endpoint, $queryParams);

        return $this->cache->get($cacheKey, function (ItemInterface $item) use ($endpoint, $queryParams) {
            $item->expiresAfter($this->cacheTtl);
            try {
                $response = $this->httpClient->get($endpoint, ['query' => $queryParams]);
                return json_decode($response->getBody(), true);
            } catch (GuzzleRequestException $e) {
                return $this->handleException($e);
            }
        });
    }

    public function post(string $endpoint, array $body = [])
    {
        $this->clearCache('GET', $endpoint);

        try {
            $response = $this->httpClient->post($endpoint, ['json' => $body]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleRequestException $e) {
            return $this->handleException($e);
        }
    }

    public function patch(string $endpoint, array $body = [])
    {
        $this->clearCache('GET', $endpoint);

        try {
            $response = $this->httpClient->patch($endpoint, ['json' => $body]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleRequestException $e) {
            return $this->handleException($e);
        }
    }

    public function delete(string $endpoint, array $body = [])
    {
        $this->clearCache('GET', $endpoint);

        try {
            $response = $this->httpClient->delete($endpoint, ['json' => $body]);
            return json_decode($response->getBody(), true);
        } catch (GuzzleRequestException $e) {
            return $this->handleException($e);
        }
    }

    protected function handleException(GuzzleRequestException $e)
    {
        $response = $e->getResponse();
        $statusCode = $response ? $response->getStatusCode() : 0;
        $message = $response ? (string) $response->getBody() : $e->getMessage();

        if ($statusCode === 429) { // Handle rate limiting
            $retryAfter = $response->getHeaderLine('Retry-After') ?: 5;
            sleep((int)$retryAfter);
            throw new HttpException("Rate limit exceeded. Retrying after {$retryAfter} seconds.", $statusCode, 'rate_limit_exceeded', [
                'method' => $e->getRequest()->getMethod(),
                'uri' => $e->getRequest()->getUri(),
            ]);
        }

        throw new HttpException($message, $statusCode, 'http_error', [
            'method' => $e->getRequest()->getMethod(),
            'uri' => $e->getRequest()->getUri()
        ]);
    }

    protected function getCacheKey($method, $endpoint, $options = [])
    {
        return md5($method . $endpoint . json_encode($options));
    }

    public function clearCache($method, $endpoint)
    {
        $cacheKey = $this->getCacheKey($method, $endpoint);
        $this->cache->deleteItem($cacheKey);
    }
}
