<?php

namespace Webshipper\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Config;
use Webshipper\Exceptions\WebshipperClientException;
use Webshipper\Exceptions\WebshipperRequestException;

class Request
{
    /** @var Client  */
    public $client;

    /** @var string  */
    protected $authorizationUrl;

    /**
     * Request constructor.
     * @param string $username
     * @param string $email
     * @param string $password
     * @param array $options
     * @param array $headers
     */
    public function __construct( $username = null, $email = null, $password = null, $options = [], $headers = [] )
    {
        $username = $username ?? Config::get('webshipper.username');
        $email = $email ?? Config::get('webshipper.email');
        $password = $password ?? Config::get('webshipper.password');
        $baseUrl = "https://$username.api.webshipper.io/v2/";
        $this->authorizationUrl = $baseUrl . "oauth/token?grant_type=password&username=$email&password=$password";
        $token = $this->authorize();

        $token        = $token ?? Config::get( 'webshipper.token' );
        $headers      = array_merge( $headers, [
            
            'User-Agent'    => Config::get('webshipper.user_agent'),
            'Authorization' => 'Bearer ' . $token,
        ] );
        $options      = array_merge( $options, [
            'base_uri' => $baseUrl,
            'headers'  => $headers,
        ] );
        $this->client = new Client( $options );
    }

    /**
     * @return string
     */
    protected function authorize(): string
    {
        $client = new Client();

        $response = $client->post($this->authorizationUrl);

        return json_decode($response->getBody())->access_token;
    }


    /**
     * @param $callback
     * @return mixed
     * @throws WebshipperClientException
     * @throws WebshipperRequestException
     */
    public function handleWithExceptions( $callback )
    {
        try {
            return $callback();

        } catch ( ClientException $exception ) {

            $message = $exception->getMessage();
            $code    = $exception->getCode();

            if ( $exception->hasResponse() ) {

                $message = (string) $exception->getResponse()->getBody();
                $code    = $exception->getResponse()->getStatusCode();
            }

            throw new WebshipperRequestException( $message, $code );

        } catch ( ServerException $exception ) {

            $message = $exception->getMessage();
            $code    = $exception->getCode();

            if ( $exception->hasResponse() ) {

                $message = (string) $exception->getResponse()->getBody();
                $code    = $exception->getResponse()->getStatusCode();
            }

            throw new WebshipperRequestException( $message, $code );

        } catch ( \Exception $exception ) {

            $message = $exception->getMessage();
            $code    = $exception->getCode();

            throw new WebshipperClientException( $message, $code );
        }
    }
}
