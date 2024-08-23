<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class CategoriesEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCategories(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        if (empty($contentSlug) || empty($contentType)) return false;

        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/categories' : '/custom/categories';
        return $this->client->get($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function getCategoriesMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $categoryMetadata = $options['metadata'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($categoryMetadata)) return false;

        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/categories/metadata' : '/custom/categories/metadata';
        return $this->client->get($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function updateCategoriesMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $categoryMetadata = $options['metadata'] ?? '';
        $categoryId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($categoryMetadata) || empty($categoryId)) return false;

        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/categories/metadata' : '/custom/categories/metadata';
        return $this->client->put($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function getCategoriesCount(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        if (empty($contentSlug) || empty($contentType)) return false;

        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/categories/count' : '/custom/categories/count';
        return $this->client->get($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function deleteCategory(array $options = [])
    {
        $options['soft_delete'] = 0;
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $categoryId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($categoryId)) return false;

        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/categories' : '/custom/categories';
        return $this->client->delete($endpoint, $options);
    }

    public function removeCategory(array $options = [])
    {
        $options['soft_delete'] = 1;
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $categoryId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($categoryId)) return false;

        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/categories' : '/custom/categories';
        return $this->client->delete($endpoint, $options);
    }
}
