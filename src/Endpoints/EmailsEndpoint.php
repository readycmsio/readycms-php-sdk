<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class EmailsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    // Fetch  emails
    public function getEmails(array $options = [])
    {
        return $this->client->get('/emails', $options);
    }

    // Fetch email count
    public function getEmailsCount(array $options = [])
    {
        return $this->client->get('/emails/count', $options);
    }

    // Fetch email metrics
    public function getEmailMetrics(array $options = [])
    {
        return $this->client->get('/emails/metrics', $options);
    }

    // Fetch email stats
    public function getEmailStats(array $options = [])
    {
        return $this->client->get('/emails/stats', $options);
    }
}
