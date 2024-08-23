<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class CommentsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getComments(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        if (empty($contentSlug) || empty($contentType)) return false;
        return $this->client->get($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/comments' : '/custom/comments', $options);
    }

    public function getCommentsMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $commentMetadata = $options['metadata'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($commentMetadata)) return false;
        return $this->client->get($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/comments/metadata' : '/custom/comments/metadata', $options);
    }

    public function updateCommentsMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $commentMetadata = $options['metadata'] ?? '';
        $commentId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($commentMetadata) || empty($commentId)) return false;
        return $this->client->put($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/comments/metadata' : '/custom/comments/metadata', $options);
    }

    public function deleteComment(array $options = [])
    {
        $options['soft_delete'] = 0;
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $commentId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($commentId)) return false;
        return $this->client->delete($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/comments' : '/custom/comments', $options);
    }

    // More methods based on the provided functions...
}
