<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class ItemsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch  items
    public function getItems(array $options = [])
    {
        return $this->client->get('/items', $options);
    }

    // Fetch item count
    public function getItemsCount(array $options = [])
    {
        return $this->client->get('/items/count', $options);
    }

    // Fetch items by group
    public function getItemsByGroup(array $options = [])
    {
        return $this->client->get('/items/group', $options);
    }
}
