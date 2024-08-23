<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class ProductsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getProducts(array $options = [])
    {
        $options['status'] = $options['status'] ?? 'Published';
        return $this->client->get('/products', $options);
    }

    public function searchProducts(array $options = [])
    {
        return $this->client->get('/products/search', $options);
    }

    public function getProductVariants(array $options = [])
    {
        return $this->client->get('/products/variants', $options);
    }

    public function getProductsMetadata(array $options = [])
    {
        if (isset($options['metadata'])) {
            return $this->client->get('/products/metadata', $options);
        }
        return false;
    }

    public function updateProductsMetadata(array $options = [])
    {
        if (isset($options['id'], $options['metadata']) && is_array($options['metadata']) && count($options['metadata']) > 0) {
            return $this->client->put('/products/metadata', $options);
        }
        return false;
    }

    // More methods based on the provided functions...
}
