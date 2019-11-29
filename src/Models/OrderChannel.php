<?php

namespace Webshipper\Models;

use Webshipper\Builders\ShippingRateBuilder;
use Webshipper\Utils\Model;

class OrderChannel extends Model
{
    protected $entity     = 'order_channels';
    protected $primaryKey = 'id';
    protected $type = 'order_channels';

    public function shipping_rates()
    {
        $builder = new ShippingRateBuilder($this->request);
        $builder->setEntity($this->entity.'/' . $this->{$this->primaryKey} . '/shipping_rates');

        return $builder->get();
    }
}
