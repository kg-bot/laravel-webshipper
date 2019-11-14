<?php

namespace Webshipper;

use Webshipper\V2\Model\ShippingRate;
use Webshipper\V2\Model\DropPointLocator;
use Webshipper\V2\Model\Order;
use Webshipper\V2\Model\OrderChannel;
use Webshipper\V2\Model\Webhook;
use Webshipper\V2\Model\Shipment;
use Webshipper\V2\Util\Request;

class WebshipperV2
{

    public $orders;
    public $drop_point_locators;
    public $order_channels;
    public $shipping_rates;
    public $webhooks;
    public $shipments;
    public $request;

    public function __construct($accountName = null, $email = null, $password = null)
    {
        $this->orders = new Order($accountName, $email, $password);
        $this->drop_point_locators = new DropPointLocator($accountName, $email, $password);
        $this->order_channels = new OrderChannel($accountName, $email, $password);
        $this->shipping_rates = new ShippingRate($accountName, $email , $password);
        $this->webhooks = new Webhook($accountName, $email, $password);
        $this->shipments = new Shipment($accountName, $email, $password);
        $this->request = new Request($accountName, $email, $password);
    }

}