<?php

namespace Webshipper\V2\Model;


class Webhook
{
    protected $name = "webhooks";
    protected $url = "webhooks";

    public function __construct()
    {
        parent::__construct($this->name, $this->url);
    }
}