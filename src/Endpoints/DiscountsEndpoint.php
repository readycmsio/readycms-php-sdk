<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class DiscountsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch  discounts
    public function getDiscounts(array $options = [])
    {
        return $this->client->get('/discounts', $options);
    }

    // Fetch a single discount by ID
    public function getDiscountById(string $discountId, array $options = [])
    {
        return $this->client->get('/discounts/' . $discountId, $options);
    }

    // Fetch discount count
    public function getDiscountsCount(array $options = [])
    {
        return $this->client->get('/discounts/count', $options);
    }
}
