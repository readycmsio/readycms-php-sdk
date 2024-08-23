<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class ActivitiesEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getActivities(array $options = [])
    {
        return $this->client->get('/activities', $options);
    }

    public function getActivitiesCount(array $options = [])
    {
        return $this->client->get('/activities/count', $options);
    }
}
