<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class MediaEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getMediaAttributes(array $options = [])
    {
        return $this->client->get('/media', $options);
    }

    public function getMedia(array $options = [])
    {
        return $this->client->get('/media', $options);
    }
}
