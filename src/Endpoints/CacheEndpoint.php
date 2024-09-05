<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class CacheEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Clear cache
    public function clearCache(array $options = [])
    {
        return $this->client->get('/clear-cache', $options);
    }
}
