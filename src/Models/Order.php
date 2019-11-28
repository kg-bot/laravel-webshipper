<?php

namespace Webshipper\Models;

use Webshipper\Builders\ShipmentBuilder;
use Webshipper\Builders\ShippingRateBuilder;
use Webshipper\Utils\Model;

class Order extends Model
{
    protected $entity     = 'orders';
    protected $primaryKey = 'id';
    protected $type = 'orders';

    /**
     * @return mixed
     * @throws \Webshipper\Exceptions\WebshipperClientException
     * @throws \Webshipper\Exceptions\WebshipperRequestException
     */
    public function createShipment()
    {
        $builder = new ShipmentBuilder($this->request);

        return $builder->create([

            'relationships' => [
                'order' => [
                    'data' => [
                        'type' => 'orders',
                        'id' => $this->{$this->primaryKey},
                    ],
                ],
            ],
        ]);
    }

    /**
     * @return mixed
     * @throws \Webshipper\Exceptions\WebshipperClientException
     * @throws \Webshipper\Exceptions\WebshipperRequestException
     */
    public function shipments()
    {
        $builder = new ShippingRateBuilder($this->request);
        $builder->setEntity('orders/' . $this->{$this->primaryKey} . '/shipments');

        return $builder->get();
    }
}
