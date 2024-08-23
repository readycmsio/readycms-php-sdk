<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class TagsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getTags(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        if (empty($contentSlug) || empty($contentType)) return false;
        
        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/tags' : '/custom/tags';
        return $this->client->get($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function getTagsMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $tagMetadata = $options['metadata'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($tagMetadata)) return false;
        
        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/tags/metadata' : '/custom/tags/metadata';
        return $this->client->get($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function updateTagsMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $tagMetadata = $options['metadata'] ?? '';
        $tagId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($tagMetadata) || empty($tagId)) return false;
        
        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/tags/metadata' : '/custom/tags/metadata';
        return $this->client->put($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function getTagsCount(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        if (empty($contentSlug) || empty($contentType)) return false;
        
        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/tags/count' : '/custom/tags/count';
        return $this->client->get($endpoint, $options, '&custom_type=' . $contentSlug);
    }

    public function deleteTags(array $options = [])
    {
        $options['soft_delete'] = 0;
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $tagId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($tagId)) return false;
        
        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/tags' : '/custom/tags';
        return $this->client->delete($endpoint, $options);
    }

    public function removeTags(array $options = [])
    {
        $options['soft_delete'] = 1;
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $tagId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($tagId)) return false;
        
        $endpoint = $contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/tags' : '/custom/tags';
        return $this->client->delete($endpoint, $options);
    }
}
