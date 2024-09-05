<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class CouponsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch  coupons
    public function getCoupons(array $options = [])
    {
        return $this->client->get('/coupons', $options);
    }

    // Fetch a single coupon by ID
    public function getCouponById(string $couponId, array $options = [])
    {
        return $this->client->get('/coupons/' . $couponId, $options);
    }

    // Fetch coupon count
    public function getCouponsCount(array $options = [])
    {
        return $this->client->get('/coupons/count', $options);
    }
}
