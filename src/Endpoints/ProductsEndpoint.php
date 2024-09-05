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

    // Fetch  products
    public function getProducts(array $options = [])
    {
        return $this->client->get('/products', $options);
    }

    // Fetch product price history
    public function getPriceHistory(array $options = [])
    {
        return $this->client->get('/products/price-history', $options);
    }

    // Fetch product variants
    public function getProductVariants(array $options = [])
    {
        return $this->client->get('/products/variants', $options);
    }

    // Fetch product reviews
    public function getProductReviews(array $options = [])
    {
        return $this->client->get('/products/reviews', $options);
    }

    // Fetch product comments
    public function getProductComments(array $options = [])
    {
        return $this->client->get('/products/comments', $options);
    }

    // Fetch product tags
    public function getProductTags(array $options = [])
    {
        return $this->client->get('/products/tags', $options);
    }

    // Fetch single product tag by slug
    public function getSingleTagBySlug(string $tagSlug, array $options = [])
    {
        return $this->client->get('/products/tags/' . $tagSlug, $options);
    }

    // Fetch product tag count
    public function getProductTagsCount(array $options = [])
    {
        return $this->client->get('/products/tags/count', $options);
    }

    // Fetch product categories
    public function getProductCategories(array $options = [])
    {
        return $this->client->get('/products/categories', $options);
    }

    // Fetch single product category by slug
    public function getSingleCategoryBySlug(string $categorySlug, array $options = [])
    {
        return $this->client->get('/products/categories/' . $categorySlug, $options);
    }

    // Fetch product category count
    public function getProductCategoriesCount(array $options = [])
    {
        return $this->client->get('/products/categories/count', $options);
    }

    // Fetch total product count
    public function getProductsCount(array $options = [])
    {
        return $this->client->get('/products/count', $options);
    }

    // Update product stock
    public function updateProductStock(array $options = [])
    {
        return $this->client->post('/products/update-stock', $options);
    }

    // Update product status
    public function updateProductStatus(array $options = [])
    {
        return $this->client->post('/products/update-status', $options);
    }

    // Update product tags
    public function updateProductTags(array $options = [])
    {
        return $this->client->post('/products/update-tags', $options);
    }

    // Add product tags
    public function addProductTags(array $options = [])
    {
        return $this->client->post('/products/add-tags', $options);
    }

    // Remove product tags
    public function removeProductTags(array $options = [])
    {
        return $this->client->post('/products/remove-tags', $options);
    }

    // Update product categories
    public function updateProductCategories(array $options = [])
    {
        return $this->client->post('/products/update-categories', $options);
    }

    // Add product categories
    public function addProductCategories(array $options = [])
    {
        return $this->client->post('/products/add-categories', $options);
    }

    // Remove product categories
    public function removeProductCategories(array $options = [])
    {
        return $this->client->post('/products/remove-categories', $options);
    }

    // Update product prices
    public function updateProductPrices(array $options = [])
    {
        return $this->client->post('/products/update-prices', $options);
    }

    // Update product availability
    public function updateProductAvailability(array $options = [])
    {
        return $this->client->post('/products/update-availability', $options);
    }
 
    // Fetch product review count
    public function getProductReviewsCount(array $options = [])
    {
        return $this->client->get('/products/reviews/count', $options);
    }

    // Fetch product review reports
    public function getProductReviewsReports(array $options = [])
    {
        return $this->client->get('/products/reviews/reports', $options);
    }
 
    // Fetch product comment count
    public function getProductCommentsCount(array $options = [])
    {
        return $this->client->get('/products/comments/count', $options);
    }
 

    // Upload product tags
    public function uploadProductTags(array $options = [])
    {
        return $this->client->post('/products/tags/uploads', $options);
    }
 
    // Upload product categories
    public function uploadProductCategories(array $options = [])
    {
        return $this->client->post('/products/categories/uploads', $options);
    }
 
    // Upload products
    public function uploadProducts(array $options = [])
    {
        return $this->client->post('/products/uploads', $options);
    }

    // Fetch product attributes
    public function getProductAttributes(array $options = [])
    {
        return $this->client->get('/products/attributes', $options);
    }

    // Fetch product wishlist
    public function getProductWishlist(array $options = [])
    {
        return $this->client->get('/products/wishlist', $options);
    }

    // Fetch product wishlist stats
    public function getProductWishlistStats(array $options = [])
    {
        return $this->client->get('/products/wishlist/stats', $options);
    }

    // Fetch product filters
    public function getProductFilters(string $column, string $key, array $options = [])
    {
        return $this->client->get('/products/filters/' . $column . '/' . $key, $options);
    }
 
    // Fetch single product
    public function getSingleProduct(string $productId, array $options = [])
    {
        return $this->client->get('/products/' . $productId, $options);
    }

}
