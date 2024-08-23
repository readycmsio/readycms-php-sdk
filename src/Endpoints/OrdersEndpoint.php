<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class OrdersEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getOrders(array $options = [])
    {
        return $this->client->get('/orders', $options);
    }

    public function getOrdersUser(array $options = [])
    {
        return $this->client->get('/orders/user', $options);
    }

    public function getOrdersUserCount(array $options = [])
    {
        return $this->client->get('/orders/user/count', $options);
    }

    public function getOrdersCount(array $options = [])
    {
        return $this->client->get('/orders/count', $options);
    }

    public function getOrdersReportsMonthly(array $options = [])
    {
        return $this->client->get('/orders/reports/monthly-chart', $options);
    }

    public function getOrdersReportsWeekly(array $options = [])
    {
        return $this->client->get('/orders/reports', $options);
    }

    public function getOrdersReports(array $options = [])
    {
        return $this->client->get('/orders/reports', $options);
    }

    public function createOrder(array $options = [])
    {
        return isset($options) ? $this->client->post('/orders', $options) : false;
    }

    public function sendOrderEmails(array $options = [])
    {
        return isset($options) ? $this->client->post('/orders/emails', $options) : false;
    }

    public function addTransactionHistory(array $options = [])
    {
        return isset($options) ? $this->client->post('/transaction-history', $options) : false;
    }

    public function postOrderQuery(array $options = [])
    {
        return isset($options) ? $this->client->put('/orders/query', $options) : false;
    }

    public function addEmailToQueue(array $options = [])
    {
        return isset($options) ? $this->client->post('/orders/emails', $options) : false;
    }
}
