<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class ManufacturersEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getManufacturers(array $options = [])
    {
        return $this->client->get('/manufacturers', $options);
    }

    public function getManufacturersByProductCategory(array $options = [])
    {
        return isset($options['category']) ? $this->client->get('/manufacturers/products/categories', $options) : false;
    }

    public function getManufacturersMetadata(array $options = [])
    {
        return isset($options['metadata']) ? $this->client->get('/manufacturers/metadata', $options) : false;
    }

    public function updateManufacturersMetadata(array $options = [])
    {
        if (isset($options['id'], $options['metadata']) && is_array($options['metadata']) && count($options['metadata']) > 0) {
            return $this->client->put('/manufacturers/metadata', $options);
        }
        return false;
    }

    public function getManufacturersCount(array $options = [])
    {
        return $this->client->get('/manufacturers/count', $options);
    }

    public function getManufacturersRevisions(array $options = [])
    {
        return $this->client->get('/manufacturers/revisions', $options);
    }
}
