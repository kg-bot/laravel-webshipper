<?php
namespace Webshipper\Builders;

use Webshipper\Models\ShippingRate;

class ShippingRateBuilder extends Builder
{
    protected $entity = 'shipping_rates';
    protected $model  = ShippingRate::class;
    protected $type = 'shipping_rates';
}