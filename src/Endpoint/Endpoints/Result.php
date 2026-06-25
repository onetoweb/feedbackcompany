<?php

namespace Onetoweb\Feedbackcompany\Endpoint\Endpoints;

use Onetoweb\Feedbackcompany\Endpoint\AbstractEndpoint;

/**
 * Result Endpoint.
 */
class Result extends AbstractEndpoint
{
    /**
     * @return array
     */
    public function reviewPage(): array
    {
        return $this->client->get('/api/customers/review-page');
    }
    
    /**
     * @param int $customerId
     * @param array $data
     * 
     * @return array
     */
    public function responses(int $customerId, array $data): array
    {
        return $this->client->get("/api/customers/$customerId/statistics-responses", [], $data);
    }
    
    /**
     * @param int $customerId
     * @param array $data
     * 
     * @return array
     */
    public function statistics(int $customerId, array $data): array
    {
        return $this->client->get("/api/customers/$customerId/statistics-results", [], $data);
    }
    
    /**
     * @param int $customerId
     * @param array $data
     * 
     * @return array
     */
    public function reviews(int $customerId, array $data): array
    {
        return $this->client->get("/api/customers/$customerId/reviews", [], $data);
    }
    
    /**
     * @param int $customerId
     * @param int $reviewId
     * 
     * @return array
     */
    public function singleReview(int $customerId, int $reviewId): array
    {
        return $this->client->get("/api/customers/$customerId/reviews/$reviewId");
    }
    
    /**
     * @param int $questionnaireId
     * 
     * @return array
     */
    public function reactions(int $questionnaireId, array $query = []): array
    {
        return $this->client->get("/api/questionnaires/$questionnaireId/reactions", $query);
    }
}
