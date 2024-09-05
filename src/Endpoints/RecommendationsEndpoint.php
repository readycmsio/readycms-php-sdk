<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class RecommendationsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch  recommendations
    public function getRecommendations(array $options = [])
    {
        return $this->client->get('/recommendations', $options);
    }

    // Hide a specific recommendation
    public function hideRecommendation(array $options = [])
    {
        return $this->client->post('/recommendations/hide', $options);
    }
}
