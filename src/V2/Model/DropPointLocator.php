<?php

namespace Webshipper\V2\Model;


class DropPointLocator extends Model
{
    protected $name = "drop_point_locators";
    protected $url = "drop_point_locators";

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }
}