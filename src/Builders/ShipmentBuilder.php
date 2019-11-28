<?php
namespace Webshipper\Builders;

use Webshipper\Models\Shipment;

class ShipmentBuilder extends Builder
{
    protected $entity = 'shipments';
    protected $model  = Shipment::class;
    protected $type = 'shipments';
}