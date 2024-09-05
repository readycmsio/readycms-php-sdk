<?php

namespace ReadyCMS\Endpoints;

use ReadyCMS\Client\Client;

class CustomContentEndpoint
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
  
    // Fetch a single custom content by ID or slug
    public function getCustomContent(array $options = [])
    {
        return $this->client->get('/custom/' . $options['id'] ?? $options['slug'], $options);
    }

    // Fetch metadata for custom content
    public function getCustomContentMetadata(array $options = [])
    {
        return $this->client->get('/custom/metadata', $options);
    }

    // Query custom content
    public function queryCustomContent(array $options = [])
    {
        return $this->client->get('/custom/query', $options);
    }

    // Fetch custom content reviews
    public function getCustomContentReviews(array $options = [])
    {
        return $this->client->get('/custom/reviews', $options);
    }

    // Fetch custom content comments
    public function getCustomContentComments(array $options = [])
    {
        return $this->client->get('/custom/comments', $options);
    }

    // Fetch count of custom content
    public function getCustomContentCount(array $options = [])
    {
        return $this->client->get('/custom/count', $options);
    }

    // Fetch custom content statistics
    public function getCustomContentStats(array $options = [])
    {
        return $this->client->get('/custom/stats', $options);
    }

    // Fetch types of custom content
    public function getCustomContentTypes(array $options = [])
    {
        return $this->client->get('/custom/types', $options);
    }

    // Fetch count of custom content types
    public function getCustomContentTypesCount(array $options = [])
    {
        return $this->client->get('/custom/types/count', $options);
    }

    // Fetch custom content tags
    public function getCustomContentTags(array $options = [])
    {
        return $this->client->get('/custom/tags', $options);
    }

    // Fetch a single custom content tag by slug
    public function getCustomContentTag(array $options = [])
    {
        return $this->client->get('/custom/tags/' . $options['tagSlug'], $options);
    }

    // Fetch count of custom content tags
    public function getCustomContentTagsCount(array $options = [])
    {
        return $this->client->get('/custom/tags/count', $options);
    }

    // Fetch custom content categories
    public function getCustomContentCategories(array $options = [])
    {
        return $this->client->get('/custom/categories', $options);
    }

    // Fetch a single custom content category by slug
    public function getCustomContentCategory(array $options = [])
    {
        return $this->client->get('/custom/categories/' . $options['categorySlug'], $options);
    }

    // Fetch count of custom content categories
    public function getCustomContentCategoriesCount(array $options = [])
    {
        return $this->client->get('/custom/categories/count', $options);
    }

    // Handle uploads for custom content
    public function handleCustomContentUploads(array $options = [])
    {
        return $this->client->post('/custom/uploads', $options);
    }
}
