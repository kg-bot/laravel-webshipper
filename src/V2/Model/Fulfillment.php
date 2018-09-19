<?php

namespace Webshipper\V2\Model;


class Fulfillment extends Model
{
    protected $name = "fulfillments";
    protected $url = "fulfillments";

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }
}