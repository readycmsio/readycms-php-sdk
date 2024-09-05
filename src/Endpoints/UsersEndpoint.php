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


    public function registerUser(array $options = [])
    {
        return $this->client->post('/users/register', $options);
    }

    public function forgotPassword(array $options = [])
    {
        return $this->client->post('/users/forgot-password', $options);
    }

    public function resetPassword(array $options = [])
    {
        return $this->client->post('/users/reset-password', $options);
    }

    public function getTwoFactor(array $options = [])
    {
        return $this->client->get('/users/two-factor', $options);
    }

    public function getLogin(array $options = [])
    {
        return $this->client->get('/users/login', $options);
    }

    public function getUsersCount(array $options = [])
    {
        return $this->client->get('/users/count', $options);
    }

    public function getUserById(string $id)
    {
        return $this->client->get("/users/{$id}");
    }


    // Fetch users groups
    public function getUserGroups(array $options = [])
    {
        return $this->client->get('/users/groups', $options);
    }

    // Fetch a single user group by ID
    public function getUserGroupById(string $groupId, array $options = [])
    {
        return $this->client->get('/users/groups/' . $groupId, $options);
    }

    // Fetch user group count
    public function getUserGroupsCount(array $options = [])
    {
        return $this->client->get('/users/groups/count', $options);
    }
}
