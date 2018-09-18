<?php

namespace Webshipper\V2\Util;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;


class Request
{

    protected $apiToken;

    /**
     * @var string $accountName: Account name given from webshipper v2: This is the subdomain used in webshipper.io
     * This subdomain is the value that represents the accountName
     */
    protected $accountName;
    protected $apiUrl;
    protected $email;
    protected $password;
    protected $httpClient;
    protected $authorizationUrl;

    public function __construct($accountName = null, $email = null, $password = null)
    {
        $this->accountName = $accountName ?? config('webshipper.webshipper_v2_account_name');
        $this->email = $email ?? config('webshipper.webshipper_v2_email');
        $this->password = $password ?? config('webshipper.webshipper_v2_password');
        $this->apiUrl = "https://$this->accountName.api.webshipper.io/v2/";
        $this->authorizationUrl = $this->apiUrl . "oauth/token?grant_type=password&username=$this->email&password=$this->password";
        $this->httpClient = new Client();
    }

    private function authorize()
    {
        $response = $this->httpClient->post($this->authorizationUrl);
        $body = json_decode($response->getBody());
        $this->setApiToken($body->access_token);
    }

    public function get($url)
    {
        $this->authorize();
        return $this->httpClient->get($this->apiUrl . $url, $this->getRequestHeaders());
    }

    public function post($url, $data)
    {
        $this->authorize();
        return $this->httpClient->post($this->apiUrl . $url, array_merge([RequestOptions::JSON => $data], $this->postRequestHeaders()));
    }

    public function postWithoutData($url)
    {
        $this->authorize();
        return $this->httpClient->post($this->apiUrl . $url, $this->getRequestHeaders());
    }

    public function patch($url, $data)
    {
        $this->authorize();
        return $this->httpClient->patch($this->apiUrl . $url, array_merge([RequestOptions::JSON => $data], $this->postRequestHeaders()));
    }

    public function patchWithoutData($url)
    {
        $this->authorize();
        return $this->httpClient->patch($this->apiUrl . $url, $this->getRequestHeaders());
    }

    public function delete($url)
    {
        $this->authorize();
        return $this->httpClient->delete($this->apiUrl . $url, $this->getRequestHeaders());
    }

    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }

    private function getRequestHeaders()
    {
        return ['headers' => ['Authorization' => 'Bearer ' . $this->getApiToken(), 'Content-Type' => 'application/json']];
    }

    private function postRequestHeaders()
    {
        return ['headers' => ['Authorization' => 'Bearer ' . $this->getApiToken(), 'Content-Type' => 'application/vnd.api+json']];
    }

}