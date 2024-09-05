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

    // Fetch yearly chart report
    public function getYearlyChartReport(array $options = [])
    {
        return $this->client->get('/orders/reports/yearly-chart', $options);
    }

    // Fetch weekly chart report
    public function getWeeklyChartReport(array $options = [])
    {
        return $this->client->get('/orders/reports/weekly-chart', $options);
    }

    // Fetch monthly chart report
    public function getMonthlyChartReport(array $options = [])
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
    public function getOrderInsights(array $options = [])
    {
        return $this->client->get('/orders/insights', $options);
    }

    public function getOrderHistory(array $options = [])
    {
        return $this->client->get('/orders/history', $options);
    }

    public function getOrderHistoryStats(array $options = [])
    {
        return $this->client->get('/orders/history/stats', $options);
    }

    public function updateOrderStatus(array $options = [])
    {
        return $this->client->post('/orders/update-status', $options);
    }

    public function getOrderTransactions(array $options = [])
    {
        return $this->client->get('/orders/transactions', $options);
    }

    public function getOrderActivities(array $options = [])
    {
        return $this->client->get('/orders/activities', $options);
    }

    public function getOrderEmails(array $options = [])
    {
        return $this->client->get('/orders/emails', $options);
    }

    public function getOrderReports(array $options = [])
    {
        return $this->client->get('/orders/reports', $options);
    }

    public function getUserOrders(array $options = [])
    {
        return $this->client->get('/orders/user', $options);
    }

    public function getUserOrdersCount(array $options = [])
    {
        return $this->client->get('/orders/user/count', $options);
    }

    public function queryOrders(array $options = [])
    {
        return $this->client->get('/orders/query', $options);
    }

    public function getAssignedUsers(array $options = [])
    {
        return $this->client->get('/orders/assigned-users', $options);
    }

    public function getOrderPdf(array $options = [])
    {
        return $this->client->get('/orders/pdf', $options);
    }

    public function getOrderItems(array $options = [])
    {
        return $this->client->get('/orders/items', $options);
    }
}
