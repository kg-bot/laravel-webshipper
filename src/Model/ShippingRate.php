<?php
/**
 * Created by PhpStorm.
 * User: danijel
 * Date: 9/10/18
 * Time: 1:54 PM
 */

namespace Webshipper\Model;


class ShippingRate extends Model
{
    protected $name = 'shipping_rates';
    protected $url = 'shipping_rates';

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }

    public function all($webshopId = null)
    {
        return $this->requestUtil->get('webshops/' . $webshopId .  '/shipping_rates');
    }
}