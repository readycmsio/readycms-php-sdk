<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class SubscriptionEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch all subscriptions
    public function getAllSubscriptions(array $options = [])
    {
        return $this->client->get('/subscription/all', $options);
    }

    // Fetch subscription stats
    public function getSubscriptionStats(array $options = [])
    {
        return $this->client->get('/subscription/stats', $options);
    }

    // Fetch subscription card details
    public function getSubscriptionCard(array $options = [])
    {
        return $this->client->get('/subscription/card', $options);
    }

    // Fetch a specific subscription
    public function getSubscription(array $options = [])
    {
        return $this->client->get('/subscription', $options);
    }
}
