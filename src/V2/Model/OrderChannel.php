<?php

namespace Webshipper\V2\Model;


class OrderChannel extends Model
{

    protected $name = "order_channels";
    protected $url = "order_channels";

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }

}