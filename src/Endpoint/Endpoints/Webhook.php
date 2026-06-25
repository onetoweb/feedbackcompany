<?php

namespace Onetoweb\Feedbackcompany\Endpoint\Endpoints;

use Onetoweb\Feedbackcompany\Endpoint\AbstractEndpoint;

/**
 * Webhook Endpoint.
 */
class Webhook extends AbstractEndpoint
{
    /**
     * @param string $id
     * @param array $data
     * 
     * @return array
     */
    public function scheduleInvitations(string $id, array $data): array
    {
        return $this->client->post("/api/webhook/schedule-invitations/$id", $data);
    }
}
