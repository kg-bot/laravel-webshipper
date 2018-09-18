<?php

namespace Webshipper\V2\Model;


class Order extends Model
{
    protected $name = "orders";
    protected $url = "orders";

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }
}