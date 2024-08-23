<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class MenusEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getMenus(array $options = [])
    {
        return $this->client->get('/menus', $options);
    }

    public function getMenusMetadata(array $options = [])
    {
        return $this->client->get('/menus/metadata', $options);
    }

    public function updateMenusMetadata(array $options = [])
    {
        return $this->client->put('/menus/metadata', $options);
    }

    public function getMenusCount(array $options = [])
    {
        return $this->client->get('/menus/count', $options);
    }

    public function deleteMenus(array $options = [])
    {
        $options['soft_delete'] = 0;
        return $this->client->delete('/menus', $options);
    }

    public function removeMenus(array $options = [])
    {
        $options['soft_delete'] = 1;
        return $this->client->delete('/menus', $options);
    }
}
