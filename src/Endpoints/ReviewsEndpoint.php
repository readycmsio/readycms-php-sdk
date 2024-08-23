<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class ReviewsEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getReviews(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        if (empty($contentSlug) || empty($contentType)) return false;
        return $this->client->get($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/reviews' : '/custom/reviews', $options, '&custom_type=' . $contentSlug);
    }

    public function getReviewsMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $reviewMetadata = $options['metadata'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($reviewMetadata)) return false;
        return $this->client->get($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/reviews/metadata' : '/custom/reviews/metadata', $options, '&custom_type=' . $contentSlug);
    }

    public function updateReviewsMetadata(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $reviewMetadata = $options['metadata'] ?? '';
        $reviewId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($reviewMetadata) || empty($reviewId)) return false;
        return $this->client->put($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/reviews/metadata' : '/custom/reviews/metadata', $options, '&custom_type=' . $contentSlug);
    }

    public function getReviewsCount(array $options = [])
    {
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        if (empty($contentSlug) || empty($contentType)) return false;
        return $this->client->get($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/reviews/count' : '/custom/reviews/count', $options, '&custom_type=' . $contentSlug);
    }

    public function createReview(array $options = [])
    {
        return isset($options['content_slug']) ? $this->client->post('/reviews', $options) : false;
    }

    public function deleteReview(array $options = [])
    {
        $options['soft_delete'] = 0;
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $reviewId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($reviewId)) return false;
        return $this->client->delete($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/reviews' : '/custom/reviews', $options);
    }

    public function removeReview(array $options = [])
    {
        $options['soft_delete'] = 1;
        $contentSlug = $options['content_slug'] ?? '';
        $contentType = $options['content_type'] ?? '';
        $reviewId = $options['id'] ?? '';
        if (empty($contentSlug) || empty($contentType) || empty($reviewId)) return false;
        return $this->client->delete($contentType == 'ecommerce' && $contentSlug == 'products' ? '/products/reviews' : '/custom/reviews', $options);
    }
}
