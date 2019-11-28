<?php

namespace Webshipper;

use Webshipper\Builders\OrderBuilder;
use Webshipper\Builders\ShipmentBuilder;
use Webshipper\Builders\ShippingRateBuilder;
use Webshipper\Builders\WebhookBuilder;
use Webshipper\Utils\Request;

class Webshipper
{
    /**
     * @var $request Request
     */
    protected $request;

    /**
     * Webshipper constructor.
     * @param null $username
     * @param null $email
     * @param null $password
     * @param array $options
     * @param array $headers
     */
    public function __construct( $username = null, $email = null, $password = null, $options = [], $headers = [] )
    {
        $this->initRequest( $username, $email, $password, $options, $headers );
    }

    private function initRequest( $username = null, $email = null, $password = null, $options = [], $headers = [] )
    {
        $this->request = new Request( $username, $email, $password, $options, $headers );
    }

    /**
     * @return OrderBuilder
     */
    public function orders()
    {
        return new OrderBuilder($this->request);
    }

    /**
     * @return ShipmentBuilder
     */
    public function shipments()
    {
        return new ShipmentBuilder($this->request);
    }

    /**
     * @return ShippingRateBuilder
     */
    public function shipping_rates()
    {
        return new ShippingRateBuilder($this->request);
    }

    /**
     * @return WebhookBuilder
     */
    public function webhooks()
    {
        return new WebhookBuilder($this->request);
    }
}