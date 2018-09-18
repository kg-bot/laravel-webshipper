<?php

namespace Webshipper\V2\Model;


class Fulfillment
{
    protected $name = "fulfillments";
    protected $url = "fulfillments";

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }
}