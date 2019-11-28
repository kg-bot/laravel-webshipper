<?php

namespace Webshipper\Models;


use Webshipper\Utils\Model;

class ShippingRate extends Model
{
    protected $entity = 'shipping_rates';
    protected $primaryKey = 'id';
    protected $type = 'shipping_rates';
}