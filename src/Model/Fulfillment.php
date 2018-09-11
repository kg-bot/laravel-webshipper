<?php
/**
 * Created by PhpStorm.
 * User: danijel
 * Date: 9/10/18
 * Time: 1:52 PM
 */

namespace Webshipper\Model;


class Fulfillment extends Model
{
    protected $name = 'orders';
    protected $url = 'orders';

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }
}