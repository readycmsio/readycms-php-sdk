<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class SettingsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAllSettings(array $options = [])
    {
        return $this->client->get('/settings/all', $options);
    }

    public function getSettings(array $options = [])
    {
        return $this->client->get('/settings', $options);
    }
}
