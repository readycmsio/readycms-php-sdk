<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class InventoryEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch all inventory items
    public function getInventoryItems(array $options = [])
    {
        return $this->client->get('/inventory', $options);
    }

    // Fetch inventory item count
    public function getInventoryCount(array $options = [])
    {
        return $this->client->get('/inventory/count', $options);
    }

    // Fetch inventory location
    public function getInventoryLocation(array $options = [])
    {
        return $this->client->get('/inventory/location', $options);
    }

    // Fetch inventory location count
    public function getInventoryLocationCount(array $options = [])
    {
        return $this->client->get('/inventory/location/count', $options);
    }
}
