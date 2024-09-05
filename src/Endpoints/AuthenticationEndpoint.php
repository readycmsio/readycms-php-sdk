<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class AuthEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Handle user sign-up
     *
     * @param array $options
     * @return array
     */
    public function signUp(array $options = [])
    {
        return $this->client->post('/sign-up', $options);
    }

    /**
     * Handle user sign-in
     *
     * @param array $options
     * @return array
     */
    public function signIn(array $options = [])
    {
        return $this->client->post('/sign-in', $options);
    }
}
