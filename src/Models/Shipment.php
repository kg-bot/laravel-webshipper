<?php

namespace Webshipper\Models;


use Webshipper\Builders\OrderShipmentBuilder;
use Webshipper\Exceptions\MethodNotImplemented;
use Webshipper\Utils\Model;

class Shipment extends Model
{
    protected $entity     = 'shipments';
    protected $primaryKey = 'id';
    protected $type = 'shipments';

    public function update($data = [])
    {
        throw new MethodNotImplemented();
    }
}
