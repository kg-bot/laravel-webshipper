<?php
namespace Webshipper\Util;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Request
{
    protected $httpClient;
    protected $apiUrl = ".api.webshipper.io/v2/";
    protected $apiToken;
    protected $accountName;
    protected $email;
    protected $password;

    public function __construct( $accountName = null, $email = null, $password = null)
    {
        $this->httpClient = new Client();
        $this->accountName = $accountName ?? config('webshipper.account_name');
        $this->email = $email ?? config( 'webshipper.account_email' );
        $this->password = $password ?? config( 'webshipper.account_password' );
    }

    public function authorize()
    {
        $authorizationUrl = "https://". $this->accountName . $this->apiUrl . "oauth/token?grant_type=password&username=" . $this->email . "&password=" . $this->password;
        try {
            $response = $this->httpClient->post($authorizationUrl);
            $responseBody = json_decode($response->getBody());
            $this->setApiToken($responseBody->access_token);
        } catch(ClientException $exception) {
            echo $exception->getMessage();
        }
    }

    public function get($url)
    {
        $this->authorize();
        $response = $this->httpClient->get("https://" . $this->accountName . $this->apiUrl . $url, $this->getAuthorizationHeader());
        $body = json_encode($response->getBody());
        return $body;
    }

    public function post($url)
    {
        $this->authorize();
        $this->httpClient->post($this->apiUrl . $url);
    }

    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    public function getApiToken()
    {
        return $this->apiToken;
    }

    private function getAuthorizationHeader()
    {
        return [
            'headers' => ['Authorization' => 'Bearer ' . $this->getApiToken()]
        ];
    }
}