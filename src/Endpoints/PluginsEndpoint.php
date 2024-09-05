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

    // Fetch all plugins
    public function getPlugins(array $options = [])
    {
        return $this->client->get('/plugins', $options);
    }

    // Fetch plugin details by slug
    public function getPluginBySlug(string $slug, array $options = [])
    {
        return $this->client->get('/plugins/' . $slug, $options);
    }

    // Fetch plugins count
    public function getPluginsCount(array $options = [])
    {
        return $this->client->get('/plugins/count', $options);
    }
}
