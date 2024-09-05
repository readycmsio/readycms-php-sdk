<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class InsightsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch  insights
    public function getInsights(array $options = [])
    {
        return $this->client->get('/insights', $options);
    }

    // Fetch UTM insights
    public function getUtmInsights(array $options = [])
    {
        return $this->client->get('/insights/utm', $options);
    }

    // Fetch events insights
    public function getEventsInsights(array $options = [])
    {
        return $this->client->get('/insights/events', $options);
    }

    // Fetch source insights
    public function getSourceInsights(array $options = [])
    {
        return $this->client->get('/insights/source', $options);
    }

    // Fetch location insights
    public function getLocationInsights(array $options = [])
    {
        return $this->client->get('/insights/locations', $options);
    }

    // Fetch order insights
    public function getOrderInsights(array $options = [])
    {
        return $this->client->get('/insights/orders', $options);
    }

    // Fetch timetable insights
    public function getTimetableInsights(array $options = [])
    {
        return $this->client->get('/insights/timetable', $options);
    }

    // Fetch product insights
    public function getProductInsights(array $options = [])
    {
        return $this->client->get('/insights/products', $options);
    }

    // Fetch user insights
    public function getUserInsights(array $options = [])
    {
        return $this->client->get('/insights/users', $options);
    }
}
