<?php
namespace Webshipper\Util;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class Request
{
    protected $httpClient;
    protected $apiUrl = "https://portal.webshipr.com/webservice/v1/";
    protected $apiToken;

    public function __construct($apiToken = null)
    {
        $this->apiToken = $apiToken ?? config( 'webshipper.webshipper_api_token' );
        $this->httpClient = new Client();
    }

    public function get($url)
    {
        $response = $this->httpClient->get($this->apiUrl . $url, $this->getRequestHeaders());
        $body = json_decode($response->getBody());
        return $body;
    }

    public function post($url, $data)
    {
        return $this->httpClient->post($this->apiUrl . $url, array_merge([RequestOptions::JSON => $data], $this->getRequestHeaders()));
    }

    public function patch($url, $data)
    {
        return $this->httpClient->patch($this->apiUrl . $url, array_merge([RequestOptions::JSON => $data], $this->getRequestHeaders()));
    }

    public function patchWithoutData($url)
    {
        return $this->httpClient->patch($this->apiUrl . $url, $this->getRequestHeaders());
    }

    public function delete($url)
    {
        return $this->httpClient->delete($this->apiUrl . $url, $this->getRequestHeaders());
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }

    private function getRequestHeaders()
    {
        return ['headers' => ['X-WS-Token' => $this->getApiToken(), 'Content-Type' => 'application/json']];
    }
}