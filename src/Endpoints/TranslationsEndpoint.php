<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class TranslationsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getTranslation(array $options = [])
    {
        return $this->client->get('/translation', $options);
    }

    public function getTranslationCount(array $options = [])
    {
        return $this->client->get('/translation/count', $options);
    }

    public function deleteTranslation(array $options = [])
    {
        $options['soft_delete'] = 0;
        return $this->client->delete('/translation', $options);
    }

    public function removeTranslation(array $options = [])
    {
        $options['soft_delete'] = 1;
        return $this->client->delete('/translation', $options);
    }
}
