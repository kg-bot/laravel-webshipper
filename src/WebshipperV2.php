<?php

namespace Webshipper;

use Webshipper\V2\Model\ShippingRate;
use Webshipper\V2\Model\DropPointLocator;
use Webshipper\V2\Model\Order;
use Webshipper\V2\Model\OrderChannel;
use Webshipper\V2\Model\Webhook;
use Webshipper\V2\Model\Shipment;

class WebshipperV2
{

    public $orders;
    public $drop_point_locators;
    public $order_channels;
    public $shipping_rates;
    public $webhooks;
    public $shipments;

    public function __construct()
    {
        $this->orders = new Order();
        $this->drop_point_locators = new DropPointLocator();
        $this->order_channels = new OrderChannel();
        $this->shipping_rates = new ShippingRate();
        $this->webhooks = new Webhook();
        $this->shipments = new Shipment();
    }

}