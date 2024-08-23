<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class UsersEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getUsers(array $options = [])
    {
        return $this->client->get('/users', $options);
    }

    public function createUser(array $options = [])
    {
        return $this->client->post('/users', $options);
    }

    public function updateUser(array $options = [])
    {
        return $this->client->put('/users/update', $options);
    }

    public function deleteUser(array $options = [])
    {
        return $this->client->delete('/users', $options);
    }

    // More methods based on the provided functions...
}
