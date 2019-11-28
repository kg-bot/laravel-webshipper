<?php
namespace Webshipper\Builders;

use Webshipper\Models\Order;

class OrderBuilder extends Builder
{
    protected $entity = 'orders';
    protected $model  = Order::class;
    protected $type = 'orders';
}