<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class TransactionHistoryEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch all transaction history
    public function getTransactionHistory(array $options = [])
    {
        return $this->client->get('/transaction-history', $options);
    }

    // Fetch transaction history count
    public function getTransactionHistoryCount(array $options = [])
    {
        return $this->client->get('/transaction-history/count', $options);
    }

    // Placeholder for future PUT requests (ToDo)
    public function updateTransactionHistory(array $options = [])
    {
        return $this->client->put('/transaction-history', $options);
    }
}
