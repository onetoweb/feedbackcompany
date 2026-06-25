<?php

namespace Onetoweb\Feedbackcompany;

use Onetoweb\Feedbackcompany\Endpoint\Endpoints;
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
     * Methods.
     */
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    
    /**
     * 
     * @var Token
     */
    private $token;
    
    /**
     * @param string $token
     * @param bool $testModus = false
     */
    public function __construct(string $token, bool $testModus = false)
    {
        $this->token = $token;
        $this->testModus = $testModus;
        
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
        return $this->request(self::METHOD_GET, $endpoint, $data, $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return array
     */
    public function post(string $endpoint, array $data = []): array
    {
        return $this->request(self::METHOD_POST, $endpoint, $data);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array
     */
    public function request(string $method, string $endpoint, array $data = [], array $query = []): array
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
        $response = (new GuzzleCLient())->request($method, $this->getUrl($endpoint), $options);
        
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
