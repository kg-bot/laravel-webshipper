<?php

namespace Webshipper\V2\Model;


class ShippingRate extends Model
{
    protected $name = "shipping_rates";
    protected $url = "shipping_rates";

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }

}