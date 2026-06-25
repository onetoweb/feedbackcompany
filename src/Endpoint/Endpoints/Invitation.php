<?php

namespace Onetoweb\Feedbackcompany\Endpoint\Endpoints;

use Onetoweb\Feedbackcompany\Endpoint\AbstractEndpoint;

/**
 * Invitation Endpoint.
 */
class Invitation extends AbstractEndpoint
{
    /**
     * @param array $data
     * 
     * @return array
     */
    public function schedule(array $data): array
    {
        return $this->client->post('/api/invitations/schedule', $data);
    }
    
    /**
     * @param array $data
     * 
     * @return array
     */
    public function scheduleWithReminders(array $data): array
    {
        return $this->client->post('/api/invitations/schedule-invitations-and-optional-reminders', $data);
    }
    
    /**
     * @param array $data
     * 
     * @return array
     */
    public function questionnaireUrl(array $data): array
    {
        return $this->client->post('/api/customers/invitations/questionnaire-url-per-respondent', $data);
    }
}
