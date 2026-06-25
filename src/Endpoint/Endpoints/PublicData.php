<?php

namespace Onetoweb\Feedbackcompany\Endpoint\Endpoints;

use Onetoweb\Feedbackcompany\Endpoint\AbstractEndpoint;

/**
 * Public Data Endpoint.
 */
class PublicData extends AbstractEndpoint
{
    /**
     * @param array $query
     * 
     * @return array
     */
    public function allShops(array $query): array
    {
        return $this->client->get('/api/all-shops-and-its-results', $query);
    }
}
