<?php

namespace Onetoweb\Feedbackcompany\Endpoint\Endpoints;

use Onetoweb\Feedbackcompany\Endpoint\AbstractEndpoint;

/**
 * Product Review Endpoint.
 */
class ProductReview extends AbstractEndpoint
{
    /**
     * @param array $query
     * 
     * @return array
     */
    public function listWidgets(array $query): array
    {
        return $this->client->get('/api/widgets', $query);
    }
    
    /**
     * @param string $widgetId
     * 
     * @return array
     */
    public function widgetDetails(string $widgetId): array
    {
        return $this->client->get("/api/widgets/$widgetId/details");
    }
    
    /**
     * @param array $query
     * 
     * @return array
     */
    public function listProducts(array $query): array
    {
        return $this->client->get('/api/widgets', $query);
    }
    
    /**
     * @param int $productId
     * @param array $query
     * 
     * @return array
     */
    public function summary(int $productId, array $query): array
    {
        return $this->client->get("/api/products/$productId/reviews/summary", $query);
    }
    
    /**
     * @param array $query
     * 
     * @return array
     */
    public function list(array $query): array
    {
        return $this->client->get('/api/reviews', $query);
    }
    
    /**
     * @param int $reviewId
     * 
     * @return array
     */
    public function get(int $reviewId): array
    {
        return $this->client->get("/api/reviews/$reviewId");
    }
    
    /**
     * @param array $query
     * 
     * @return array
     */
    public function listImages(array $query): array
    {
        return $this->client->get('/api/images', $query);
    }
    
    /**
     * @param string $imageId
     * 
     * @return array
     */
    public function imageMetadata(string $imageId): array
    {
        return $this->client->get("/api/images/$imageId");
    }
    
    /**
     * @param string $imageId
     *
     * @return array
     */
    public function imageFile(string $imageId): array
    {
        return $this->client->get("/api/images/$imageId/file");
    }
}
