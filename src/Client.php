<?php

namespace Onetoweb\Feedbackcompany;

use Onetoweb\Feedbackcompany\Endpoint\Endpoints;
use Onetoweb\Feedbackcompany\Config\Method;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;
use Onetoweb\Feedbackcompany\Token;
use DateTime;

/**
 * Feedbackcompany Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Base href
     */
    public const BASE_HREF_LIVE = 'https://api.feedbackcompany.com';
    public const BASE_HREF_TEST = 'https://mijn.fc-staging.nl';
    
    /**
     * @param string $token
     * @param bool $testModus = false
     */
    public function __construct(
        
        #[\SensitiveParameter]
        private string $token,
        private bool $testModus = false
    ) {
        // load endpoints
        $this->loadEndpoints();
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this);
        }
    }
    
    /**
     * @return string
     */
    public function getBaseHref(): string
    {
        return $this->testModus ? self::BASE_HREF_TEST : self::BASE_HREF_LIVE ;
    }
    
    /**
     * @param string $endpoint
     * 
     * @return string
     */
    public function getUrl(string $endpoint): string
    {
        return $this->getBaseHref() . '/' . ltrim($endpoint, '/');
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return array
     */
    public function get(string $endpoint, array $query = [], array $data = []): array
    {
        return $this->request(Method::GET, $endpoint, $data, $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return array
     */
    public function post(string $endpoint, array $data = []): array
    {
        return $this->request(Method::POST, $endpoint, $data);
    }
    
    /**
     * @param Method $method
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array
     */
    public function request(Method $method, string $endpoint, array $data = [], array $query = []): array
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => true,
            RequestOptions::HEADERS => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$this->token}",
            ],
            RequestOptions::QUERY => $query,
        ];
        
        if (count($data) > 0) {
            $options[RequestOptions::JSON] = $data;
        }
        
        // make request
        $response = (new GuzzleCLient())->request($method->value, $this->getUrl($endpoint), $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        $result = null;
        if ($response->hasHeader('Content-Type')) {
            
            switch ($response->getHeaderLine('Content-Type')) {
                
                case 'application/json':
                    $result = json_decode($contents, true);
                    break;
                case 'image/png':
                case 'image/jpg':
                    $result = [
                        'data' => base64_encode($contents)
                    ];
                    break;
                
            }
        }
        
        return $result;
    }
}
