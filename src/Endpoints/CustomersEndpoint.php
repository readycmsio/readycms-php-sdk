<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class CustomersEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCustomers(array $options = [])
    {
        return $this->client->get('/customers', $options);
    }

    public function getCustomersCount(array $options = [])
    {
        return $this->client->get('/customers/count', $options);
    }

    public function removeCustomers(array $options = [])
    {
        $options['soft_delete'] = 1;
        return $this->client->delete('/customers', $options);
    }
}
