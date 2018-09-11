<?php

namespace Webshipper;

use Webshipper\Model\Order;
use Webshipper\Model\ShippingRate;

class Webshipper
{
    public $orders;
    public $shipping_rates;

    public function __construct()
    {
        $this->orders = new Order();
        $this->shipping_rates = new ShippingRate();
    }
}