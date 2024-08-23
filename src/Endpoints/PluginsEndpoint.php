<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class PluginsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPlugins(array $options = [])
    {
        return $this->client->get('/plugins', $options);
    }
}
