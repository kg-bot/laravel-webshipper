<?php

namespace Webshipper\Model;


class Order extends Model
{
    protected $name = 'orders';
    protected $url = 'orders';

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }

    public function findByTrackingNumber($trackingNumber)
    {
        return $this->requestUtil->get($this->modelUrl . '/find_by_tracking_no/' . $trackingNumber);
    }

    public function getOrdersByWebshopAndStatus($webshopId, $status, $data = 'all', $page = 1)
    {
        return $this->requestUtil->get('webshops/' . $webshopId . '/orders/find_by_status/' . $status . '?data=' . $data . '&page=' . $page);
    }

    public function getByStatus($status, $data = 'all', $page = 1)
    {
        return $this->requestUtil->get($this->modelUrl . '/find_by_status/' . $status . '?data=' . $data . '&page=' . $page);
    }

    public function getByTimeRange($from, $to, $data = 'all', $page = 1)
    {
        return $this->requestUtil->get($this->modelUrl . '/find_by_time_range/epoch?from=' . $from .'&to= ' . $to . '&data=' . $data . '&page=' . $page);
    }

    public function updateStatus($id, $status = 'processing')
    {
        return $this->requestUtil->patchWithoutData($this->modelUrl . '/' . $id . '/set_status/' . $status);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement magic findByMethods
    }
}